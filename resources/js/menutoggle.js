const icoDrop = document.getElementById('ico-drop');
const catalogos = document.getElementById('catalogos');

icoDrop.addEventListener('click', () => {
    catalogos.classList.toggle('activo');
})