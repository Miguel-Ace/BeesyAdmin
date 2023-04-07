<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BeêsyAdmin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/menutoggle.js'])
</head>
<body>
    {{-- Header --}}
    <div class="header">

        <div class="logo">
            <span class="uno"><span class="negrita"></span>BeêsyAdmin</span> <ion-icon name="arrow-undo-outline" class="contraer"></ion-icon>
            <span class="dos oculto"><span class="negrita">BD</span></span> <ion-icon name="arrow-redo-outline" class="expadir oculto"></ion-icon>
        </div>

        <div class="salir">
            <div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Salir') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <ion-icon name="backspace-outline"></ion-icon>
        </div>
    </div>

    {{-- Contenido aside y menú principal --}}
    <div class="contenedor">
        <div class="asidebar">
            <div class="usuario">
                <img src="{{asset('img/avatar-2.png')}}" alt="avatar">
                <p>{{ Auth::user()->name }}</p>
            </div>
            <hr>
            <div class="menu">
                <p>Menú principal</p>
                <ion-icon class=
                "ico-drop" id="ico-drop" name="menu-outline"></ion-icon>
                <div class="catalogos activo" id="catalogos">
                    @if (auth()->user()->id == 1)
                        <a href="{{url('/usuarios')}}"><ion-icon name="people-outline"></ion-icon> <span>Usuarios</span></a>
                    @endif
                    @role('admin')
                    <a href="{{url('/dashboard')}}"><ion-icon name="home-outline"></ion-icon> <span>Dashboard</span></a>
                    <a href="{{url('/usuarios')}}"><ion-icon name="people-outline"></ion-icon> <span>Usuarios</span></a>
                    <a href="{{url('/software')}}"><ion-icon name="aperture-outline"></ion-icon> <span>Software</span></a>
                    <a href="{{url('/clientes')}}"><ion-icon name="person-add-outline"></ion-icon> <span>Clientes</span></a>
                    <a href="{{url('/licencias')}}"><ion-icon name="expand-outline"></ion-icon> <span>Licencias</span></a>
                    <a href="{{url('/terminales')}}"><ion-icon name="document-attach-outline"></ion-icon> <span>Terminales</span></a>
                    @endrole
                    
                    @role('soporte')
                    <a href="{{url('/dashboard')}}"><ion-icon name="home-outline"></ion-icon> <span>Dashboard</span></a>
                    <a href="{{url('/soporte')}}"><ion-icon name="apps-outline"></ion-icon> <span>Soporte</span></a>
                    <a href="{{url('/ejecucion_proyectos')}}"><ion-icon name="file-tray-full-outline"></ion-icon> <span>Ejecución Proyectos</span></a>
                    @endrole
                    
                    @role('admin')
                    <a href="{{url('/soporte')}}"><ion-icon name="apps-outline"></ion-icon> <span>Soporte</span></a>
                    <a href="{{url('/estados')}}"><ion-icon name="barcode-outline"></ion-icon> <span>Estado</span></a>
                    <a href="{{url('/etapas')}}"><ion-icon name="copy-outline"></ion-icon> <span>Etapa</span></a>
                    <a href="{{url('/proyectos')}}"><ion-icon name="file-tray-stacked-outline"></ion-icon> <span>Proyectos</span></a>
                    <a href="{{url('/plantilla_proyectos')}}"><ion-icon name="create-outline"></ion-icon> <span>Plantilla Proyectos</span></a>
                    @endrole
                </div>
            </div>
        </div>

        <div class="contenido">
            <div class="subheader"><span>@yield('titulo')</span></div>

            <div class="tablas">
                <div class="superior">
                    <span>
                        @yield('tituloForm')
                    </span>
                </div>
                <div class="form row">
                     <div class="col-md-12 fs-6">
                            @yield('creacion')
                    </div>
                </div>

                <div class="superior">
                    <span>
                        @yield('tituloTabla')
                    </span>
                </div>
                <div class="color">
                    @yield('tablas')
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
