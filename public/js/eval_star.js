const star1 = document.getElementById('star1');
const star2 = document.getElementById('star2');
const star3 = document.getElementById('star3');
const star4 = document.getElementById('star4');
const star5 = document.getElementById('star5');

star1.addEventListener('click', () => {
  star1.style.color = '#ffd700';
  star2.style.color = '#ffd700';
  star3.style.color = '#ffd700';
  star4.style.color = '#ffd700';
  star5.style.color = '#ffd700';
});

star2.addEventListener('click', () => {
  star1.style.color = '#ffffff';
  star2.style.color = '#ffd700';
  star3.style.color = '#ffd700';
  star4.style.color = '#ffd700';
  star5.style.color = '#ffd700';
});

star3.addEventListener('click', () => {
  star1.style.color = '#ffffff';
  star2.style.color = '#ffffff';
  star3.style.color = '#ffd700';
  star4.style.color = '#ffd700';
  star5.style.color = '#ffd700';
});

star4.addEventListener('click', () => {
  star1.style.color = '#ffffff';
  star2.style.color = '#ffffff';
  star3.style.color = '#ffffff';
  star4.style.color = '#ffd700';
  star5.style.color = '#ffd700';
});

star5.addEventListener('click', () => {
  star1.style.color = '#ffffff';
  star2.style.color = '#ffffff';
  star3.style.color = '#ffffff';
  star4.style.color = '#ffffff';
  star5.style.color = '#ffd700';
});