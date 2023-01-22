/* mail.blade.php */
const message = document.getElementById('message');
const guestName = document.getElementById('guestName').textContent
const start = document.getElementById('start').textContent
const shopName = document.getElementById('shopName').textContent
const number = document.getElementById('number').textContent


window.addEventListener('load', () => {
  message.textContent =
    guestName + ' さま\n\nいつもRESEをご利用いただき、誠にありがとうございます。\n\nレストランのご予約が確定いたしました。\n下記にてご予約内容の確認をお願いいたします。\n\n店名 : ' + shopName + '\n日時 : ' + start + '\n人数 : ' + number + '名様\n\n当日はどうぞお気をつけてお越しくださいませ。'
});