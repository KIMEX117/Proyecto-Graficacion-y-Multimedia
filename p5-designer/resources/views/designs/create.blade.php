<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Proyecto - P5 Designer</title>
</head>
<body class="user-project" id="app">
    <form action="{{ route('design.store') }}" method="POST" class="d-flex flex-column h-100">
        @csrf
        <input type="text" id="user_id" name="user_id" value="{{auth()->id()}}" hidden>
        <input type="text" id="inputData" name="data" hidden>
        <!-- TOOLBAR -->
        <div class="header-toolbar ps-2">
            <!-- FIGURES BAR -->
            <div class="figures-bar d-flex align-items-center">
                <a href="{{ route('home') }}">
                    <img src="{{asset('images/logo-blanco.png')}}" alt="">
                </a>
                <div class="d-flex">
                    <button type="button" class="mx-1">
                        <img src="{{asset('images/icono-cursor.png')}}" alt="">
                    </button>
                    <button type="button" @click="addFigure('rect')" class="mx-1">
                        <img src="{{asset('images/icono-cuadrado.png')}}" alt="">
                    </button>
                    <button type="button" onclick="addFigure('line')" class="mx-1">
                        <img src="{{asset('images/icono-linea-diagonal.png')}}" alt="">
                    </button>
                    <button type="button" onclick="addFigure('ellipse')" class="mx-1">
                        <img src="{{asset('images/icono-circulo.png')}}" alt="">
                    </button>
                    <button type="button" onclick="addFigure('text')" class="mx-1">
                        <img src="{{asset('images/icono-texto.png')}}" alt="">
                    </button>
                </div>
            </div>
            <!-- PROJECT TITLE -->
            <div class="project-title d-flex justify-content-center align-items-center">
                <input type="text" id="title" name="title" value="Sin título" required>
            </div>
            <!-- PROJECT SAVE -->
            <div class="project-save d-flex justify-content-center align-items-center">
                <button type="submit" @click="guardar()" class="main-btn save-btn px-3">
                    GUARDAR CAMBIOS
                </button>
            </div>
        </div><!-- end toolbar -->

        <!-- PROJECT -->
        <div class="d-flex h-100">
            <!-- SIDEBAR ELEMENTS -->
            <div class="sidebar-elements bgcolor-tertiary  px-2">
                <h2 class="text-center p-3">
                    Elementos
                </h2>
                <!-- ROW -->
                <div class="row">
                    <!-- COLUMN -->
                    <div v-for="figura in figuras" :class="figura.selected ? 'bgcolor-hover-btn' : ''" class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('images/icono-cuadrado.png')}}" class="icon-figure" alt="">
                                <h3 class="name-figure ms-2 mb-0">
                                    @{{figura.type}}
                                </h3>
                            </div>
                            <div class="btns-figure d-flex align-items-center">
                                <button type="button">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-arrow-up"></i>
                                </button>
                                <button type="button" :key="'ocultarFigura'+figura.id" :id="'ocultarFigura'+figura.id" @click="ocultarFigura(figura.id)">
                                    <i v-if="figura.hidden==false" class="fa-solid fa-eye"></i>
                                    <i v-else class="fas fa-eye-slash"></i>
                                </button>
                                <button type="button" :key="'eliminarFigura'+figura.id" :id="'eliminarFigura'+figura.id" @click="eliminarFigura(figura.id)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div><!-- end figure info -->
                    </div><!-- end column -->
                </div><!-- end row -->
            </div>

            <!-- AREA CANVAS -->
            <div id="area-canvas" class="area-canvas d-flex justify-content-center align-items-center">

            </div>

            <!-- SIDEBAR OPTIONS -->
            <div class="sidebar-options bgcolor-tertiary">
                
                <!-- MEASURES -->
                <div v-if="figuraSeleccionada" class="measures px-2 mb-4">
                    <!-- TITLE -->
                    <h2 class="text-center px-2 my-3">
                        Medidas
                    </h2>
                    <!-- INPUTS -->
                    <div class="row justify-content-center px-2 m-0">
                        <!-- INPUT "X" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">X:</label>
                                <input type="number" name="" id="x" class="ms-2" min="0" v-model="figuraObjeto.x">
                            </div>
                        </div>
                        <!-- INPUT "Y" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">Y:</label>
                                <input type="number" name="" id="y" class="ms-2" min="0" v-model="figuraObjeto.y">
                            </div>
                        </div>
                        <!-- INPUT "W" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">W:</label>
                                <input type="number" name="" id="w" class="ms-2" min="0" v-model="figuraObjeto.w">
                            </div>
                        </div>
                        <!-- INPUT "H" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">H:</label>
                                <input type="number" name="" id="h" class="ms-2" min="0" v-model="figuraObjeto.h">
                            </div>
                        </div>
                        <!-- INPUT "ROUNDED CORNER" -->
                        <div class="col-12 mb-2">
                            <div class="d-flex justify-content-center">
                                <label for="">
                                    <img src="{{asset('images/icono-curva.png')}}" class="me-1" alt="">:
                                </label>
                                <input type="number" name="" id="rounded_corner" class="ms-2" min="0" v-model="figuraObjeto.corner">
                            </div>
                        </div>
                    </div><!-- end row -->
                </div><!-- end measures -->

                <!-- FILLED -->
                <div v-if="figuraSeleccionada" class="filled px-2 mb-4">
                    <!-- TITLE -->
                    <div class="d-flex flex-column text-center mb-3">
                        <h2 class="px-2 mb-0">
                            Relleno
                        </h2>
                    </div>
                    <!-- BUTTONS COLORS -->
                    <div class="d-flex justify-content-between px-3 mb-3">
                        <button type="button" class="btn-color btn-color-black" @click="cambiarColor(figuraObjeto.id, 34, 34, 34, 255, 'fill')"></button>
                        <button type="button" class="btn-color btn-color-white" @click="cambiarColor(figuraObjeto.id, 255, 255, 255, 255, 'fill')"></button>
                        <button type="button" class="btn-color btn-color-yellow" @click="cambiarColor(figuraObjeto.id, 255, 217, 119, 255, 'fill')"></button>
                        <button type="button" class="btn-color btn-color-red" @click="cambiarColor(figuraObjeto.id, 255, 175, 175, 255, 'fill')"></button>
                        <button type="button" class="btn-color btn-color-green" @click="cambiarColor(figuraObjeto.id, 147, 255, 198, 255, 'fill')"></button>
                        <button type="button" class="btn-color btn-color-blue" @click="cambiarColor(figuraObjeto.id, 176, 194, 242, 255, 'fill')"></button>
                    </div>
                    <!-- INPUTS -->
                    <div class="row justify-content-center px-2 m-0">
                        <!-- INPUT "R" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">R:</label>
                                <input type="number" name="" id="fill_r" class="ms-2" min="0" max="255" v-model="figuraObjeto.fill_r">
                            </div>
                        </div>
                        <!-- INPUT "G" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">G:</label>
                                <input type="number" name="" id="fill_g" class="ms-2" min="0" max="255" v-model="figuraObjeto.fill_g">
                            </div>
                        </div>
                        <!-- INPUT "B" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">B:</label>
                                <input type="number" name="" id="fill_b" class="ms-2" min="0" max="255" v-model="figuraObjeto.fill_b">
                            </div>
                        </div>
                        <!-- INPUT "OPACITY" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="" class="d-flex align-items-center">
                                    <img src="{{asset('images/icono-opacidad.png')}}" alt="">:
                                </label>
                                <input type="number" name="" id="fill_a" class="ms-2" min="0" max="255" v-model="figuraObjeto.fill_a">
                            </div>
                        </div>
                    </div><!-- end row -->
                </div><!-- end filled -->

                <!-- BORDED -->
                <div v-if="figuraSeleccionada" class="filled px-2 mb-4">
                    <!-- TITLE -->
                    <div class="d-flex flex-column text-center mb-3">
                        <h2 class="px-2 mb-0">
                            Borde
                        </h2>
                    </div>
                    <!-- BUTTONS COLORS -->
                    <div class="d-flex justify-content-between px-3 mb-3">
                        <button type="button" class="btn-color btn-color-black" @click="cambiarColor(figuraObjeto.id, 34, 34, 34, 255, 'border')"></button>
                        <button type="button" class="btn-color btn-color-white" @click="cambiarColor(figuraObjeto.id, 255, 255, 255, 255, 'border')"></button>
                        <button type="button" class="btn-color btn-color-yellow" @click="cambiarColor(figuraObjeto.id, 255, 217, 119, 255, 'border')"></button>
                        <button type="button" class="btn-color btn-color-red" @click="cambiarColor(figuraObjeto.id, 255, 175, 175, 255, 'border')"></button>
                        <button type="button" class="btn-color btn-color-green" @click="cambiarColor(figuraObjeto.id, 147, 255, 198, 255, 'border')"></button>
                        <button type="button" class="btn-color btn-color-blue" @click="cambiarColor(figuraObjeto.id, 176, 194, 242, 255, 'border')"></button>
                    </div>
                    <!-- INPUTS -->
                    <div class="row justify-content-center px-2 m-0">
                        <!-- INPUT "R" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">R:</label>
                                <input type="number" name="" id="border_r" class="ms-2" min="0" max="255" v-model="figuraObjeto.border_r">
                            </div>
                        </div>
                        <!-- INPUT "G" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">G:</label>
                                <input type="number" name="" id="border_g" class="ms-2" min="0" max="255" v-model="figuraObjeto.border_g">
                            </div>
                        </div>
                        <!-- INPUT "B" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">B:</label>
                                <input type="number" name="" id="border_b" class="ms-2" min="0" max="255" v-model="figuraObjeto.border_b">
                            </div>
                        </div>
                        <!-- INPUT "OPACITY" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="" class="d-flex align-items-center">
                                    <img src="{{asset('images/icono-opacidad.png')}}" alt="">:
                                </label>
                                <input type="number" name="" id="border_a" class="ms-2" min="0" max="255"  v-model="figuraObjeto.border_a">
                            </div>
                        </div>
                        <!-- INPUT "THICKNESS" -->
                        <div class="col-12 mb-2">
                            <div class="d-flex justify-content-center">
                                <label for="">Grosor:</label>
                                <input type="number" name="" id="thickness" class="ms-2" min="0" max="255" v-model="figuraObjeto.thickness">
                            </div>
                        </div>
                    </div><!-- end row -->
                </div><!-- end filled -->

            </div><!-- end sidebar options -->
        </div><!-- end project -->

    </form><!-- end form -->
    

    @include('layouts.scripts')
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.6.0/p5.min.js" integrity="sha512-3RlxD1bW34eFKPwj9gUXEWtdSMC59QqIqHnD8O/NoTwSJhgxRizdcFVQhUMFyTp5RwLTDL0Lbcqtl8b7bFAzog==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    figuras: [],
                    figuraSeleccionada: false,
                    figuraID: null,
                    figuraObjeto: null,
                }
            },
            methods: {
                addFigure(tipoFigura) {
                    this.figuras.push(new Figura(tipoFigura));
                    //let equisde = new Figura('rect');
                    //console.log(equisde);
                    console.log(this.figuras);
                },
                guardar() {
                    document.getElementById("inputData").value = JSON.stringify(this.figuras);
                },
                ocultarFigura(id) {
                    const index = this.figuras.findIndex(figura => figura.id === id);
                    if(this.figuras[index].hidden==false) {
                        this.figuras[index].hidden = true;
                    } else {
                        this.figuras[index].hidden = false;
                    }
                    console.log("ESTADO NUEVO: "+this.figuras[index].hidden);
                },
                eliminarFigura(id) {
                    /* 
                        ME QUEDE AQUI CREANDO LA FUNCIÓN DE ELIMINAR UNA FIGURA
                    */
                    //const index = this.figuras.findIndex(figura => figura.id !== id);
                    /* const index = this.figuras.findIndex(figura => figura.id === id);

                    
                    if(this.figuraID===id) {
                        this.resetearVariables();
                    } */
                    this.resetearVariables();
                    const nuevoArray = this.figuras.filter(figura => figura.id !== id);
                    /* if(this.figuraID===id) {
                        this.figuraID = null;
                        this.figuraSeleccionada = false;
                        this.figuraObjeto = {
                            x: 0,
                            y: 0,
                            w: 0,
                            h: 0,
                            corner: 0,
                            //RELLENO
                            fill_r: 0,
                            fill_g: 0,
                            fill_b: 0,
                            fill_a: 0,
                            //BORDE
                            thickness: 0,
                            border_r: 0,
                            border_g: 0,
                            border_b: 0,
                            border_a: 0,
                        }
                        console.log("HOLA ENTRA A ESTO");
                    } */
                    if(nuevoArray.length==0) {
                        console.log("NO HAY NADA EN EL ARREGLO");
                        this.figuras = [];
                        this.resetearVariables();
                    } else {
                        console.log("NUEVO ARRAY: "+nuevoArray);
                        this.figuras = nuevoArray;
                        console.log("FIGURAS UPDATE: "+this.figuras);
                        //this.resetearVariables();
                    }
                },
                resetearVariables() {
                    this.figuraID = null;
                    this.figuraSeleccionada = false;
                    this.figuraObjeto = null;/* {
                        x: 0,
                        y: 0,
                        w: 0,
                        h: 0,
                        corner: 0,
                        //RELLENO
                        fill_r: 0,
                        fill_g: 0,
                        fill_b: 0,
                        fill_a: 0,
                        //BORDE
                        thickness: 0,
                        border_r: 0,
                        border_g: 0,
                        border_b: 0,
                        border_a: 0,
                    } */
                },
                cambiarColor(id, r, g, b, a, option) {
                    const index = this.figuras.findIndex(figura => figura.id === id);
                    console.log("***********************")
                    console.log(index);
                    console.log(this.figuras[index]);
                    this.figuras[index].cambiarColorPredeterminado(r, g, b, a, option);
                }
            },

            mounted() {
                //FIGURA SEEDER
                this.addFigure("rect");
                this.figuras[0].x = 300;
                this.figuras[0].y = 300;
                console.log(this.figuras);

                //CANVAS
                new p5((p) => {
                    //let figuraID = null;
                    let offsetX = 0;
                    let offsetY = 0;

                    p.setup = () => {
                        var divCanvas = document.getElementById("area-canvas");
                        var canvasAncho = divCanvas.offsetWidth;
                        var canvasAlto = divCanvas.offsetHeight;
                        p.createCanvas(canvasAncho, canvasAlto);
                    };

                    p.draw = () => {
                        p.background(255);
                        /* p.strokeWeight(8);
                        p.stroke(0, 135, 255, 255);
                        p.fill(0, 83, 0, 255);
                        p.rect(200, 50, 100, 100); */
                        this.figuras.forEach((element) => {
                            if(element.hidden==false) {
                                if(element.selected==true) {
                                    p.stroke(12, 140, 233);
                                    p.strokeWeight(2);
                                    p.fill(255);
                                    p.rect(element.x-6, element.y-6, element.w+12, element.h+12);
                                }
                                element.dibujar(p);
                            }
                        });
                    };

                    p.mouseClicked = () => {
                        /* if (this.figuraSeleccionada == true) {
                            console.log("ENTRA AL PRIMER IF");
                            return; // No se permite seleccionar otra figura si ya hay una seleccionada
                        } */
                        
                        console.log(this.figuraSeleccionada);
                        // Verifica si se hizo clic en alguna figura
                        this.figuras.forEach((figura, index) => {
                            console.log("ENTRA AL FOREACH");
                            console.log("Estas son las figuras:"+figura.id);
                            console.log("SELECCIONADA? "+this.figuraSeleccionada);
                            if(this.figuraSeleccionada==false&&figura.hidden==false) {
                                console.log("ENTRA A: "+figura.type);
                                if (p.mouseX >= figura.x &&
                                    p.mouseX <= figura.x + figura.w &&
                                    p.mouseY >= figura.y &&
                                    p.mouseY <= figura.y + figura.h ) {
                                    // Establece la figura como seleccionada
                                    this.figuraSeleccionada = true; 
                                    figura.selected = true;
                                    console.log(figura);
                                    this.figuraID = index;
                                    this.figuraObjeto = figura;
                                    console.log("~~~~~~~~~~~~~");
                                    console.log(this.figuraID);
                                    console.log("~~~~~~~~~~~~~");
                                }
                            }
                            
                        });
                        console.log("asd")
                    }

                    p.mousePressed = () => {
                        if(this.figuraID != null && this.figuras[this.figuraID] !== undefined) {
                            console.log(this.figuraID);
                            if (
                                p.mouseX > this.figuras[this.figuraID].x &&
                                p.mouseX < this.figuras[this.figuraID].x + this.figuras[this.figuraID].w &&
                                p.mouseY > this.figuras[this.figuraID].y &&
                                p.mouseY < this.figuras[this.figuraID].y + this.figuras[this.figuraID].h 
                            ) {
                                if (this.figuraID !== null) {
                                    offsetX = p.mouseX - this.figuras[this.figuraID].x;
                                    offsetY = p.mouseY - this.figuras[this.figuraID].y;
                                }
                            }
                        }
                    }

                    p.mouseDragged = () => {
                        if(this.figuraID != null && this.figuras[this.figuraID] !== undefined) {
                            if (
                                p.mouseX > this.figuras[this.figuraID].x &&
                                p.mouseX < this.figuras[this.figuraID].x + this.figuras[this.figuraID].w &&
                                p.mouseY > this.figuras[this.figuraID].y &&
                                p.mouseY < this.figuras[this.figuraID].y + this.figuras[this.figuraID].h 
                            ) {
                                if (this.figuraID !== null && this.figuras[this.figuraID].hidden==false) {
                                    this.figuras[this.figuraID].x = p.mouseX - offsetX;
                                    this.figuras[this.figuraID].y = p.mouseY - offsetY;
                                }
                            }
                        }    
                    }
                    p.mouseReleased = () => {
                        if(this.figuraID != null && this.figuras[this.figuraID] !== undefined) {
                            if (
                                !(p.mouseX > this.figuras[this.figuraID].x &&
                                p.mouseX < this.figuras[this.figuraID].x + this.figuras[this.figuraID].w &&
                                p.mouseY > this.figuras[this.figuraID].y &&
                                p.mouseY < this.figuras[this.figuraID].y + this.figuras[this.figuraID].h)
                            ) {
                                if (this.figuraID !== null && (p.mouseX > 0 && p.mouseX < p.width && p.mouseY > 0 && p.mouseY < p.height)) {
                                    this.figuras[this.figuraID].selected = false;
                                    this.figuraSeleccionada = false;
                                }
                            }
                        }
                    }
                }, "area-canvas");
            },
        })
        app.mount('#app')
    </script>
</body>
</html>