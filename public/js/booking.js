/* booking-form__confirmation */
/* date */
const bookingDate = document.getElementById('booking_date');
const cfmDate = document.getElementById('cfm_date');

bookingDate.addEventListener('change', () => {
  cfmDate.innerText = bookingDate.value
});

/* time */
const bookingTime = document.getElementById('booking_time');
const cfmTime = document.getElementById('cfm_time');

bookingTime.addEventListener('change', () => {
  cfmTime.innerText = bookingTime.value
});

/* number */
const bookingNumber = document.getElementById('booking_number');
const cfmNumber = document.getElementById('cfm_number');

bookingNumber.addEventListener('change', () => {
  cfmNumber.innerText = bookingNumber.value + '人'
});

/* course */
const bookingCourse = document.getElementById('booking_course');
const cfmCourse = document.getElementById('cfm_course');

bookingCourse.addEventListener('change', () => {
  cfmCourse.textContent = bookingCourse.options[bookingCourse.selectedIndex].textContent;
});