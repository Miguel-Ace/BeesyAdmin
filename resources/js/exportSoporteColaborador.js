function exportarSoporteColaborador() {

    // Crear contenido del archivo CSV
    let csvContent = 'data:text/csv;charset=utf-8,';
    csvContent += 'Ticket,Total de horas\n'; // Encabezados de las columnas

    const selectColaborador = document.querySelector('#colaborador');

    let colaboradorFiltrado = selectColaborador.value;

    // Decodificar un arreglo de laravel a javascript
    let tablaClientes = JSON.parse('{!! json_encode($datos) !!}');

    tablaClientes.forEach((item) => {
    const ticker = item.ticker;
    // Sacar fecha
    const fecha1 = new Date(item.fechaInicioAsistencia);
    const fecha2 = new Date(item.fechaFinalAsistencia);
    const diff = Math.abs(fecha2 - fecha1); // Obtener la diferencia en milisegundos
    // Calcular horas y minutos
    const horas = Math.floor(diff / (1000 * 60 * 60));
    const minutos = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const totalHoras = `${horas} horas y ${minutos} minutos`

    // Fin sacar fecha
    const colaborador = item.colaborador;

    const coincideColaborador = colaboradorFiltrado === colaborador;

    if ((coincideColaborador)) {
        csvContent += `${ticker},${totalHoras}\n`;
    }
    });

    // Crear el enlace de descarga
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement('a');
    link.setAttribute('href', encodedUri);
    link.setAttribute('download', 'Soportes por colaborador.csv');

    // Simular el clic en el enlace para iniciar la descarga
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    }

    // Agregar un botón para iniciar la exportación
    const exportarButton = document.querySelector('#exportarSoporteColaborador');
    exportarButton.addEventListener('click', exportarSoporteColaborador);