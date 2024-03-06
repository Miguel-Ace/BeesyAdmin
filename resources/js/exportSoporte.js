
// function exportarSoporte() {

//     // Crear contenido del archivo CSV
//     let csvContent = 'data:text/csv;charset=utf-8,';
//     csvContent += 'Fecha,Empresa,Ticket,Fecha Inicial Asistencia,Fecha Final Asistencia,Total de horas,Usuario,Origen de asistencia,Detalle Asitencia,Solucion,Observaciones,Asesor\n'; // Encabezados de las columnas

//     // Extrallendo los valores de los inputs
//     const selectColaborador = document.querySelector('#colaborador');
//     const selectCliente = document.querySelector('#cliente');
//     const selectEstado = document.querySelector('#estado');
//     const selectEmpresa = document.querySelector('#select_empresa');
//     const selectOrigenAsistencia = document.querySelector('#origen_asistencia');
//     const fecha1 = document.querySelector('#fecha1');
//     const fecha2 = document.querySelector('#fecha2');

//     let clienteFiltrado = selectCliente.value;
//     let colaboradorFiltrado = selectColaborador.value;
//     let estadoFiltrado = selectEstado.value;
//     let empresaFiltrado = selectEmpresa.value;
//     let origenAsistenciaFiltrado = selectOrigenAsistencia.value;
//     let fecha1valor = fecha1.value;
//     let fecha2valor = fecha2.value;

//     // Decodificar un arreglo de laravel a javascript
//     // let tablaClientes = JSON.parse('{!! json_encode($datos) !!}');

//     const tablaClientes = document.querySelectorAll('tbody tr')

//     // Recorriendo el arreglo para para entrar a los valores
//     tablaClientes.forEach((item) => {
//         // Valor arreglo
//         // const fechaCreacionTicke = item.fechaCreacionTicke;
//         // const empresa = item.empresa;
//         // const ticker = item.ticker;
//         // const fechaInicioAsistencia = item.fechaInicioAsistencia;
//         // const fechaFinalAsistencia = item.fechaFinalAsistencia;

//         const fechaCreacionTicke = item.querySelector('td:nth-child(6)').textContent;
//         const empresa = item.querySelector('td:nth-child(3)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
//         const ticker = item.querySelector('td:nth-child(2)').textContent;
//         const fechaInicioAsistencia = item.querySelector('td:nth-child(13)').textContent;
//         const fechaFinalAsistencia = item.querySelector('td:nth-child(14)').textContent;

//         // Sacar fecha
//         // const fecha1 = new Date(item.querySelector('td:nth-child(13)').textContent);
//         // const fecha2 = new Date(item.querySelector('td:nth-child(14)').textContent);
//         // const diff = Math.abs(fecha2 - fecha1); // Obtener la diferencia en milisegundos
//         // // Calcular horas y minutos
//         // const unDiaEnMilisegundos = 24 * 60 * 60 * 1000; // 24 horas * 60 minutos * 60 segundos * 1000 milisegundos
//         // const dias = Math.floor(diff / unDiaEnMilisegundos);

//         // const horas = Math.floor(diff / (60 * 60 * 1000));
//         // const minutos = Math.floor((diff % (60 * 60 * 1000)) / (60 * 1000));
//         // const totalHoras = `${dias} dias ${horas} horas ${minutos} minutos`
//         const dia = item.querySelector('td:nth-child(15) p:nth-child(1)').textContent;
//         const h = item.querySelector('td:nth-child(15) p:nth-child(2)').textContent;
//         const m = item.querySelector('td:nth-child(15) p:nth-child(3)').textContent;
//         let totalHoras

//         if (fechaInicioAsistencia == '' || fechaFinalAsistencia == '') {
//             totalHoras = ``
//         }else{
//             totalHoras = `${dia} ${h} ${m}`
//         }
//         // Fin sacar fecha

//         const id_cliente = item.querySelector('td:nth-child(8)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
//         const problema = item.querySelector('td:nth-child(5)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n').replace(/,/g, '_').replace(/"/g, '"').replace(/#/g, '');
//         const colaborador = item.querySelector('td:nth-child(4)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
//         const estado = item.querySelector('td:nth-child(12)').textContent;
//         const origenAsistencia = item.querySelector('td:nth-child(16)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');

//         const solucion = item.querySelector('td:nth-child(17)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n').replace(/,/g, '_').replace(/"/g, '"').replace(/#/g, '');
//         const observaciones = item.querySelector('td:nth-child(18)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n').replace(/,/g, '_').replace(/"/g, '"').replace(/#/g, '');


//         // Fin valor arreglo

//         // Haciendo condicionales en variables para un mejor orden con el if
//         const coincideEmpresa = empresaFiltrado === '' || empresaFiltrado === empresa;
//         const coincideEstado = estadoFiltrado === '' || estadoFiltrado === estado;
//         const coincideOrigenAsistencia = origenAsistenciaFiltrado === '' || origenAsistenciaFiltrado === origenAsistencia;
//         const coincideCliente = clienteFiltrado === '' || clienteFiltrado === id_cliente;
//         const coincideColaborador = colaboradorFiltrado === '' || colaboradorFiltrado === colaborador;
//         const coincideFecha1 = fecha1valor == '' || fecha1valor <= fechaCreacionTicke;
//         const coincideFecha2 = fecha2valor == '' || fecha2valor >= fechaCreacionTicke;

//         // si los datos se cumplen correctamente se mostraran los resultados
//         if (((coincideCliente && coincideColaborador) && (coincideFecha1 && coincideFecha2)) && ((coincideEstado && coincideEmpresa) && coincideOrigenAsistencia)) {
//             csvContent += `${fechaCreacionTicke},${empresa},${ticker},${fechaInicioAsistencia},${fechaFinalAsistencia},${totalHoras},${id_cliente},${origenAsistencia},${problema},${solucion},${observaciones},${colaborador}\n`;
//         }
//     });
    
//     // Crear el enlace de descarga
//     const encodedUri = encodeURI(csvContent);
//     const link = document.createElement('a');
//     link.setAttribute('href', encodedUri);
//     link.setAttribute('download', 'Soportes.csv');

//     // Simular el clic en el enlace para iniciar la descarga
//     document.body.appendChild(link);
//     link.click();
//     document.body.removeChild(link);
// }

// // Agregar un botón para iniciar la exportación
// const exportarButton = document.querySelector('#exportarSoporte');
// exportarButton.addEventListener('click', exportarSoporte);