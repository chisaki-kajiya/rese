function showImage(input) {
  const image = document.getElementById('register-image');

  let file = input.files[0];
  console.log(file);

  let reader = new FileReader();
  reader.readAsDataURL(file);

  reader.onload = function () {
    image.src = reader.result;
    console.log(reader.result);
  };

  reader.onerror = function () {
    console.log(reader.error);
  };
}