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
                    <div v-for="figura in figuras" class="col-12">
                        <!-- FIGURE INFO #1 -->
                        <div v-if="figura.selected==false" class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('images/icono-circulo.png')}}" class="icon-figure" alt="">
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
                                <button type="button">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button type="button">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div><!-- end figure info -->
                        <div v-else class="d-flex justify-content-between align-items-center" style="background-color: #99989C">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('images/icono-circulo.png')}}" class="icon-figure" alt="">
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
                                <button type="button">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button type="button">
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
                                <input type="text" name="" id="x" class="ms-2" v-model="figuras[figuraID].x">
                            </div>
                        </div>
                        <!-- INPUT "Y" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">Y:</label>
                                <input type="text" name="" id="y" class="ms-2" v-model="figuras[figuraID].y">
                            </div>
                        </div>
                        <!-- INPUT "W" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">W:</label>
                                <input type="text" name="" id="w" class="ms-2" v-model="figuras[figuraID].w">
                            </div>
                        </div>
                        <!-- INPUT "H" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">H:</label>
                                <input type="text" name="" id="h" class="ms-2" v-model="figuras[figuraID].h">
                            </div>
                        </div>
                        <!-- INPUT "ROUNDED CORNER" -->
                        <div class="col-12 mb-2">
                            <div class="d-flex justify-content-center">
                                <label for="">
                                    <img src="{{asset('images/icono-curva.png')}}" class="me-1" alt="">:
                                </label>
                                <input type="text" name="" id="rounded_corner" class="ms-2" v-model="figuras[figuraID].corner">
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
                        <button type="button" class="btn-color btn-color-black"></button>
                        <button type="button" class="btn-color btn-color-white"></button>
                        <button type="button" class="btn-color btn-color-yellow"></button>
                        <button type="button" class="btn-color btn-color-red"></button>
                        <button type="button" class="btn-color btn-color-green"></button>
                        <button type="button" class="btn-color btn-color-blue"></button>
                    </div>
                    <!-- INPUTS -->
                    <div class="row justify-content-center px-2 m-0">
                        <!-- INPUT "R" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">R:</label>
                                <input type="text" name="" id="fill_r" class="ms-2" v-model="figuras[figuraID].fill_r">
                            </div>
                        </div>
                        <!-- INPUT "G" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">G:</label>
                                <input type="text" name="" id="fill_g" class="ms-2" v-model="figuras[figuraID].fill_g">
                            </div>
                        </div>
                        <!-- INPUT "B" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">B:</label>
                                <input type="text" name="" id="fill_b" class="ms-2" v-model="figuras[figuraID].fill_b">
                            </div>
                        </div>
                        <!-- INPUT "OPACITY" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="" class="d-flex align-items-center">
                                    <img src="{{asset('images/icono-opacidad.png')}}" alt="">:
                                </label>
                                <input type="text" name="" id="fill_a" class="ms-2" v-model="figuras[figuraID].fill_a">
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
                        <button type="button" class="btn-color btn-color-black"></button>
                        <button type="button" class="btn-color btn-color-white"></button>
                        <button type="button" class="btn-color btn-color-yellow"></button>
                        <button type="button" class="btn-color btn-color-red"></button>
                        <button type="button" class="btn-color btn-color-green"></button>
                        <button type="button" class="btn-color btn-color-blue"></button>
                    </div>
                    <!-- INPUTS -->
                    <div class="row justify-content-center px-2 m-0">
                        <!-- INPUT "R" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">R:</label>
                                <input type="text" name="" id="border_r" class="ms-2" v-model="figuras[figuraID].border_r">
                            </div>
                        </div>
                        <!-- INPUT "G" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">G:</label>
                                <input type="text" name="" id="border_g" class="ms-2" v-model="figuras[figuraID].border_g">
                            </div>
                        </div>
                        <!-- INPUT "B" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="">B:</label>
                                <input type="text" name="" id="border_b" class="ms-2" v-model="figuras[figuraID].border_b">
                            </div>
                        </div>
                        <!-- INPUT "OPACITY" -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-end">
                                <label for="" class="d-flex align-items-center">
                                    <img src="{{asset('images/icono-opacidad.png')}}" alt="">:
                                </label>
                                <input type="text" name="" id="border_a" class="ms-2" v-model="figuras[figuraID].border_a">
                            </div>
                        </div>
                        <!-- INPUT "THICKNESS" -->
                        <div class="col-12 mb-2">
                            <div class="d-flex justify-content-center">
                                <label for="">Grosor:</label>
                                <input type="text" name="" id="thickness" class="ms-2" v-model="figuras[figuraID].thickness">
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
        const { createApp } = Vue
      
        createApp({
            data() {
                return {
                    figuras: [],
                    figuraSeleccionada: false,
                    figuraID: null,
                    cuantasHay: 0,
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
                        p.strokeWeight(8);
                        p.stroke(0, 135, 255, 255);
                        p.fill(0, 83, 0, 255);
                        p.rect(200, 50, 100, 100);
                        this.figuras.forEach((element) => {
                            element.dibujar(p);
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
                            if(this.figuraSeleccionada==false) {
                                console.log("ENTRA A: "+figura.type);
                                if (p.mouseX >= figura.x &&
                                    p.mouseX <= figura.x + figura.w &&
                                    p.mouseY >= figura.y &&
                                    p.mouseY <= figura.y + figura.h ) {
                                    // Establece la figura como seleccionada
                                    this.figuraSeleccionada = true; 
                                    figura.selected = true;
                                    console.log(figura);
                                    this.cuantasHay++;
                                    this.figuraID = index;
                                }

                            }
                            
                        });
                        console.log("Selected: "+this.cuantasHay);
                        console.log("asd")
                    }

                    p.mousePressed = () => {
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
                        } /* else {
                            this.figuras[this.figuraID].selected = false;
                            this.figuraSeleccionada = false;
                        } */
                        
                    }

                    p.mouseDragged = () => {
                        if (
                            p.mouseX > this.figuras[this.figuraID].x &&
                            p.mouseX < this.figuras[this.figuraID].x + this.figuras[this.figuraID].w &&
                            p.mouseY > this.figuras[this.figuraID].y &&
                            p.mouseY < this.figuras[this.figuraID].y + this.figuras[this.figuraID].h 
                        ) {
                            if (this.figuraID !== null) {
                                this.figuras[this.figuraID].x = p.mouseX - offsetX;
                                this.figuras[this.figuraID].y = p.mouseY - offsetY;
                            }
                        } /* else {
                            this.figuras[this.figuraID].selected = false;
                            this.figuraSeleccionada = false;
                        } */
                        
                    }
                    p.mouseReleased = () => {
                        if (
                            !(p.mouseX > this.figuras[this.figuraID].x &&
                            p.mouseX < this.figuras[this.figuraID].x + this.figuras[this.figuraID].w &&
                            p.mouseY > this.figuras[this.figuraID].y &&
                            p.mouseY < this.figuras[this.figuraID].y + this.figuras[this.figuraID].h)
                        ) {
                            if (this.figuraID !== null) {
                                this.figuras[this.figuraID].selected = false;
                                this.figuraSeleccionada = false;
                            }
                        }

                        
                        /* this.figuras.forEach((figura) => {
                            if (
                                p.mouseX > figura.x - figura.w &&
                                p.mouseX < figura.x + figura.w &&
                                p.mouseY > figura.y - figura.w &&
                                p.mouseY < figura.y + figura.w
                            ) {
                                if (this.figuraID !== null) {
                                    this.figuras[this.figuraID].selected = false;
                                    this.figuraSeleccionada = false;
                                }
                            }
                            element.selected = false;
                        }); */
                        //this.figuraSeleccionada = false;
                    }
                }, "area-canvas");
            },
        }).mount('#app')
    </script>

    <script>
        /* FIGURAS Y ASIGNAR LOS VALORES EN INPUT DATA COMO JSON */
        /* var figuras = [
            {
                "type": "text",
                "x": 10,
                "y": 20,
                "w": 25,
                "h": 20,
            },
            {
                "type": "rect",
                "x": 5,
                "y": 5,
                "w": 35,
                "h": 20,
            },
        ];

        console.log("Título:"+document.getElementById("title").value);

        console.log("InputData Previo JSON:"+document.getElementById("inputData").value) */

        //LÍNEAS PARA ASIGNAR EL VALOR AL INPUT (DESCOMENTAR PARA ASIGNAR Y GUARDAR DATOS DE PRUEBA)
        //document.getElementById("inputData").value = JSON.stringify(figuras);
        //console.log("InputData Posterior JSON:"+document.getElementById("inputData").value);

        //----------------------------------------------------------------

        /* OBTENER MEDIDAS DEL CANVAS EN BASE A LA PANTALLA */
        /* let divCanvas = document.getElementById("area-canvas")
        let canvasAncho = divCanvas.offsetWidth;
        let canvasAlto = divCanvas.offsetHeight;
        console.log("ANCHO DEL CANVAS: "+canvasAncho);
        console.log("ALTO DEL CANVAS: "+canvasAlto); */
        
        /* console.log("Hola");
        let figuras = [];

        function setup() {
            var divCanvas = document.getElementById("area-canvas")
            var canvasAncho = divCanvas.offsetWidth;
            var canvasAlto = divCanvas.offsetHeight;
            var canvas = createCanvas(canvasAncho, canvasAlto);
            canvas.parent(divCanvas);
        }

        function draw() {
            //background(255, 255, 255);
            background(255);

            //rect(200, 50, 100, 100);
            figuras.forEach(element => {
                element.dibujar();
                //pintarlo(element);
                console.log(element);

            });
            console.log("-------------------");
            
        }

        function addFigure(tipoFigura) {
            figuras.push(new Figura(tipoFigura));
            //let equisde = new Figura('rect');
            //console.log(equisde);
            console.log(figuras);
        }

        //ESTO SIRVE - NO ELIMINAR
        function guardar() {
            document.getElementById("inputData").value = JSON.stringify(figuras);
        } */

        //PRUEBAS
        /* function pintarlo(objeto) {
            if (objeto.type == 'rect') {
                //BORDE GROSOR
                strokeWeight(objeto.thickness);
                console.log("Grosor:"+objeto.thickness)
                //BORDE COLOR Y OPACIDAD
                stroke(objeto.border_r, objeto.border_g, objeto.border_b, objeto.border_a);
                //RELLENO COLOR Y OPACIDAD
                fill(objeto.fill_r, objeto.fill_g, objeto.fill_b, objeto.fill_a);
                //DIBUJAR RECTÁNGULO Y ESQUINAS REDONDEADAS
                rect(objeto.x, objeto.y, objeto.w, objeto.h, objeto.corner);
            }
        } */


    </script>
</body>
</html>