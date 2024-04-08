async function dashboard() {
    // Variables
    const soporte = document.getElementById('grafico-soporte');
    const tbody = document.querySelector('#listaSoporte')
    const select_empresa = document.querySelector('.select_empresa')
    const select_cliente = document.querySelector('.cliente')
    const input_colaborador = document.querySelector('.colaborador')
    const displayCarga = document.querySelector('.display-carga');
    const server = 'http://46.183.112.214/api'
    const local = 'http://127.0.0.1:8000/api'
    const url = local
    const url_login = `${url}/login`;

    // Obteniendo el token
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

    const respuesta = await fetch(url_login, requestOptions)
    const resultado = await respuesta.json()
    const token = resultado.access_token

    // Api get
    const get = (complemento) => {
        const urlGet = `${url}/${complemento}`
        const option = {
            method: 'GET',
            headers: {
                // 'content-type': 'application/json',
                'authorization': `Bearer ${token}`,
            },
        }

        return fetch(urlGet, option)
    }

    get('grafico_soporte')
    .then(res => res.json())
    .then(result => {
        new Chart(soporte, {
        type: 'pie',
        data: {
            labels: result[0],
            datasets: [{
            label: 'Soporte',
            data: result[1],
            borderWidth: 1,
            backgroundColor: [
                    '#C6D8D3', '#8E5572', '#F8C9A0', '#F9EBB2', '#F1E4E8',
                    '#FFDDC1', '#FFABAB', '#FFC3A0', '#FF677D', '#D4A5A5',
                    '#392F5A', '#31A2AC', '#61C0BF', '#6B4226', '#D9BF77',
                    '#ACD8AA', '#FFE156', '#6A0572', '#AB83A1', '#5E7F5E',
                    '#1A535C', '#4ECDC4', '#F7FFF7', '#FFC3A0', '#FFD3B5',
                    '#F28F3B', '#282741', '#70ABAF', '#F6D6AD', '#FFE156',
                    '#6A0572', '#AB83A1', '#5E7F5E', '#3C096C', '#6DF3D5',
                    '#335C67', '#FFF3B0', '#E09F3E', '#9E2A2B', '#F9EBB2',
                ]
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        })
    })

    const mostrar_soporte_custom = (colaborador = 'vacio') => {
        tbody.textContent = ''
        get(`soporte_x_cliente/${colaborador}`)
        .then(res => res.json())
        .then(result => {
            const render = (el) => {
                const tr = document.createElement('tr')
                const td_empresa = document.createElement('td')
                td_empresa.textContent = el.empresa
                const td_cliente = document.createElement('td')
                td_cliente.textContent = el.contacto
                const td_colaborador = document.createElement('td')
                td_colaborador.textContent = el.conteo_colaborador
                const td_cantidad_soporte = document.createElement('td')
                td_cantidad_soporte.textContent = el.conteo_total
                // const td_soporte_x_fechas = document.createElement('td')
                // const td_horas = document.createElement('td')
        
                tr.appendChild(td_empresa)
                tr.appendChild(td_cliente)
                tr.appendChild(td_colaborador)
                tr.appendChild(td_cantidad_soporte)
                // tr.appendChild(td_soporte_x_fechas)
                // tr.appendChild(td_horas)
                tbody.appendChild(tr)
            }
        
            for (const item of result) {
                render(item)
            }
            // Quitar pantalla de carga
            displayCarga.classList.add('desactivar')
        })
    }

    mostrar_soporte_custom()

    const filtrar = (empresa = '', cliente = '') => {

        for (const item of tbody.querySelectorAll('tr')) {
            const empre = item.querySelector('td:nth-child(1)').textContent
            const clien = item.querySelector('td:nth-child(2)').textContent
            const con1 = (empresa == empre || empresa == '') && (cliente == clien || cliente == '')
            if (con1) {
                item.style.display = ''
            }else{
                item.style.display = 'none'
            }
        }
    }

    select_empresa.addEventListener('input', () => {
        filtrar(select_empresa.value,'')
    })

    select_cliente.addEventListener('input', () => {
        filtrar('',select_cliente.value)
    })

    input_colaborador.addEventListener('input', () => {
        if (input_colaborador.value !== '') {
            // Add pantalla de carga
            displayCarga.classList.remove('desactivar')
            mostrar_soporte_custom(input_colaborador.value)
        }
    })
}

dashboard()