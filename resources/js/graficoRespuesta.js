const contenedorBarra = document.querySelector('.contenedor-barra')
const iconBarra = document.querySelector('.icon-barra')
const csv = document.querySelector('.contenedor-barra span')
const btnSalir = document.querySelector('.salir-grafico-respuesta')

iconBarra.addEventListener('click', () => {
    contenedorBarra.classList.toggle('activo')
})
btnSalir.addEventListener('click', () => {
    contenedorBarra.classList.remove('activo')
})