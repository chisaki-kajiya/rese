// search-box
const searchArea = document.getElementById('searchArea');
const searchGenre = document.getElementById('searchGenre');
const searchName = document.getElementById('searchName');

searchArea.addEventListener('change', () => {
  location.href = 'search?area_id=' + searchArea.value + '&genre_id=' + searchGenre.value + '&name=' + searchName.value
});
searchGenre.addEventListener('change', () => {
  location.href = 'search?area_id=' + searchArea.value + '&genre_id=' + searchGenre.value + '&name=' + searchName.value
});