const changeDate = document.getElementById('changeDate')

changeDate.addEventListener('change', () => {
  location.href = 'search?area_id=' + searchArea.value + '&genre_id=' + searchGenre.value + '&name=Search+...'
});