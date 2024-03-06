async function soporte() {
    // Variables
    const checkComplet = document.querySelector('#completados')
    const tbody = document.querySelector('#listaSoporte')
    const exportarButton = document.querySelector('#exportarSoporte');
    const displayCarga = document.querySelector('.display-carga');
    let estado = false

    // Definir la URL del endpoint para obtener el token
    const URL_SERVER = 'http://46.183.112.214/api';
    const URL_LOCAL = 'http://127.0.0.1:8000/api';
    const URL = URL_SERVER
    const tokenEndpoint = `${URL}/login`;

    // Definir los datos de autenticación (por ejemplo, nombre de usuario y contraseña)
    const credentials = {
        email: 'acevedo51198mac@gmail.com',
        password: '12345678',
        grant_type: 'password'
    };

    // Configurar la solicitud HTTP para obtener el token
    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            // Otros encabezados según sea necesario
        },
        body: new URLSearchParams(credentials),
    };

    const respuesta = await fetch(tokenEndpoint, requestOptions)
    const resultado = await respuesta.json()

    const token = resultado.access_token
    // console.log(resultado);

    const urlGetSoporte = `${URL}/soporte`
    const option_soporte = {
        method: 'GET',
        headers: {
            // 'content-type': 'application/json',
            'authorization': `Bearer ${token}`,
        },
    }

    const respuesta_soporte = await fetch(urlGetSoporte, option_soporte)
    const soportes = await respuesta_soporte.json()
    // console.log(soportes);

    function Funcionalidad_soporte() {

        this.iterando = (condicion = 'none') => {
            const invertir_array = soportes.sort((a,b) => b.id - a.id)

            tbody.innerHTML = ''
            for (const item of invertir_array) {
                if (item.estado != condicion) {
                    this.renderHtml(item)
                }
            }
            displayCarga.classList.add('desactivar')
        }

        this.renderHtml = (array) => {
            const tr = document.createElement('tr')
            // acciones
            const td_acciones = document.createElement('td')
            const a = document.createElement('a')
            a.setAttribute('href',`soporte/${array.id}/edit`)
            a.setAttribute('class','edit')
            const icon_edit = document.createElement('ion-icon')
            icon_edit.setAttribute('name','pencil-outline')

            const button_eliminar = document.createElement('span')
            button_eliminar.setAttribute('class','span-delete')
            const icon_delete = document.createElement('ion-icon')
            icon_delete.setAttribute('name','beaker-outline')

            a.appendChild(icon_edit)
            button_eliminar.appendChild(icon_delete)
            td_acciones.appendChild(a)
            td_acciones.appendChild(button_eliminar)

            // ticket
            const td_ticket = document.createElement('td')
            td_ticket.textContent = array.ticker

            // empresa
            const td_empresa = document.createElement('td')
            td_empresa.textContent = array.empresa

            // colaborador
            const td_colaborador = document.createElement('td')
            td_colaborador.textContent = array.colaborador

            // problema
            const td_problema = document.createElement('td')
            td_problema.textContent = array.problema

            // fecha creación de ticket
            const td_fechaCreacionTicke = document.createElement('td')
            td_fechaCreacionTicke.textContent = array.fechaCreacionTicke

            // fecha prevista
            const td_fecha_prevista_cumplimiento = document.createElement('td')
            td_fecha_prevista_cumplimiento.textContent = array.fecha_prevista_cumplimiento

            // id del cliente
            const td_id_cliente = document.createElement('td')
            td_id_cliente.textContent = array.id_cliente

            // cliente
            const td_user_cliente = document.createElement('td')
            td_user_cliente.textContent = array.user_cliente

            // id del software
            const td_id_software = document.createElement('td')
            td_id_software.textContent = array.id_software

            // prioridad
            const td_prioridad = document.createElement('td')
            td_prioridad.textContent = array.prioridad
            if (array.prioridad == 'Leve') {
                td_prioridad.setAttribute('style','background: #16A085;color: #D0ECE7;font-weight: bold')
            }
            if(array.prioridad == 'Moderado'){
                td_prioridad.setAttribute('style','background: #E67E22;color: #FAE5D3;font-weight: bold')
            }
            if(array.prioridad == 'Alta'){
                td_prioridad.setAttribute('style','background: #E74C3C;color: #FADBD8;font-weight: bold')
            }

            // estado
            const td_estado = document.createElement('td')
            td_estado.textContent = array.estado
            if (array.estado == 'Asignado') {
                td_estado.setAttribute('style','background: #8a7212;color: #FCF3CF;font-weight: bold')
            }
            if(array.estado == 'En Proceso'){
                td_estado.setAttribute('style','background: #3498DB;color: #D6EAF8;font-weight: bold')
            }
            if(array.estado == 'Completo'){
                td_estado.setAttribute('style','background: #16A085;color: #D0ECE7;font-weight: bold')
            }

            // fechaInicioAsistencia
            const td_fechaInicioAsistencia = document.createElement('td')
            td_fechaInicioAsistencia.textContent = array.fechaInicioAsistencia

            // fechaFinalAsistencia
            const td_fechaFinalAsistencia = document.createElement('td')
            td_fechaFinalAsistencia.textContent = array.fechaFinalAsistencia

            // dias, horas y minutos
            const td_d_h_m = document.createElement('td')
            td_d_h_m.setAttribute('style','display:flex;flex-direction: column')
            const dia = document.createElement('span')
            dia.setAttribute('style','color: #795548; display:block')
            dia.setAttribute('class','color-dias')
            const hora = document.createElement('span')
            hora.setAttribute('style','color: #004D40; display:block')
            hora.setAttribute('class','color-horas')
            const minuto = document.createElement('span')
            minuto.setAttribute('style','color: #F06292; display:block')
            minuto.setAttribute('class','color-min')
            // Dos fechas
            const fecha1 = new Date(array.fechaInicioAsistencia); // Reemplaza con tu primera fecha
            const fecha2 = new Date(array.fechaFinalAsistencia);
            // Resta las fechas
            const diferenciaEnMilisegundos = fecha2 - fecha1;
            // Calcula la diferencia en días, horas y minutos
            const dias = Math.floor(diferenciaEnMilisegundos / (24 * 60 * 60 * 1000));
            const horas = Math.floor((diferenciaEnMilisegundos % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000));
            const minutos = Math.floor((diferenciaEnMilisegundos % (60 * 60 * 1000)) / (60 * 1000));
            // pasando los valores
            dia.textContent = `${dias} dias`
            hora.textContent = `${horas} horas`
            minuto.textContent = `${minutos} minutos`
            // Agregando el tiempo
            td_d_h_m.appendChild(dia)
            td_d_h_m.appendChild(hora)
            td_d_h_m.appendChild(minuto)

            // origen_asistencia
            const td_origen_asistencia = document.createElement('td')
            td_origen_asistencia.textContent = array.origen_asistencia

            // solucion
            const td_solucion = document.createElement('td')
            td_solucion.textContent = array.solucion

            // observaciones
            const td_observaciones = document.createElement('td')
            td_observaciones.textContent = array.observaciones

            // archivos
            // const td_archivos = document.createElement('td')
            // const a_archivos = document.createElement('a')
            // a_archivos.setAttribute('href',`{{ asset('storage/' . ${array.archivo}) }}`)
            // a_archivos.setAttribute('width','100')
            // td_archivos.appendChild(a_archivos)

            // agregando al tr
            tr.appendChild(td_acciones)
            tr.appendChild(td_ticket)
            tr.appendChild(td_empresa)
            tr.appendChild(td_colaborador)
            tr.appendChild(td_problema)
            tr.appendChild(td_fechaCreacionTicke)
            tr.appendChild(td_fecha_prevista_cumplimiento)
            tr.appendChild(td_id_cliente)
            tr.appendChild(td_user_cliente)
            tr.appendChild(td_id_software)
            tr.appendChild(td_prioridad)
            tr.appendChild(td_estado)
            tr.appendChild(td_fechaInicioAsistencia)
            tr.appendChild(td_fechaFinalAsistencia)
            tr.appendChild(td_d_h_m)
            tr.appendChild(td_origen_asistencia)
            tr.appendChild(td_solucion)
            tr.appendChild(td_observaciones)
            // tr.appendChild(td_archivos)

            // agregando al tbody
            tbody.appendChild(tr)

            button_eliminar.addEventListener('click', () => {
                this.borrarElement(array.id)
            })
        }

        this.borrarElement = (id) => {
            displayCarga.classList.remove('desactivar')
            async function deleteSoporte(id) {
                const urlDeleteSoporte = `${URL}/soporte/delete/${id}`
                const option_soporte = {
                    method: 'DELETE',
                    headers: {
                        // 'content-type': 'application/json',
                        'authorization': `Bearer ${token}`,
                    },
                }
            
                const respuesta_soporte_delete = await fetch(urlDeleteSoporte, option_soporte)
                location.reload()
            }
            deleteSoporte(id)
        }

        this.exportarSoporte = () => {
            const tablaClientes = document.querySelectorAll('tbody tr')

            // Crear contenido del archivo CSV
            let csvContent = 'data:text/csv;charset=utf-8,';
            csvContent += 'Fecha,Empresa,Ticket,Fecha Inicial Asistencia,Fecha Final Asistencia,Total de horas,Usuario,Origen de asistencia,Detalle Asitencia,Solucion,Observaciones,Asesor\n'; // Encabezados de las columnas
                    
            // Recorriendo el arreglo para para entrar a los valores
            tablaClientes.forEach((item) => {
        
                const fechaCreacionTicke = item.querySelector('td:nth-child(6)').textContent;
                const empresa = item.querySelector('td:nth-child(3)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
                const ticker = item.querySelector('td:nth-child(2)').textContent;
                const fechaInicioAsistencia = item.querySelector('td:nth-child(13)').textContent;
                const fechaFinalAsistencia = item.querySelector('td:nth-child(14)').textContent;
        
                // Sacar fecha
                const dia = item.querySelector('td:nth-child(15) span:nth-child(1)').textContent;
                const h = item.querySelector('td:nth-child(15) span:nth-child(2)').textContent;
                const m = item.querySelector('td:nth-child(15) span:nth-child(3)').textContent;
                let totalHoras
        
                if (fechaInicioAsistencia == '' || fechaFinalAsistencia == '') {
                    totalHoras = ``
                }else{
                    totalHoras = `${dia} ${h} ${m}`
                }
                // Fin sacar fecha
        
                const id_cliente = item.querySelector('td:nth-child(8)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
                const problema = item.querySelector('td:nth-child(5)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n').replace(/,/g, '_').replace(/"/g, '"').replace(/#/g, '');
                const colaborador = item.querySelector('td:nth-child(4)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
                const estado = item.querySelector('td:nth-child(12)').textContent;
                const origenAsistencia = item.querySelector('td:nth-child(16)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n');
        
                const solucion = item.querySelector('td:nth-child(17)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n').replace(/,/g, '_').replace(/"/g, '"').replace(/#/g, '');
                const observaciones = item.querySelector('td:nth-child(18)').textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ñ/g, 'n').replace(/,/g, '_').replace(/"/g, '"').replace(/#/g, '');
                // Fin valor arreglo
        
                // Aqui se agrega el cuerpo
                csvContent += `${fechaCreacionTicke},${empresa},${ticker},${fechaInicioAsistencia},${fechaFinalAsistencia},${totalHoras},${id_cliente},${origenAsistencia},${problema},${solucion},${observaciones},${colaborador}\n`;
            });
            
            // Crear el enlace de descarga
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', 'Soportes.csv');
        
            // Simular el clic en el enlace para iniciar la descarga
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }

    const soporte = new Funcionalidad_soporte;
    if (JSON.parse(sessionStorage.getItem('activo'))) {
        soporte.iterando()
        estado = false
    }else{
        soporte.iterando('Completo')
        checkComplet.setAttribute('checked','')
        estado = true
    }

    // checks
    checkComplet.addEventListener('click', () => {
        displayCarga.classList.remove('desactivar')
        sessionStorage.setItem('activo',estado)
        tbody.innerHTML = ''
        setTimeout(() => {
            if (JSON.parse(sessionStorage.getItem('activo'))) {
                estado = false
                soporte.iterando()
            }else{
                estado = true
                soporte.iterando('Completo')
            }
        }, 300);
        // console.log(estado);
    })

    // Click botón para iniciar la exportación
    exportarButton.addEventListener('click', soporte.exportarSoporte);
}

soporte()