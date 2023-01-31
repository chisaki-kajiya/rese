// search-box
const searchArea = document.getElementById('search_area');
const searchGenre = document.getElementById('search_genre');
const searchName = document.getElementById('search_name');

searchArea.addEventListener('change', () => {
  location.href = 'search?area_id=' + searchArea.value + '&genre_id=' + searchGenre.value + '&name=' + searchName.value
});
searchGenre.addEventListener('change', () => {
  location.href = 'search?area_id=' + searchArea.value + '&genre_id=' + searchGenre.value + '&name=' + searchName.value
});