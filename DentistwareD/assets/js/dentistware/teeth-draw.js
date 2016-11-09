var bg;
var myTeeth;
var ratio;

preload = function() {
    bg = loadImage(js_site_url + "assets/img/Teeth.png");
}

setup = function() {
    var canvas = createCanvas(windowWidth * 0.583333333, windowWidth * 0.858229166);
    canvas.parent('teeth-diagram');
    ratio = width / 40;    
    myTeeth = new Teeth();
}

draw = function() {
    background(bg);
    myTeeth.draw();
}

windowResized = function() {
    resizeCanvas(windowWidth * 0.583333333, windowWidth * 0.858229166);    
    myTeeth = new Teeth();
    ratio = width / 40;
}

mouseClicked = function() {

    var distance;

    for (var i = 0; i < myTeeth.teeth.length; i++) {
        distance = Math.sqrt(pow((myTeeth.teeth[i].x - mouseX), 2) + pow((myTeeth.teeth[i].y - mouseY), 2));
        if (distance < ratio) {
            switch (stateAux) {
                case 'A':
                    myTeeth.teeth[i].state[0] = (myTeeth.teeth[i].state[0] === 1) ? 0 : 1;
                    break;
                case 'E':
                    myTeeth.teeth[i].state[1] = (myTeeth.teeth[i].state[1] === 1) ? 0 : 1;
                    break;
                case 'D':
                    myTeeth.teeth[i].state[2] = (myTeeth.teeth[i].state[2] === 1) ? 0 : 1;
                    break;
                case 'O':
                    myTeeth.teeth[i].state[3] = (myTeeth.teeth[i].state[3] === 1) ? 0 : 1;
                    break;
                case 'C':
                    myTeeth.teeth[i].state[4] = (myTeeth.teeth[i].state[4] === 1) ? 0 : 1;
                    break;
                case 'T':
                    myTeeth.teeth[i].state[5] = (myTeeth.teeth[i].state[5] === 1) ? 0 : 1;
                    break;
            }
        }
    }
}


Teeth = function() {
    for(var i = 0; i<32; i++){
        if(teeth[i] == null){
            teeth[i] = [0,0,0,0,0,0];
        }
    }
    this.teeth = [
        //Top teeths
        new Tooth(1 , width * 0.166, height * 0.468, teeth[0 ]),
        new Tooth(2 , width * 0.183, height * 0.393, teeth[1 ]),
        new Tooth(3 , width * 0.200, height * 0.325, teeth[2 ]),
        new Tooth(4 , width * 0.233, height * 0.257, teeth[3 ]),
        new Tooth(5 , width * 0.275, height * 0.206, teeth[4 ]),
        new Tooth(6 , width * 0.300, height * 0.157, teeth[5 ]),
        new Tooth(7 , width * 0.371, height * 0.125, teeth[6 ]),
        new Tooth(8 , width * 0.450, height * 0.105, teeth[7 ]),
        new Tooth(9 , width * 0.550, height * 0.105, teeth[8 ]),
        new Tooth(10, width * 0.628, height * 0.125, teeth[9 ]),
        new Tooth(11, width * 0.700, height * 0.157, teeth[10]),
        new Tooth(12, width * 0.725, height * 0.206, teeth[11]),
        new Tooth(13, width * 0.766, height * 0.257, teeth[12]),
        new Tooth(14, width * 0.800, height * 0.325, teeth[13]),
        new Tooth(15, width * 0.816, height * 0.393, teeth[14]),
        new Tooth(16, width * 0.833, height * 0.468, teeth[15]),

        //Bottom teeths	
        new Tooth(17, width * 0.816, height * 0.562, teeth[16]),
        new Tooth(18, width * 0.808, height * 0.637, teeth[17]),
        new Tooth(19, width * 0.783, height * 0.720, teeth[18]),
        new Tooth(20, width * 0.750, height * 0.790, teeth[19]),
        new Tooth(21, width * 0.700, height * 0.835, teeth[20]),
        new Tooth(22, width * 0.658, height * 0.875, teeth[21]),
        new Tooth(23, width * 0.596, height * 0.893, teeth[22]),
        new Tooth(24, width * 0.533, height * 0.903, teeth[23]),
        new Tooth(25, width * 0.463, height * 0.903, teeth[24]),
        new Tooth(26, width * 0.400, height * 0.893, teeth[25]),
        new Tooth(27, width * 0.341, height * 0.871, teeth[26]),
        new Tooth(28, width * 0.291, height * 0.830, teeth[27]),
        new Tooth(29, width * 0.241, height * 0.787, teeth[28]),
        new Tooth(30, width * 0.216, height * 0.720, teeth[29]),
        new Tooth(31, width * 0.191, height * 0.637, teeth[30]),
        new Tooth(32, width * 0.183, height * 0.562, teeth[31])
    ];
}

Teeth.prototype = {
    draw: function() {
        for (var i = 0; i < this.teeth.length; i++) {
            this.teeth[i].draw();
        }
    },
}

Tooth = function(_num, _xPos, _yPos, _st) {
    this.n = _num;
    this.x = _xPos;
    this.y = _yPos;
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
        var divs = Math.PI / sum;

        var count = 0;
        var xAux, yAux;
        var charAux = 'A';
        while (count < sum) {

            if (sum == 1) {
                xAux = this.x;
                yAux = this.y;
            } else {
                xAux = this.x + ratio * cos(count * PI / sum * 2);
                yAux = this.y + ratio * sin(count * PI / sum * 2);
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

$(document).ready(function(){
    $("input[name=state]").click(function () {
          stateAux = $(this).val();
      });
});
    