function exportarSoporteCliente() {

    // Crear contenido del archivo CSV
    let csvContent = 'data:text/csv;charset=utf-8,';
    csvContent += 'Fecha de atención,Ticket,Fecha Inicial Asistencia,Fecha Final Asistencia,Total de horas,Usuario,Detalle Asitencia,Asesor\n'; // Encabezados de las columnas
    
    const selectCliente = document.querySelector('#cliente');
    
    let clienteFiltrado = selectCliente.value;
    
    // Decodificar un arreglo de laravel a javascript
    let tablaClientes = JSON.parse('{!! json_encode($datos) !!}');
    
    tablaClientes.forEach((item) => {
    const fechaCreacionTicke = item.fechaInicioAsistencia;
    const ticker = item.ticker;
    const fechaInicioAsistencia = item.fechaInicioAsistencia;
    const fechaFinalAsistencia = item.fechaFinalAsistencia;
    // Sacar fecha
    const fecha1 = new Date(item.fechaInicioAsistencia);
    const fecha2 = new Date(item.fechaFinalAsistencia);
    const diff = Math.abs(fecha2 - fecha1); // Obtener la diferencia en milisegundos
    // Calcular horas y minutos
    const horas = Math.floor(diff / (1000 * 60 * 60));
    const minutos = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const totalHoras = `${horas} horas y ${minutos} minutos`
    
    // Fin sacar fecha
    const id_cliente = item.id_cliente;
    const problema = item.problema;
    const colaborador = item.colaborador;
    
    const coincideCliente = clienteFiltrado === id_cliente;
    
    
    
    if ((coincideCliente)) {
        csvContent += `${fechaCreacionTicke},${ticker},${fechaInicioAsistencia},${fechaFinalAsistencia},${totalHoras},${id_cliente},${problema},${colaborador}\n`;
    }
    });
    
    // Crear el enlace de descarga
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement('a');
    link.setAttribute('href', encodedUri);
    link.setAttribute('download', 'Soporte x cliente.csv');
    
    // Simular el clic en el enlace para iniciar la descarga
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    }
    
    // Agregar un botón para iniciar la exportación
    const exportarButton = document.querySelector('#exportarSoporteCliente');
    exportarButton.addEventListener('click', exportarSoporteCliente);