$(document).ready(function() {
  $("#span").typed({
  stringsElement: $("#typedStrings"),
  typeSpeed: 70,
  showCursor: false,
  contentType: "html"
  });
  var colors = [["green","#00E676"],];
  var randomColor = colors[Math.floor(Math.random() * colors.length)];
  var initialColor = randomColor[0];
  var initialHeartColor = randomColor[1];
  function colorChange(color, heart){
  $('#span').attr('class', color);
  $('#heart').css('background', heart);
  } 
  colorChange(initialColor);
});
  