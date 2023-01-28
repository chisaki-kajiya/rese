const point = document.getElementById('star-point').innerText;
const text = document.getElementById('star-point');

const star1 = document.getElementById('yellow-star1');
const star2 = document.getElementById('yellow-star2');
const star3 = document.getElementById('yellow-star3');
const star4 = document.getElementById('yellow-star4');

if (point > 4.5) {
  star1.style.display = 'inline';
  star2.style.display = 'inline';

} else if (point > 3.5) {
  star1.style.display = 'inline';

} else if (point > 2.5) {

} else if (point > 1.5) {
  star3.style.display = 'none';

} else {
  star3.style.display = 'none';
  star4.style.display = 'none'
};