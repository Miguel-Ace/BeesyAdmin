function exportarSoporte() {
    // Crear contenido del archivo CSV
    let csvContent = 'data:text/csv;charset=utf-8,';
    csvContent += 'Pregunta,Respuesta,Cédula del cliente,Cliente,Pais,Usuario,Usuario,Fecha y hora,Intento,Notas\n'; // Encabezados de las columnas

    const tablaClientes = document.querySelectorAll('tbody tr')

    // Recorriendo el arreglo para para entrar a los valores
    tablaClientes.forEach((item) => {

        const pregunta = item.querySelector('td:nth-child(1)').textContent;
        const respuesta = item.querySelector('td:nth-child(2)').textContent;
        const cedulaCliente = item.querySelector('td:nth-child(3)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
        const cliente = item.querySelector('td:nth-child(4)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
        const pais = item.querySelector('td:nth-child(5)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
        const usuario = item.querySelector('td:nth-child(6)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
        const fecha = item.querySelector('td:nth-child(7)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
        const intento = item.querySelector('td:nth-child(8)').textContent;
        const notas = item.querySelector('td:nth-child(9)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');

        csvContent += `${pregunta},${respuesta},${cedulaCliente},${cliente},${pais},${usuario},${fecha},${intento},${notas}\n`;
    });
    
    // Crear el enlace de descarga
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement('a');
    link.setAttribute('href', encodedUri);
    link.setAttribute('download', 'Respuestas.csv');

    // Simular el clic en el enlace para iniciar la descarga
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

    // Agregar un botón para iniciar la exportación
    const exportarButton = document.querySelector('.csv-resp');
    exportarButton.addEventListener('click', exportarSoporte);