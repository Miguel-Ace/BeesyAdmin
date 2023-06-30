const selectCliente = document.querySelector('#cliente');
const selectColaborador = document.querySelector('#colaborador');
const listaSoporte = document.querySelectorAll('#listaSoporte tr');
const fecha1 = document.querySelector('#fecha1');
const fecha2 = document.querySelector('#fecha2');

// Almacenar el estado de los filtros
let clienteFiltrado = '';
let colaboradorFiltrado = '';
let fecha1valor = '';
let fecha2valor = '';

selectCliente.addEventListener('change', () => {
  clienteFiltrado = selectCliente.value;
  filtrarListaSoporte();
});

selectColaborador.addEventListener('change', () => {
  colaboradorFiltrado = selectColaborador.value;
  filtrarListaSoporte();
});

fecha1.addEventListener('change', () => {
    fecha1valor = fecha1.value
    filtrarListaSoporte()
})

fecha2.addEventListener('change', () => {
    fecha2valor = fecha2.value
    fecha2valor = new Date(fecha2valor)
    fecha2valor.setDate(fecha2valor.getDate() + 1)
    fecha2valor = fecha2valor.toISOString().split("T")[0];
    filtrarListaSoporte()
})

function filtrarListaSoporte() {
  listaSoporte.forEach((item) => {
    const valorClienteTd = item.querySelector('td:nth-child(8)').textContent;
    const valorColaboradorTd = item.querySelector('td:nth-child(3)').textContent;
    const valorFecha = item.querySelector('td:nth-child(4)').textContent;

    // Comprobar si el elemento coincide con los filtros activos
    const coincideCliente = clienteFiltrado === '' || clienteFiltrado === valorClienteTd;
    const coincideColaborador = colaboradorFiltrado === '' || colaboradorFiltrado === valorColaboradorTd;
    const coincideFecha1 = fecha1valor == '' || fecha1valor <= valorFecha;
    const coincideFecha2 = fecha2valor == '' || fecha2valor >= valorFecha;

    if ((coincideCliente && coincideColaborador) && (coincideFecha1 && coincideFecha2)) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
}