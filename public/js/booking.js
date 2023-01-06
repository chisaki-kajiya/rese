/* booking-form__confirmation */
/* date */
const bookingDate = document.getElementById('bookingDate');
const cfmDate = document.getElementById('cfmDate');
var date = new Date();

cfmDate.innerText = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();

bookingDate.addEventListener('change', () => {
  cfmDate.innerText = bookingDate.value
});

/* time */
const bookingTime = document.getElementById('bookingTime');
const cfmTime = document.getElementById('cfmTime');

cfmTime.innerText = '17:00';

bookingTime.addEventListener('change', () => {
  cfmTime.innerText = bookingTime.value
});

/* number */
const bookingNumber = document.getElementById('bookingNumber');
const cfmNumber = document.getElementById('cfmNumber');

cfmNumber.innerText = '1人';

bookingNumber.addEventListener('change', () => {
  cfmNumber.innerText = bookingNumber.value + '人'
});