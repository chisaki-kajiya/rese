/* drawer-menu */
const target = document.getElementById('header__icon');

target.addEventListener('click', () => {
  target.classList.toggle('open');
  const nav = document.getElementById('drawer-menu');
  nav.classList.toggle('in')
});