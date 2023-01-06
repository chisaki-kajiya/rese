/* search-box */
const searchArea = document.getElementById('searchArea');
const searchGenre = document.getElementById('searchGenre');
searchArea.addEventListener('change', () => {
  location.href = 'search?area_id=' + searchArea.value + '&genre_id=' + searchGenre.value + '&name=Search+...'
});
searchGenre.addEventListener('change', () => {
  location.href = 'search?area_id=' + searchArea.value + '&genre_id=' + searchGenre.value + '&name=Search+...'
});