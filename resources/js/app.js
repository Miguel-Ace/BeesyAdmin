import './bootstrap';
const horasPropuestas = document.getElementById('horas_propuestas');
const horasReales = document.getElementById('horas_reales');
const rendimiento = document.getElementById('rendimiento');
const btnEnviar = document.getElementById('btnEnviar');

btnEnviar ?
btnEnviar.addEventListener('click', agregarValor)
:''

function agregarValor() {
    const hrsP = parseFloat(horasPropuestas.value);
    const hrsR = parseFloat(horasReales.value);

    const resul = hrsP - hrsR;

    rendimiento.value = resul;
    console.log(resul);
}

