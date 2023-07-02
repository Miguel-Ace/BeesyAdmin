const icoDrop = document.getElementById('ico-drop');
const catalogos = document.getElementById('catalogos');

icoDrop.addEventListener('click', () => {
    catalogos.classList.toggle('activo');
})

const iconInner = document.querySelector('.contraer')
const contenedor = document.querySelector('.contenedor')

iconInner.onclick = () => {
    contenedor.classList.toggle('active')
    iconInner.classList.toggle('activo')
}