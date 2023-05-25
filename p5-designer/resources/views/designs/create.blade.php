<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Proyecto - P5 Designer</title>
</head>
<body class="user-project" id="app">
    <form id="project-form" action="{{ route('design.store') }}" method="POST" class="d-flex flex-column h-100" @keydown.enter="preventFormSubmit" enctype="multipart/form-data">
        @csrf
        <input type="text" id="user_id" name="user_id" value="{{auth()->id()}}" hidden>
        <input type="text" id="inputData" name="data" hidden>
        <input type="hidden" id="imageInput" name="image">
        <!-- TOOLBAR -->
        <div class="header-toolbar ps-2">
            <!-- FIGURES BAR -->
            <div class="figures-bar d-flex align-items-center">
                <a href="{{ route('home') }}">
                    <img src="{{asset('images/logo-blanco.png')}}" alt="">
                </a>
                <div class="d-flex">
                    <button type="button" @click="cursorNormal()" class="mx-1">
                        <img src="{{asset('images/icono-cursor.png')}}" alt="">
                    </button>
                    <button type="button" @click="dibujarFigura('rect')" class="mx-1">
                        <img src="{{asset('images/icono-cuadrado.png')}}" alt="">
                    </button>
                    <button type="button" @click="dibujarFigura('line')" class="mx-1">
                        <img src="{{asset('images/icono-linea-diagonal.png')}}" alt="">
                    </button>
                    <button type="button" @click="dibujarFigura('ellipse')" class="mx-1">
                        <img src="{{asset('images/icono-circulo.png')}}" alt="">
                    </button>
                    <button type="button" @click="dibujarFigura('text')" class="mx-1">
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
                <button type="button" @click="guardar()" class="main-btn save-btn px-3">
                    GUARDAR CAMBIOS
                </button>
            </div>
        </div><!-- end toolbar -->

        <!-- PROJECT -->
        <div class="d-flex h-100">
            <!-- SIDEBAR ELEMENTS -->
            <div class="sidebar-elements bgcolor-tertiary">
                <h2 class="text-center pt-3 px-4">
                    Elementos
                </h2>
                <h3 class="text-center px-3 pb-0">
                    <b>Orden:</b> Más nuevos a antiguos
                </h3>
               <!-- LIST OF ELEMENTS -->
                <div class="list-of-elements px-2">
                    <!-- ROW -->
                    <div class="row">
                        <!-- COLUMN -->
                        <div v-for="(figura, index) in figuras" :class="figura.selected ? 'bgcolor-hover-btn' : ''" class="col-12" >
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center w-100" @click="seleccionarFigura(index)">
                                    <i :class="asignarIconoFigura(figura.type)" class="fa-solid icon-figure" :key="'iconoFigura'+index" :style="{ color: obtenerColorRGB(figura.fill_r, figura.fill_g, figura.fill_b) }"></i>
                                    <h3 class="name-figure ms-2 mb-0">
                                        @{{figura.type}} - @{{figura.id}}
                                    </h3>
                                </div>
                                <div class="btns-figure d-flex align-items-center bgcolor-tertiary">
                                    <button v-if="index!=figuras.length-1" type="button" :key="'moverCapaSiguienteFigura'+figura.id" :id="'moverCapaSiguienteFigura'+figura.id" @click="moverCapaFigura(index,'siguiente')">
                                        <i class="fa-solid fa-arrow-down"></i>
                                    </button>
                                    <button v-if="index!=0" type="button" :key="'moverCapaAnteriorFigura'+figura.id" :id="'moverCapaAnteriorFigura'+figura.id" @click="moverCapaFigura(index,'anterior')">
                                        <i class="fa-solid fa-arrow-up"></i>
                                    </button>
                                    <button type="button" :key="'ocultarFigura'+figura.id" :id="'ocultarFigura'+figura.id" @click="ocultarFigura(figura.id)">
                                        <i v-if="figura.hidden==false" class="fa-solid fa-eye"></i>
                                        <i v-else class="fas fa-eye-slash"></i>
                                    </button>
                                    <button type="button" :key="'eliminarFigura'+figura.id" :id="'eliminarFigura'+figura.id" @click="eliminarFigura(figura.id,index)">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div><!-- end figure info -->
                        </div><!-- end column -->
                    </div><!-- end row -->
                </div><!-- end list of elements -->    
            </div><!-- end sidebar elements -->

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
                            <div v-if="figuraObjeto.type!=='line'" class="d-flex justify-content-end">
                                <label for="">X:</label>
                                <input type="number" name="" id="x" class="ms-2" min="0" v-model="figuraObjeto.x">
                            </div>
                            <div v-else class="d-flex justify-content-end">
                                <label for="">X1:</label>
                                <input type="number" name="" id="x1" class="ms-2" min="0" v-model="figuraObjeto.x1">
                            </div>
                        </div>
                        <!-- INPUT "Y" -->
                        <div class="col-6 mb-2">
                            <div v-if="figuraObjeto.type!=='line'" class="d-flex justify-content-end">
                                <label for="">Y:</label>
                                <input type="number" name="" id="y" class="ms-2" min="0" v-model="figuraObjeto.y">
                            </div>
                            <div v-else class="d-flex justify-content-end">
                                <label for="">Y1:</label>
                                <input type="number" name="" id="y1" class="ms-2" min="0" v-model="figuraObjeto.y1">
                            </div>
                        </div>
                        <!-- INPUT "W" -->
                        <div v-if="figuraObjeto.type!='text'" class="col-6 mb-2">
                            <div v-if="figuraObjeto.type!=='line'" class="d-flex justify-content-end">
                                <label for="">W:</label>
                                <input  type="number" name="" id="w" class="ms-2" min="0" v-model="figuraObjeto.w">
                            </div>
                            <div v-else class="d-flex justify-content-end">
                                <label for="">X2:</label>
                                <input type="number" name="" id="x2" class="ms-2" min="0" v-model="figuraObjeto.x2">
                            </div>
                        </div>
                        <!-- INPUT "H" -->
                        <div v-if="figuraObjeto.type!='text'" class="col-6 mb-2">
                            <div v-if="figuraObjeto.type!=='line'" class="d-flex justify-content-end">
                                <label for="">H:</label>
                                <input  type="number" name="" id="h" class="ms-2" min="0" v-model="figuraObjeto.h">
                            </div>
                            <div v-else class="d-flex justify-content-end">
                                <label for="">Y2:</label>
                                <input type="number" name="" id="y2" class="ms-2" min="0" v-model="figuraObjeto.y2">
                            </div>
                        </div>
                        <!-- INPUT "ROUNDED CORNER" -->
                        <div v-if="figuraObjeto.corner!=null" class="col-12 mb-2">
                            <div class="d-flex justify-content-center">
                                <label for="">
                                    <img src="{{asset('images/icono-curva.png')}}" class="me-1" alt="">:
                                </label>
                                <input type="number" name="" id="rounded_corner" class="ms-2" min="0" v-model="figuraObjeto.corner">
                            </div>
                        </div>
                        <!-- INPUT "TEXT" -->
                        <div v-if="figuraObjeto.text!=null" class="col-12 mb-2">
                            <div class="d-flex justify-content-center">
                                <label for="">
                                    <img src="{{asset('images/icono-texto-mini.png')}}" class="me-1" alt="">:
                                </label>
                                <input type="text" name="" id="text" class="ms-2" minlength="0" maxlength="150" placeholder="Escribe aquí" v-model="figuraObjeto.text">
                            </div>
                        </div>
                        <!-- INPUT "FONT SIZE" -->
                        <div v-if="figuraObjeto.size!=null" class="col-12 mb-2">
                            <div class="d-flex justify-content-center">
                                <label for="">
                                    <img src="{{asset('images/icono-size-mini.png')}}" class="me-1" alt="">:
                                </label>
                                <input type="number" name="" id="size" class="ms-2" min="0" v-model="figuraObjeto.size">
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
                        <!-- INPUT "THICKNESS" (LINE) -->
                        <div v-if="figuraObjeto.type==='line'" class="col-12 mb-2">
                            <div class="d-flex justify-content-center">
                                <label for="">Grosor:</label>
                                <input type="number" name="" id="thickness" class="ms-2" min="1" max="255" v-model="figuraObjeto.thickness">
                            </div>
                        </div>
                    </div><!-- end row -->
                </div><!-- end filled -->

                <!-- BORDED -->
                <div v-if="figuraSeleccionada&&figuraObjeto.type!=='line'" class="filled px-2 mb-4">
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
                    dibujar: false,
                    tipoFigura: '',
                    dibujando: false,
                    puntoInicio: [],
                    puntoFinal: [],
                }
            },
            methods: {
                preventFormSubmit(event) {
                    event.preventDefault();
                },
                cursorNormal() {
                    this.dibujar = false;
                    this.tipoFigura = '';
                    this.dibujando = false;
                    this.puntoInicio = [];
                    this.puntoFinal = [];
                },
                dibujarFigura(tipoFigura) {
                    this.resetearVariables();
                    this.dibujar = true;
                    this.tipoFigura = tipoFigura;
                    if(tipoFigura==='line') {
                        this.dibujando = true;
                    } else {
                        this.dibujando = false;
                    }
                },
                addFigure(tipoFigura, x = 100, y = 100) {
                    this.figuras.unshift(new Figura(tipoFigura, x, y));
                },
                guardar() {
                    document.getElementById("inputData").value = JSON.stringify(this.figuras);
                    let p5canvas = document.getElementById("defaultCanvas0");
                    let image = p5canvas.toDataURL('image/png');
                    document.getElementById("imageInput").value = image;
                    document.getElementById("project-form").submit();
                },
                ocultarFigura(id) {
                    const index = this.figuras.findIndex(figura => figura.id === id);
                    if(this.figuras[index].hidden==false) {
                        this.figuras[index].hidden = true;
                    } else {
                        this.figuras[index].hidden = false;
                    }
                },
                eliminarFigura(id, index) {
                    if(this.figuraID==index) {
                        this.resetearVariables();
                    }
                    const nuevoArray = this.figuras.filter(figura => figura.id !== id);
                    if(nuevoArray.length==0) {
                        this.figuras = [];
                        this.resetearVariables();
                    } else {
                        this.figuras = nuevoArray;
                    }
                },
                resetearVariables() {
                    this.figuraID = null;
                    this.figuraSeleccionada = false;
                    this.figuraObjeto = null;
                    this.figuras.forEach(element => {
                        element.selected = false;
                    });
                },
                cambiarColor(id, r, g, b, a, option) {
                    const index = this.figuras.findIndex(figura => figura.id === id);
                    this.figuras[index].cambiarColorPredeterminado(r, g, b, a, option);
                },
                seleccionarFigura(index) {
                    this.resetearVariables();
                    if(this.dibujar==false) {
                        this.figuras[index].selected = true;
                        this.figuraID = index;
                        this.figuraSeleccionada = true;
                        this.figuraObjeto = this.figuras[index];
                    }
                },
                moverCapaFigura(index, posicion) {
                    let aux = this.figuras[index];
                    if(posicion==="siguiente") {
                        if (index < 0 || index >= this.figuras.length-1) {
                            console.error("FUERA DE RANGO - Siguiente");
                            return;
                        }
                        this.figuras[index] = this.figuras[index+1];
                        this.figuras[index+1] = aux;
                        this.resetearVariables();
                        this.figuras[index].selected = false;
                        this.figuras[index+1].selected = true;
                        this.figuraSeleccionada = true; 
                        this.figuraID = index+1;
                        this.figuraObjeto = this.figuras[index+1];
                    } else if(posicion==="anterior") {
                        if (index <= 0 || index > this.figuras.length) {
                            console.error("FUERA DE RANGO - Anterior");
                            return;
                        }
                        this.figuras[index] = this.figuras[index-1];
                        this.figuras[index-1] = aux;
                        this.resetearVariables();
                        this.figuras[index].selected = false;
                        this.figuras[index-1].selected = true;
                        this.figuraSeleccionada = true; 
                        this.figuraID = index-1;
                        this.figuraObjeto = this.figuras[index-1];
                    }
                },
                obtenerColorRGB(r, g, b) {
                    return `rgb(${r}, ${g}, ${b})`;
                },
                asignarIconoFigura(tipo) {
                    if (tipo === 'rect') {
                        return 'fa-square';
                    } else if (tipo === 'line') {
                        return 'fa-minus';
                    } else if (tipo === 'ellipse') {
                        return 'fa-circle';
                    } else if (tipo === 'text') {
                        return 'fa-t';
                    } else {
                        return '';
                    }
                }
            },
            mounted() {
                //FIGURA SEEDER
                /* this.addFigure("rect");
                this.figuras[0].x = 300;
                this.figuras[0].y = 300;
                this.addFigure("text");
                this.figuras[0].x = 200;
                this.figuras[0].y = 200;
                this.addFigure("ellipse");
                this.figuras[0].x = 150;
                this.figuras[0].y = 250;
                console.log(this.figuras); */

                //CANVAS
                new p5((p) => {
                    let offsetX = 0;
                    let offsetY = 0;
                    let offsetX2 = 0;
                    let offsetY2 = 0;
                    let rectX = 0;
                    let rectY = 0;
                    let rectWidth = 0;
                    let rectHeight = 0;

                    p.setup = () => {
                        var divCanvas = document.getElementById("area-canvas");
                        var canvasAncho = divCanvas.offsetWidth;
                        var canvasAlto = divCanvas.offsetHeight;
                        p.createCanvas(canvasAncho, canvasAlto);
                    };

                    p.draw = () => {
                        p.background(255);
                        for (let i = this.figuras.length - 1; i >= 0; i--) {
                            if(this.figuras[i].hidden==false) {
                                if(this.figuras[i].selected==true) {
                                    p.stroke(12, 140, 233);
                                    p.strokeWeight(2);
                                    p.fill(0,0,0,0);
                                    if(this.figuras[i].type==="text") {
                                        p.rect(this.figuras[i].x-2, this.figuras[i].y-(this.figuras[i].h), this.figuras[i].w+4, this.figuras[i].h+8);
                                    } else if(this.figuras[i].type==='line') {
                                        rectX = Math.min(this.figuras[i].x1, this.figuras[i].x2);
                                        rectY = Math.min(this.figuras[i].y1, this.figuras[i].y2);
                                        rectWidth = Math.abs(this.figuras[i].x2 - this.figuras[i].x1);
                                        rectHeight = Math.abs(this.figuras[i].y2 - this.figuras[i].y1);                   
                                        p.rect(rectX, rectY, rectWidth, rectHeight);
                                        /* let angle = p.atan2(this.figuras[i].y2 - this.figuras[i].y1, this.figuras[i].x2 - this.figuras[i].x1);
                                        let degrees = p.degrees(angle);
                                        p.push();
                                        p.translate(this.figuras[i].x1, this.figuras[i].y1);
                                        p.rotate(angle);
                                        p.rect(0, (-this.figuras[i].thickness / 2)-5, p.dist(this.figuras[i].x1, this.figuras[i].y1, this.figuras[i].x2, this.figuras[i].y2), this.figuras[i].thickness+10);
                                        p.pop();
                                        console.log("Ángulo: " + degrees.toFixed(2)); */
                                    } else {
                                        p.rect(this.figuras[i].x-6, this.figuras[i].y-6, this.figuras[i].w+12, this.figuras[i].h+12);
                                    }
                                }
                                this.figuras[i].dibujar(p);
                            }
                        }

                        if(this.dibujar==true){
                            if(this.dibujando==false) {
                                p.stroke(0);
                                p.fill(255);
                                p.strokeWeight(2);
                                if(this.tipoFigura==='rect') {
                                    p.rect(p.mouseX, p.mouseY, 100, 50);
                                } else if(this.tipoFigura==='ellipse') {
                                    p.ellipse(p.mouseX+25, p.mouseY+25, 50, 50);
                                } else if(this.tipoFigura==='text') {
                                    p.stroke(255);
                                    p.fill(0);
                                    p.strokeWeight(1);
                                    p.text("TEXTO", p.mouseX, p.mouseY);
                                }
                            } else if(this.dibujando) {
                                p.stroke(2);
                                p.strokeWeight(3);
                                p.fill(2);
                                p.circle(p.mouseX, p.mouseY, 10);
                                if(this.puntoInicio!=null) {
                                    p.line(this.puntoInicio.x, this.puntoInicio.y, p.mouseX, p.mouseY);
                                }
                            }
                        }
                    };

                    p.mouseClicked = () => {                      
                        if(this.dibujar==false) {
                            this.figuras.forEach((figura, index) => {
                                if(this.figuraSeleccionada==false&&figura.hidden==false) {
                                    if (p.mouseX >= figura.x &&
                                        p.mouseX <= figura.x + figura.w &&
                                        p.mouseY >= figura.y &&
                                        p.mouseY <= figura.y + figura.h &&
                                        figura.type!=='text' ) {
                                        this.figuraSeleccionada = true; 
                                        figura.selected = true;
                                        this.figuraID = index;
                                        this.figuraObjeto = figura;
                                    } else if(p.mouseX >= figura.x  &&
                                        p.mouseX <= figura.x + figura.w &&
                                        p.mouseY >= figura.y - figura.h &&
                                        p.mouseY <= figura.y+8 &&
                                        figura.type==='text') {
                                        this.figuraSeleccionada = true; 
                                        figura.selected = true;
                                        this.figuraID = index;
                                        this.figuraObjeto = figura;
                                    } else if(figura.type==='line') {
                                        let rectX2 = Math.min(figura.x1, figura.x2);
                                        let rectY2 = Math.min(figura.y1, figura.y2);
                                        let rectWidth2 = Math.abs(figura.x2 - figura.x1);
                                        let rectHeight2 = Math.abs(figura.y2 - figura.y1);
                                        if (p.mouseX >= rectX2 && p.mouseX <= rectX2 + rectWidth2 && p.mouseY >= rectY2 && p.mouseY <= rectY2 + rectHeight2) {
                                            this.figuraSeleccionada = true; 
                                            figura.selected = true;
                                            this.figuraID = index;
                                            this.figuraObjeto = figura;
                                        }
                                    }
                                }
                            });
                        }
                    }

                    p.mousePressed = () => {
                        if(this.dibujar && (p.mouseX > 0 && p.mouseX < p.width && p.mouseY > 0 && p.mouseY < p.height)) {
                            if(this.tipoFigura!=='line'&&this.tipoFigura!=='') {
                                this.addFigure(this.tipoFigura, p.mouseX, p.mouseY);
                            }

                            if(this.tipoFigura==='line'&&this.dibujando==true) {
                                if(this.puntoInicio.length==0) {
                                    this.puntoInicio = {
                                        x: p.mouseX,
                                        y: p.mouseY,
                                    }
                                } else if(this.puntoFinal.length==0) {
                                    this.puntoFinal = {
                                        x: p.mouseX,
                                        y: p.mouseY,
                                    }
                                    this.addFigure(this.tipoFigura);
                                    this.figuras[0].x1 = this.puntoInicio.x;
                                    this.figuras[0].y1 = this.puntoInicio.y;
                                    this.figuras[0].x2 = this.puntoFinal.x;
                                    this.figuras[0].y2 = this.puntoFinal.y;
                                    this.puntoInicio = [];
                                    this.puntoFinal = [];
                                }
                            }
                        }

                        if(this.figuraID != null && this.figuras[this.figuraID] !== undefined) {
                            if (
                                p.mouseX > this.figuras[this.figuraID].x &&
                                p.mouseX < this.figuras[this.figuraID].x + this.figuras[this.figuraID].w &&
                                p.mouseY > this.figuras[this.figuraID].y &&
                                p.mouseY < this.figuras[this.figuraID].y + this.figuras[this.figuraID].h &&
                                this.figuras[this.figuraID].type!=='text'&&this.figuras[this.figuraID].type!=='line'
                            ) {
                                if (this.figuraID !== null) {
                                    offsetX = p.mouseX - this.figuras[this.figuraID].x;
                                    offsetY = p.mouseY - this.figuras[this.figuraID].y;
                                }
                            } else if(
                                p.mouseX >= this.figuras[this.figuraID].x  &&
                                p.mouseX <= this.figuras[this.figuraID].x + this.figuras[this.figuraID].w &&
                                p.mouseY >= this.figuras[this.figuraID].y - this.figuras[this.figuraID].h &&
                                p.mouseY <= this.figuras[this.figuraID].y+8 &&
                                this.figuras[this.figuraID].type==='text'
                            ) {
                                offsetX = p.mouseX - this.figuras[this.figuraID].x;
                                offsetY = p.mouseY - this.figuras[this.figuraID].y;
                            } else if(this.figuras[this.figuraID].type==='line') {
                                let rectX3 = Math.min(this.figuras[this.figuraID].x1, this.figuras[this.figuraID].x2);
                                let rectY3 = Math.min(this.figuras[this.figuraID].y1, this.figuras[this.figuraID].y2);
                                let rectWidth3 = Math.abs(this.figuras[this.figuraID].x2 - this.figuras[this.figuraID].x1);
                                let rectHeight3 = Math.abs(this.figuras[this.figuraID].y2 - this.figuras[this.figuraID].y1);

                                if (p.mouseX >= rectX3 && p.mouseX <= rectX3 + rectWidth3 && p.mouseY >= rectY3 && p.mouseY <= rectY3 + rectHeight3) {
                                    offsetX = p.mouseX - this.figuras[this.figuraID].x1;
                                    offsetY = p.mouseY - this.figuras[this.figuraID].y1;
                                    offsetX2 = p.mouseX - this.figuras[this.figuraID].x2;
                                    offsetY2 = p.mouseY - this.figuras[this.figuraID].y2;
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
                                p.mouseY < this.figuras[this.figuraID].y + this.figuras[this.figuraID].h &&
                                this.figuras[this.figuraID].type!=='text'
                            ) {
                                if (this.figuraID !== null && this.figuras[this.figuraID].hidden==false) {
                                    this.figuras[this.figuraID].x = p.mouseX - offsetX;
                                    this.figuras[this.figuraID].y = p.mouseY - offsetY;
                                }
                            } else if(
                                p.mouseX >= this.figuras[this.figuraID].x  &&
                                p.mouseX <= this.figuras[this.figuraID].x + this.figuras[this.figuraID].w &&
                                p.mouseY >= this.figuras[this.figuraID].y - this.figuras[this.figuraID].h &&
                                p.mouseY <= this.figuras[this.figuraID].y+8 &&
                                this.figuras[this.figuraID].type==='text') {
                                    if (this.figuraID !== null && this.figuras[this.figuraID].hidden==false) {
                                    this.figuras[this.figuraID].x = p.mouseX - offsetX;
                                    this.figuras[this.figuraID].y = p.mouseY - offsetY;
                                }
                            } else if(this.figuras[this.figuraID].type==='line') {
                                let rectX4 = Math.min(this.figuras[this.figuraID].x1, this.figuras[this.figuraID].x2);
                                let rectY4 = Math.min(this.figuras[this.figuraID].y1, this.figuras[this.figuraID].y2);
                                let rectWidth4 = Math.abs(this.figuras[this.figuraID].x2 - this.figuras[this.figuraID].x1);
                                let rectHeight4 = Math.abs(this.figuras[this.figuraID].y2 - this.figuras[this.figuraID].y1);
                                
                                if (p.mouseX >= rectX4 && p.mouseX <= rectX4 + rectWidth4 && p.mouseY >= rectY4 && p.mouseY <= rectY4 + rectHeight4) {
                                    if (this.figuraID !== null && this.figuras[this.figuraID].hidden==false) {
                                        this.figuras[this.figuraID].x1 = p.mouseX - offsetX;
                                        this.figuras[this.figuraID].y1 = p.mouseY - offsetY;
                                        this.figuras[this.figuraID].x2 = p.mouseX - offsetX2;
                                        this.figuras[this.figuraID].y2 = p.mouseY - offsetY2;
                                    }
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
                                p.mouseY < this.figuras[this.figuraID].y + this.figuras[this.figuraID].h &&
                                this.figuras[this.figuraID].type!=='text')
                            ) {
                                if (this.figuraID !== null && (p.mouseX > 0 && p.mouseX < p.width && p.mouseY > 0 && p.mouseY < p.height)) {
                                    this.figuras[this.figuraID].selected = false;
                                    this.figuraSeleccionada = false;
                                }
                            } else if(
                                p.mouseX >= this.figuras[this.figuraID].x  &&
                                p.mouseX <= this.figuras[this.figuraID].x + this.figuras[this.figuraID].w &&
                                p.mouseY >= this.figuras[this.figuraID].y - this.figuras[this.figuraID].h &&
                                p.mouseY <= this.figuras[this.figuraID].y+8 &&
                                this.figuras[this.figuraID].type==='text') {
                                if (this.figuraID !== null && (p.mouseX > 0 && p.mouseX < p.width && p.mouseY > 0 && p.mouseY < p.height)) {
                                    this.figuras[this.figuraID].selected = false;
                                    this.figuraSeleccionada = false;
                                }
                            } else if(this.figuras[this.figuraID].type==='line') {
                                let rectX5 = Math.min(this.figuras[this.figuraID].x1, this.figuras[this.figuraID].x2);
                                let rectY5 = Math.min(this.figuras[this.figuraID].y1, this.figuras[this.figuraID].y2);
                                let rectWidth5 = Math.abs(this.figuras[this.figuraID].x2 - this.figuras[this.figuraID].x1);
                                let rectHeight5 = Math.abs(this.figuras[this.figuraID].y2 - this.figuras[this.figuraID].y1);
                                
                                if (p.mouseX >= rectX5 && p.mouseX <= rectX5 + rectWidth5 && p.mouseY >= rectY5 && p.mouseY <= rectY5 + rectHeight5) {
                                    if (this.figuraID !== null && (p.mouseX > 0 && p.mouseX < p.width && p.mouseY > 0 && p.mouseY < p.height)) {
                                        this.figuras[this.figuraID].selected = false;
                                        this.figuraSeleccionada = false;
                                    }
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