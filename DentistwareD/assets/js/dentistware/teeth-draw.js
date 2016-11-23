var bg;
var myTeeth;
var modalWidth;
var modalHeight;
var editable = true;

preload = function() {
    bg = loadImage(js_site_url + "../assets/img/Teeth.png");
}

setup = function() {
    var canvas = createCanvas(modalWidth * 0.583333333, modalWidth   * 0.858229166);
    if(editable){
        canvas.parent('teeth-editor');
    } else {
        canvas.parent('teeth-viewer');
    }
    myTeeth = new Teeth();
}

draw = function() {
    background(bg);
    myTeeth.draw();
}

windowResized = function() {
    if(editable){
        modalWidth = $("#agregarRegistroModal").width();
        modalHeight = $("#agregarRegistroModal").height();
    } else {
        modalWidth = $("#verRegistroModal").width();
        modalHeight = $("#verRegistroModal").height();
    }
    resizeCanvas(modalWidth * 0.583333333, modalWidth * 0.858229166);
    myTeeth = new Teeth();
}

mouseClicked = function() {
    if(editable){
        var distance;
        for (var i = 0; i < myTeeth.teeth.length; i++) {
            distance = Math.sqrt(pow((myTeeth.teeth[i].x - mouseX), 2) + pow((myTeeth.teeth[i].y - mouseY), 2));
            ratio = myTeeth.teeth[i].ratio;
            if (distance < ratio) {
                switch (stateAux) {
                    case 'A':
                        myTeeth.teeth[i].state[0] = (myTeeth.teeth[i].state[0] === 1) ? 0 : 1;
                        teeth[i][0] = myTeeth.teeth[i].state[0];
                        break;
                    case 'E':
                        myTeeth.teeth[i].state[1] = (myTeeth.teeth[i].state[1] === 1) ? 0 : 1;
                        teeth[i][1] = myTeeth.teeth[i].state[1];
                        break;
                    case 'D':
                        myTeeth.teeth[i].state[2] = (myTeeth.teeth[i].state[2] === 1) ? 0 : 1;
                        teeth[i][2] = myTeeth.teeth[i].state[2];
                        break;  
                    case 'O':
                        myTeeth.teeth[i].state[3] = (myTeeth.teeth[i].state[3] === 1) ? 0 : 1;
                        teeth[i][3] = myTeeth.teeth[i].state[3];
                        break;
                    case 'C':
                        myTeeth.teeth[i].state[4] = (myTeeth.teeth[i].state[4] === 1) ? 0 : 1;
                        teeth[i][4] = myTeeth.teeth[i].state[4];
                        break;
                    case 'T':
                        myTeeth.teeth[i].state[5] = (myTeeth.teeth[i].state[5] === 1) ? 0 : 1;
                        teeth[i][5] = myTeeth.teeth[i].state[5];
                        break;
                }
                break;
            }
        }
    }
}

Teeth = function() {
    if(teeth == null){
        for(var i = 0; i<32; i++){
            teeth[i] = [0,0,0,0,0,0];
        }
    } else {
        for(var i = 0; i<32; i++){
            if(teeth[i] == null){
                teeth[i] = [0,0,0,0,0,0];
            }
        }
    }
    this.teeth = [
        //Top teeths
        new Tooth( 1, width * 0.171, height * 0.466, width / 20, teeth[ 0]),
        new Tooth( 2, width * 0.183, height * 0.395, width / 19, teeth[ 1]),
        new Tooth( 3, width * 0.205, height * 0.318, width / 19, teeth[ 2]),
        new Tooth( 4, width * 0.233, height * 0.256, width / 28, teeth[ 3]),
        new Tooth( 5, width * 0.268, height * 0.206, width / 26, teeth[ 4]),
        new Tooth( 6, width * 0.300, height * 0.158, width / 27, teeth[ 5]),
        new Tooth( 7, width * 0.365, height * 0.125, width / 28, teeth[ 6]),
        new Tooth( 8, width * 0.448, height * 0.105, width / 23, teeth[ 7]),
        new Tooth( 9, width * 0.551, height * 0.105, width / 23, teeth[ 8]),
        new Tooth(10, width * 0.633, height * 0.125, width / 28, teeth[ 9]),
        new Tooth(11, width * 0.701, height * 0.157, width / 27, teeth[10]),
        new Tooth(12, width * 0.735, height * 0.206, width / 25, teeth[11]),
        new Tooth(13, width * 0.766, height * 0.257, width / 26, teeth[12]),
        new Tooth(14, width * 0.795, height * 0.320, width / 19, teeth[13]),
        new Tooth(15, width * 0.816, height * 0.395, width / 19, teeth[14]),
        new Tooth(16, width * 0.830, height * 0.466, width / 20, teeth[15]),

        //Bottom teeths	
        new Tooth(17, width * 0.821, height * 0.562, width / 20, teeth[16]),
        new Tooth(18, width * 0.820, height * 0.639, width / 18, teeth[17]),
        new Tooth(19, width * 0.795, height * 0.722, width / 17, teeth[18]),
        new Tooth(20, width * 0.756, height * 0.787, width / 26, teeth[19]),
        new Tooth(21, width * 0.710, height * 0.835, width / 26, teeth[20]),
        new Tooth(22, width * 0.658, height * 0.874, width / 30, teeth[21]),
        new Tooth(23, width * 0.596, height * 0.893, width / 34, teeth[22]),
        new Tooth(24, width * 0.533, height * 0.903, width / 35, teeth[23]),
        new Tooth(25, width * 0.463, height * 0.903, width / 35, teeth[24]),
        new Tooth(26, width * 0.403, height * 0.893, width / 34, teeth[25]),
        new Tooth(27, width * 0.342, height * 0.874, width / 30, teeth[26]),
        new Tooth(28, width * 0.291, height * 0.833, width / 26, teeth[27]),
        new Tooth(29, width * 0.243, height * 0.787, width / 26, teeth[28]),
        new Tooth(30, width * 0.205, height * 0.721, width / 17, teeth[29]),
        new Tooth(31, width * 0.180, height * 0.639, width / 18, teeth[30]),
        new Tooth(32, width * 0.176, height * 0.562, width / 20, teeth[31])
    ];
}

Teeth.prototype = {
    draw: function() {
        for (var i = 0; i < this.teeth.length; i++) {
            this.teeth[i].draw();
        }
    },
}

Tooth = function(_num, _xPos, _yPos, _r, _st) {
    this.n = _num;
    this.x = _xPos;
    this.y = _yPos;
    this.ratio = _r;
    this.state = _st;
}

Tooth.prototype = {
    draw: function() {
        var widthPond = width * 0.0075;
        var heightPond = height * 0.00509770603;

        strokeCap(SQUARE);
        ellipseMode(RADIUS);

        var sum = 0;

        for (var i = 0; i < this.state.length; i++) {
            sum += this.state[i];
        }

        var count = 0;
        var xAux, yAux;
        var charAux = 'A';
        while (count < sum) {
            if (sum == 1) {
                xAux = this.x;
                yAux = this.y;
            } else {
                xAux = this.x + this.ratio * cos(count * PI / sum * 2);
                yAux = this.y + this.ratio * sin(count * PI / sum * 2);
            }
            switch (charAux) {
                case 'A':
                    if (this.state[0] == 1) {
                        fill(0);
                        stroke(0);
                        line(xAux - widthPond - 1, yAux - heightPond - 1, xAux + widthPond, yAux + heightPond);
                        line(xAux - widthPond - 1, yAux + heightPond, xAux + widthPond, yAux - heightPond - 1);
                        count++;
                    }
                    charAux = 'E';
                    break;
                case 'E':
                    if (this.state[1] == 1) {
                        fill(0);
                        stroke(0);
                        line(xAux - widthPond - 1, yAux - heightPond - 1, xAux + widthPond, yAux - heightPond - 1);
                        line(xAux - widthPond - 1, yAux + heightPond, xAux + widthPond, yAux + heightPond);
                        count++;
                    }
                    charAux = 'D';
                    break;
                case 'D':
                    if (this.state[2] == 1) {
                        fill(0, 0, 256);
                        stroke(0, 0, 256);
                        ellipse(xAux, yAux, widthPond, heightPond);
                        count++;
                    }
                    charAux = 'O';
                    break;
                case 'O':
                    if (this.state[3] == 1) {
                        fill(256, 0, 0);
                        stroke(256, 0, 0);
                        ellipse(xAux, yAux, widthPond, heightPond);
                        count++;
                    }
                    charAux = 'C';
                    break;
                case 'C':
                    if (this.state[4] == 1) {
                        fill(256);
                        stroke(0);
                        ellipse(xAux, yAux, widthPond, heightPond);
                        count++;
                    }
                    charAux = 'T';
                    break;
                case 'T':
                    if (this.state[5] == 1) {
                        fill(0);
                        stroke(0);
                        line(xAux - widthPond - 1, yAux - 0.5, xAux + widthPond, yAux - 0.5);
                        count++;
                    }
                    charAux = null;
                    break;
            }
        }
    }
}
