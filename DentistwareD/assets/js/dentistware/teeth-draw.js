var bg;
var myTeeth;
var ratio;

preload = function() {
    bg = loadImage("../assets/img/Teeth.png");
}

setup = function() {
    var canvas = createCanvas(windowWidth / 5, windowHeight/ 2);
    ratio = width / 40;
    canvas.parent('teeth-diagram');
    myTeeth = new Teeth();
}

draw = function() {
    background(bg);
    myTeeth.draw();
}

windowResized = function() {
    resizeCanvas(windowWidth / 3, windowHeight);
    myTeeth = new Teeth();
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
    this.teeth = [
        //Top teeths
        new Tooth(1, width * 0.166, height * 0.468, [1, 0, 0, 0, 0, 0]),
        new Tooth(2, width * 0.183, height * 0.393, [0, 1, 0, 0, 1, 1]),
        new Tooth(3, width * 0.200, height * 0.325, [0, 1, 0, 1, 0, 1]),
        new Tooth(4, width * 0.233, height * 0.257, [0, 1, 0, 1, 0, 1]),
        new Tooth(5, width * 0.275, height * 0.206, [0, 1, 0, 1, 0, 1]),
        new Tooth(6, width * 0.300, height * 0.157, [0, 1, 0, 1, 0, 1]),
        new Tooth(7, width * 0.371, height * 0.125, [0, 1, 0, 1, 0, 1]),
        new Tooth(8, width * 0.450, height * 0.105, [0, 1, 0, 1, 0, 1]),
        new Tooth(9, width * 0.550, height * 0.105, [0, 1, 0, 1, 0, 1]),
        new Tooth(10, width * 0.628, height * 0.125, [0, 1, 0, 1, 0, 1]),
        new Tooth(11, width * 0.700, height * 0.157, [0, 1, 0, 1, 0, 1]),
        new Tooth(12, width * 0.725, height * 0.206, [0, 1, 0, 1, 0, 1]),
        new Tooth(13, width * 0.766, height * 0.257, [0, 1, 0, 1, 0, 1]),
        new Tooth(14, width * 0.800, height * 0.325, [0, 1, 0, 1, 0, 1]),
        new Tooth(15, width * 0.816, height * 0.393, [0, 1, 0, 1, 0, 1]),
        new Tooth(16, width * 0.833, height * 0.468, [0, 0, 0, 0, 0, 0]),

        //Bottom teeths	
        new Tooth(17, width * 0.816, height * 0.562, [0, 1, 0, 1, 0, 1]),
        new Tooth(18, width * 0.808, height * 0.637, [0, 1, 0, 1, 0, 1]),
        new Tooth(19, width * 0.783, height * 0.720, [0, 1, 0, 1, 0, 1]),
        new Tooth(20, width * 0.750, height * 0.790, [0, 1, 0, 1, 0, 1]),
        new Tooth(21, width * 0.700, height * 0.835, [0, 1, 0, 1, 0, 1]),
        new Tooth(22, width * 0.658, height * 0.875, [0, 1, 0, 1, 0, 1]),
        new Tooth(23, width * 0.596, height * 0.893, [0, 1, 0, 1, 0, 1]),
        new Tooth(24, width * 0.533, height * 0.903, [0, 1, 0, 1, 0, 1]),
        new Tooth(25, width * 0.463, height * 0.903, [0, 1, 0, 1, 0, 1]),
        new Tooth(26, width * 0.400, height * 0.893, [0, 1, 0, 1, 0, 1]),
        new Tooth(27, width * 0.341, height * 0.871, [0, 1, 0, 1, 0, 1]),
        new Tooth(28, width * 0.291, height * 0.830, [0, 1, 0, 1, 0, 1]),
        new Tooth(29, width * 0.241, height * 0.787, [0, 1, 0, 1, 0, 1]),
        new Tooth(30, width * 0.216, height * 0.720, [0, 1, 0, 1, 0, 1]),
        new Tooth(31, width * 0.191, height * 0.637, [0, 1, 0, 1, 0, 1]),
        new Tooth(32, width * 0.183, height * 0.562, [0, 1, 0, 1, 0, 1])
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
        var widthPond = width / 100;
        var heightPond = height / 200;

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
                        fill(100);
                        stroke(100);
                        line(xAux - widthPond - 1, yAux - heightPond - 1, xAux + widthPond, yAux + heightPond);
                        line(xAux - widthPond - 1, yAux + heightPond, xAux + widthPond, yAux - heightPond - 1);
                        count++;
                    }
                    charAux = 'E';
                    break;
                case 'E':
                    if (this.state[1] == 1) {
                        fill(100);
                        stroke(100);
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
                        ellipse(xAux, yAux, width / 200, width / 200);
                        count++;
                    }
                    charAux = 'O';
                    break;
                case 'O':
                    if (this.state[3] == 1) {
                        fill(256, 0, 0);
                        stroke(256, 0, 0);
                        ellipse(xAux, yAux, width / 200, width / 200);
                        count++;
                    }
                    charAux = 'C';
                    break;
                case 'C':
                    if (this.state[4] == 1) {
                        fill(256);
                        stroke(100);
                        ellipse(xAux, yAux, width / 200, width / 200);
                        count++;
                    }
                    charAux = 'T';
                    break;
                case 'T':
                    if (this.state[5] == 1) {
                        fill(100);
                        stroke(100);
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
    