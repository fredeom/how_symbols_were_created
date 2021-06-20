const SX = 15, SY = 15;

function draw(e, x, y, ctx) {
  if (Array.isArray(e) && Array.isArray(e[0])) {
    var ends = [[x, y]];
    var tmpEnds = [];
    e.forEach(e1 => {
      tmpEnds = [];
      ends.forEach(end => {
        if (Array.isArray(e1[0])) {
          e1.forEach(e2 => {
            tmpEnds.push(...draw(e2, end[0], end[1], ctx));
          });
        } else {
          tmpEnds.push(...draw(e1, end[0], end[1], ctx));
        }
      });
      ends = [...tmpEnds];
    });
  } else {
    var xf = x + e[2] * SX,
        yf = y - e[3] * SY;

    ctx.beginPath();
    ctx.moveTo(x + e[0] * SX, y - e[1] * SY);
    ctx.lineTo(xf, yf);
    ctx.stroke();

    ends = [[xf, yf]];
  }
  return ends;
}

$(document).ready(() => {
  $("canvas").css('background', '#eee');

  draw(eval(tree), $("canvas").width() / 2, $("canvas").height() / 2, $("canvas")[0].getContext('2d'));
});