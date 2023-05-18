class Figura {
    constructor(tipoFigura) {
        this.id = Figura.generarID();
        this.type = tipoFigura;
        this.visible = true;
        this.selected = false;
        /* this.selected = false;
        this.dragging = false; */

        if(tipoFigura === 'rect') {
            this.x = 50;
            this.y = 50;
            this.w = 100;
            this.h = 50;
            this.corner = 0;
            /* RELLENO */
            this.fill_r = 255;
            this.fill_g = 88;
            this.fill_b = 255;
            this.fill_a = 255;
            /* BORDE */
            this.thickness = 5;
            this.border_r = 45;
            this.border_g = 145;
            this.border_b = 45;
            this.border_a = 255;
        } /* else if(tipoFigura === 'line') {
            this.x1 = 0;
            this.y1 = 0;
            this.x2 = 100;
            this.y2 = 100;
            this.thickness = 1;
            this.fill = {
                r: 0,
                g: 0,
                b: 0,
                a: 1,
            };
        } else if(tipoFigura === 'ellipse') {
            this.x = 0;
            this.y = 0;
            this.w = 50; //RADIO X
            this.h = 50; //RADIO Y
            this.fill = {
                r: 255,
                g: 255,
                b: 255,
                a: 1,
            };
            this.thickness = 1;
            this.border = {
                r: 0,
                g: 0,
                b: 0,
                a: 1,
            }
        } else if(tipoFigura === 'text') {
            this.text = "";
            this.x = 0;
            this.y = 0;
            this.size = 16;
        } */
    }

    dibujar(p) {
        if (this.type == 'rect') {
            //BORDE GROSOR
            p.strokeWeight(this.thickness);
            //BORDE COLOR Y OPACIDAD
            p.stroke(this.border_r, this.border_g, this.border_b, this.border_a);
            //RELLENO COLOR Y OPACIDAD
            p.fill(this.fill_r, this.fill_g, this.fill_b, this.fill_a);
            //DIBUJAR RECTÁNGULO Y ESQUINAS REDONDEADAS
            p.rect(this.x, this.y, this.w, this.h, this.corner);
        } /* else if (this.type === 'line') {
            //GROSOR
            strokeWeight(this.thickness);
            //COLOR Y OPACIDAD
            stroke(this.fill.r, this.fill.g, this.fill.b, this.fill.a);
            //DIBUJAR LÍNEA
            line(this.x1, this.y1, this.x2, this.y2);
        } else if (this.type === 'ellipse') {
            //BORDE COLOR Y OPACIDAD
            stroke(this.fill.r, this.fill.g, this.fill.b, this.fill.a);
            //BORDE GROSOR
            strokeWeight(this.thickness);
            //RELLENO COLOR Y OPACIDAD
            fill(this.fill.r, this.fill.g, this.fill.b, this.fill.a);
            //DIBUJAR ELIPSE
            ellipse(this.x, this.y, this.w, this.h);
        } else if(this.type === 'text') {
            //TAMAÑO DE LETRA
            textSize(this.size);
            //DIBUJAR TEXTO
            text(this.text, this.x, this.y);
        } */ else {
            console.log('No se pudo dibujar la figura.');
        }
    }

    //static contador = 0;
    static generarID() {
        //Figura.contador++;
        //return Figura.contador;
        return Math.floor(Math.random() * (9999999 - 1000000 + 1) + 1000000)
    }

}
