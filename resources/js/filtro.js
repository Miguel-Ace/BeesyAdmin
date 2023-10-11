const selectCliente = document.querySelector('#cliente');
const selectColaborador = document.querySelector('#colaborador');
const selectEstado = document.querySelector('#estado');
const selectEmpresa = document.querySelector('#select_empresa');
const selectOrigenAsistencia = document.querySelector('#origen_asistencia');
const listaSoporte = document.querySelectorAll('#listaSoporte tr');
const fecha1 = document.querySelector('#fecha1');
const fecha2 = document.querySelector('#fecha2');

// Almacenar el estado de los filtros
let empresaFiltrado = '';
let clienteFiltrado = '';
let colaboradorFiltrado = '';
let estadoFiltrado = '';
let origenAsistenciaFiltrado = '';
let fecha1valor = '';
let fecha2valor = '';

selectEmpresa.addEventListener('change', () => {
  empresaFiltrado = selectEmpresa.value;
  filtrarListaSoporte();
});

selectCliente.addEventListener('change', () => {
  clienteFiltrado = selectCliente.value;
  filtrarListaSoporte();
});

selectColaborador.addEventListener('change', () => {
  colaboradorFiltrado = selectColaborador.value;
  filtrarListaSoporte();
});

selectEstado.addEventListener('change', () => {
  estadoFiltrado = selectEstado.value;
  filtrarListaSoporte();
});

selectOrigenAsistencia.addEventListener('change', () => {
  origenAsistenciaFiltrado = selectOrigenAsistencia.value;
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
    const valorEmpresa = item.querySelector('td:nth-child(3)').textContent;
    const valorColaboradorTd = item.querySelector('td:nth-child(4)').textContent;
    const valorClienteTd = item.querySelector('td:nth-child(8)').textContent;
    const valorEstado = item.querySelector('td:nth-child(12)').textContent;
    const valorOrigenAsistencia = item.querySelector('td:nth-child(16)').textContent;
    const valorFecha = item.querySelector('td:nth-child(6)').textContent;

    // Comprobar si el elemento coincide con los filtros activos
    const coincideEmpresa = empresaFiltrado === '' || empresaFiltrado === valorEmpresa;
    const coincideColaborador = colaboradorFiltrado === '' || colaboradorFiltrado === valorColaboradorTd;
    const coincideCliente = clienteFiltrado === '' || clienteFiltrado === valorClienteTd;
    const coincideEstado = estadoFiltrado === '' || estadoFiltrado === valorEstado;
    const coincideOrigenAsistencia = origenAsistenciaFiltrado === '' || origenAsistenciaFiltrado === valorOrigenAsistencia;
    const coincideFecha1 = fecha1valor == '' || fecha1valor <= valorFecha;
    const coincideFecha2 = fecha2valor == '' || fecha2valor >= valorFecha;

    if (((coincideCliente && coincideColaborador) && (coincideFecha1 && coincideFecha2)) && ((coincideEstado && coincideEmpresa) && coincideOrigenAsistencia)) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
}