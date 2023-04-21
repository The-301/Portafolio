const myCard = document.getElementById('myCard');
let hue = 0;

function changeColor() {
  hue = (hue + 1) % 360;
  myCard.style.backgroundColor = `hsl(${hue}, 100%, 50%)`;
  setTimeout(changeColor, 10);
}

changeColor();

