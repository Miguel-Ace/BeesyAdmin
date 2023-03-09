@extends('home')

@section('titulo')
Proyecto
@endsection

@section('tituloForm')
Agregar Proyecto
@endsection

@section('creacion')

{{-- FOREACH INICIO --}}
@role('admin')
@if ($busqueda == NULL)
    @if ($busqueda == "")

        <div class="mostrar">
            @if (session('success'))
                <div>
                    <p style="background: rgb(64, 129, 64); color: white;text-align: center">{{session('success')}}</p>
                </div>
            @endif

            @if (session('danger'))
                <div>
                    <p style="background: rgb(243, 61, 37); color: white;text-align: center">{{session('danger')}}</p>
                </div>
            @endif

            <form action="{{url('/proyectos')}}" id="form" class="" method="post">
                @if ($errors->any())
                    <ul class="bg-white text-danger p-2">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" @error("nombre")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="id_cliente" class="form-label">Cliente</label>
                        <select class="form-select" name="id_cliente" @error("id_cliente")style="border: solid 2px red"@enderror>
                            <option value="">Selecciona un cliente</option>
                            @foreach ($clientes as $cliente)
                                @foreach ($datos as $dato)
                                    @if ($cliente->nombre == $dato->id_cliente)
                                    {{$valor = $cliente->id}}
                                    @endif
                                @endforeach

                                @if ($valor != $cliente->id)
                                    <option {{ old('id_cliente') == $cliente->nombre ? 'selected' : '' }} value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>
                                @else
                                    <option value="">{{$cliente->nombre}} - ya utilzado</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="user_de_cliente" class="form-label">Usuario del Cliente</label>
                        <select class="form-select" name="user_de_cliente" @error("user_de_cliente")style="border: solid 2px red"@enderror>
                            <option value="">Selecciona usuario del cliente</option>
                            @foreach ($userdeclientes as $userdecliente)
                                {{-- @foreach ($clientes as $cliente)
                                    @if ($userdecliente->cliente == $cliente->id)
                                        {{ $valor = $userdecliente->cliente}}
                                    @endif
                                @endforeach

                                @if ($valor == $userdecliente->cliente)
                                    <option value="{{$userdecliente->id}}">{{$userdecliente->name}}</option>
                                @endif --}}
                                    <option {{ old('user_de_cliente') == $userdecliente->name ? 'selected' : '' }} value="{{$userdecliente->name}}">{{$userdecliente->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="responsable_cliente" class="form-label">Responsable del Cliente</label>
                            <input type="text" class="form-control" id="responsable_cliente" name="responsable_cliente" value="{{old('responsable_cliente')}}" @error("responsable_cliente")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="email_responsable" class="form-label">Email del Responsable</label>
                            <input type="email" class="form-control" id="email_responsable" name="email_responsable" value="{{old('email_responsable')}}" @error("email_responsable")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="telefono_responsable" class="form-label">Teléfono del Responsable</label>
                            <input type="number" class="form-control" id="telefono_responsable" name="telefono_responsable" value="{{old('telefono_responsable')}}" @error("telefono_responsable")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="id_usuario" class="form-label">Usuario</label>
                        <select class="form-select" name="id_usuario" @error("id_usuario")style="border: solid 2px red"@enderror>
                            <option value="">Selecciona un usuario</option>
                            @foreach ($usuarios as $usuario)
                                @foreach ($datos as $dato)
                                    @if ($usuario->name == $dato->id_usuario)
                                    {{$valor = $usuario->id}}
                                    @endif
                                @endforeach

                                @if ($valor != $usuario->id)
                                    <option {{ old('id_usuario') == $usuario->name ? 'selected' : '' }} value="{{$usuario->name}}">{{$usuario->name}}</option>
                                @else
                                    <option value="">{{$usuario->name}} - ya utilzado</option>
                                @endif
                                {{-- <option value="{{$usuario->id}}">{{$usuario->name}}</option> --}}
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                            <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{old('fecha_inicio')}}" @error("fecha_inicio")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="fecha_fin" class="form-label">Fecha Final</label>
                            <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" value="{{old('fecha_fin')}}" @error("fecha_fin")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Selecciona una Plantilla</label>
                        <select class="form-select" id="select">
                            <option value="" id="">Seleccione Plantilla</option>
                            @foreach ($datos as $dato)
                                @if ($dato->id_cliente == NULL)
                                    <option value="{{$dato->id}}" id="select_plantilla">{{$dato->select_plantilla}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="enviar" id="enviar">
                <ion-icon name="save-outline"></ion-icon>
                Guardar
                </button>

            </form>

            <form action="{{url('/proyectos')}}" method="get" class="formularioBuscador d-none">
                <input type="text" class="" name="buscar" id="cargar" placeholder="Buscar" value="{{$busqueda}}">
                <input class="btn btn-primary" id="cargarEnviar" type="submit" value="Buscar">
            </form>

        </div>

    @endif
    
@else

    @foreach ($proyectos as $proyecto)

    @if ($proyecto->id == $busqueda)

        @if (session('success'))
            <div>
                <p style="background: rgb(64, 129, 64); color: white;text-align: center">{{session('success')}}</p>
            </div>
        @endif

        @if (session('danger'))
            <div>
                <p style="background: rgb(243, 61, 37); color: white;text-align: center">{{session('danger')}}</p>
            </div>
        @endif

    <form action="{{url('/proyectos')}}" id="form" class="" method="post">
        @if ($errors->any())
            <ul class="bg-white text-danger p-2">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$proyecto->nombre}}" @error("nombre")style="border: solid 2px red"@enderror>
                </div>
            </div>

            <div class="col-md-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select class="form-select" name="id_cliente" @error("id_cliente")style="border: solid 2px red"@enderror>
                    <option value="">Selecciona un cliente</option>
                    @foreach ($clientes as $cliente)
                        @foreach ($proyectos as $proyecto)
                            @if ($cliente->id == $proyecto->id_cliente)
                            {{$valor = $cliente->id}}
                            @endif
                        @endforeach

                        @if ($valor !== $cliente->id)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @else
                            <option value="">{{$cliente->nombre}} - ya utilzado</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="responsable_cliente" class="form-label">Responsable del Cliente</label>
                    <input type="text" class="form-control" id="responsable_cliente" name="responsable_cliente" value="{{$proyecto->responsable_cliente}}" @error("responsable_cliente")style="border: solid 2px red"@enderror>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="email_responsable" class="form-label">Email del Responsable</label>
                    <input type="email" class="form-control" id="email_responsable" name="email_responsable" value="{{$proyecto->email_responsable}}" @error("email_responsable")style="border: solid 2px red"@enderror>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="telefono_responsable" class="form-label">Teléfono del Responsable</label>
                    <input type="number" class="form-control" id="telefono_responsable" name="telefono_responsable" value="{{$proyecto->telefono_responsable}}" @error("telefono_responsable")style="border: solid 2px red"@enderror>
                </div>
            </div>

            {{-- <div class="col-md-3">
                <label for="id_usuario" class="form-label">Usuario</label>
                <select class="form-select" name="id_usuario" @error("id_usuario")style="border: solid 2px red"@enderror>
                    <option value="">Selecciona un usuario</option>
                    @foreach ($usuarios as $usuario)
                        @foreach ($proyectos as $proyecto)
                            @if ($usuario->id == $proyecto->id_usuario)
                            {{$valor = $usuario->id}}
                            @endif
                        @endforeach

                        @if ($valor != $usuario->id)
                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                        @else
                            <option value="">{{$usuario->name}} - ya utilzado</option>
                        @endif
                    @endforeach
                </select>
            </div> --}}

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                    <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{$proyecto->fecha_inicio}}" @error("fecha_inicio")style="border: solid 2px red"@enderror>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha Final</label>
                    <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" value="{{$proyecto->fecha_fin}}" @error("fecha_fin")style="border: solid 2px red"@enderror>
                </div>
            </div>

            <div class="col-md-3">
                <label for="select_plantilla" class="form-label">Selecciona una Plantilla</label>
                <select class="form-select" id="select">
                    <option value="" id="">Seleccione Plantilla</option>
                    @foreach ($proyectos as $proyecto)
                        @if ($proyecto->id_cliente == NULL)
                            <option value="{{$proyecto->id}}" id="select_plantilla">{{$proyecto->select_plantilla}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        
        <button type="submit" class="enviar" id="enviar">
        <ion-icon name="save-outline"></ion-icon>
        Guardar
        </button>

    </form>

    <form action="{{url('/proyectos')}}" method="get" class="formularioBuscador d-none">
        <input type="text" name="buscar" class="" id="cargar" placeholder="Buscar" value="{{$busqueda}}">
        <input class="btn btn-primary" id="cargarEnviar" type="submit" value="Buscar">
    </form>

    @endif

    @endforeach
@endif
@endrole
@role('escritor')
@if ($busqueda == NULL)
    @if ($busqueda == "")

        <div class="mostrar">
            @if (session('success'))
                <div>
                    <p style="background: rgb(64, 129, 64); color: white;text-align: center">{{session('success')}}</p>
                </div>
            @endif

            @if (session('danger'))
                <div>
                    <p style="background: rgb(243, 61, 37); color: white;text-align: center">{{session('danger')}}</p>
                </div>
            @endif

            <form action="{{url('/proyectos')}}" id="form" class="" method="post">
                @if ($errors->any())
                    <ul class="bg-white text-danger p-2">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" @error("nombre")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="id_cliente" class="form-label">Cliente</label>
                        <select class="form-select" name="id_cliente" @error("id_cliente")style="border: solid 2px red"@enderror>
                            <option value="">Selecciona un cliente</option>
                            @foreach ($clientes as $cliente)
                                @foreach ($datos as $dato)
                                    @if ($cliente->nombre == $dato->id_cliente)
                                    {{$valor = $cliente->id}}
                                    @endif
                                @endforeach

                                @if ($valor != $cliente->id)
                                    <option {{ old('id_cliente') == $cliente->nombre ? 'selected' : '' }} value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>
                                @else
                                    <option value="">{{$cliente->nombre}} - ya utilzado</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="user_de_cliente" class="form-label">Usuario del Cliente</label>
                        <select class="form-select" name="user_de_cliente" @error("user_de_cliente")style="border: solid 2px red"@enderror>
                            <option value="">Selecciona usuario del cliente</option>
                            @foreach ($userdeclientes as $userdecliente)
                                {{-- @foreach ($clientes as $cliente)
                                    @if ($userdecliente->cliente == $cliente->id)
                                        {{ $valor = $userdecliente->cliente}}
                                    @endif
                                @endforeach

                                @if ($valor == $userdecliente->cliente)
                                    <option value="{{$userdecliente->id}}">{{$userdecliente->name}}</option>
                                @endif --}}
                                    <option {{ old('user_de_cliente') == $userdecliente->name ? 'selected' : '' }} value="{{$userdecliente->name}}">{{$userdecliente->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="responsable_cliente" class="form-label">Responsable del Cliente</label>
                            <input type="text" class="form-control" id="responsable_cliente" name="responsable_cliente" value="{{old('responsable_cliente')}}" @error("responsable_cliente")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="email_responsable" class="form-label">Email del Responsable</label>
                            <input type="email" class="form-control" id="email_responsable" name="email_responsable" value="{{old('email_responsable')}}" @error("email_responsable")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="telefono_responsable" class="form-label">Teléfono del Responsable</label>
                            <input type="number" class="form-control" id="telefono_responsable" name="telefono_responsable" value="{{old('telefono_responsable')}}" @error("telefono_responsable")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="id_usuario" class="form-label">Usuario</label>
                        <select class="form-select" name="id_usuario" @error("id_usuario")style="border: solid 2px red"@enderror>
                            <option value="">Selecciona un usuario</option>
                            @foreach ($usuarios as $usuario)
                                @foreach ($datos as $dato)
                                    @if ($usuario->name == $dato->id_usuario)
                                    {{$valor = $usuario->id}}
                                    @endif
                                @endforeach

                                @if ($valor != $usuario->id)
                                    <option {{ old('id_usuario') == $usuario->name ? 'selected' : '' }} value="{{$usuario->name}}">{{$usuario->name}}</option>
                                @else
                                    <option value="">{{$usuario->name}} - ya utilzado</option>
                                @endif
                                {{-- <option value="{{$usuario->id}}">{{$usuario->name}}</option> --}}
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                            <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{old('fecha_inicio')}}" @error("fecha_inicio")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="fecha_fin" class="form-label">Fecha Final</label>
                            <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" value="{{old('fecha_fin')}}" @error("fecha_fin")style="border: solid 2px red"@enderror>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Selecciona una Plantilla</label>
                        <select class="form-select" id="select">
                            <option value="" id="">Seleccione Plantilla</option>
                            @foreach ($datos as $dato)
                                @if ($dato->id_cliente == NULL)
                                    <option value="{{$dato->id}}" id="select_plantilla">{{$dato->select_plantilla}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="enviar" id="enviar">
                <ion-icon name="save-outline"></ion-icon>
                Guardar
                </button>

            </form>

            <form action="{{url('/proyectos')}}" method="get" class="formularioBuscador d-none">
                <input type="text" class="" name="buscar" id="cargar" placeholder="Buscar" value="{{$busqueda}}">
                <input class="btn btn-primary" id="cargarEnviar" type="submit" value="Buscar">
            </form>

        </div>

    @endif
    
@else

    @foreach ($proyectos as $proyecto)

    @if ($proyecto->id == $busqueda)

        @if (session('success'))
            <div>
                <p style="background: rgb(64, 129, 64); color: white;text-align: center">{{session('success')}}</p>
            </div>
        @endif

        @if (session('danger'))
            <div>
                <p style="background: rgb(243, 61, 37); color: white;text-align: center">{{session('danger')}}</p>
            </div>
        @endif

    <form action="{{url('/proyectos')}}" id="form" class="" method="post">
        @if ($errors->any())
            <ul class="bg-white text-danger p-2">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$proyecto->nombre}}" @error("nombre")style="border: solid 2px red"@enderror>
                </div>
            </div>

            <div class="col-md-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select class="form-select" name="id_cliente" @error("id_cliente")style="border: solid 2px red"@enderror>
                    <option value="">Selecciona un cliente</option>
                    @foreach ($clientes as $cliente)
                        @foreach ($proyectos as $proyecto)
                            @if ($cliente->id == $proyecto->id_cliente)
                            {{$valor = $cliente->id}}
                            @endif
                        @endforeach

                        @if ($valor !== $cliente->id)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @else
                            <option value="">{{$cliente->nombre}} - ya utilzado</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="responsable_cliente" class="form-label">Responsable del Cliente</label>
                    <input type="text" class="form-control" id="responsable_cliente" name="responsable_cliente" value="{{$proyecto->responsable_cliente}}" @error("responsable_cliente")style="border: solid 2px red"@enderror>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="email_responsable" class="form-label">Email del Responsable</label>
                    <input type="email" class="form-control" id="email_responsable" name="email_responsable" value="{{$proyecto->email_responsable}}" @error("email_responsable")style="border: solid 2px red"@enderror>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="telefono_responsable" class="form-label">Teléfono del Responsable</label>
                    <input type="number" class="form-control" id="telefono_responsable" name="telefono_responsable" value="{{$proyecto->telefono_responsable}}" @error("telefono_responsable")style="border: solid 2px red"@enderror>
                </div>
            </div>

            {{-- <div class="col-md-3">
                <label for="id_usuario" class="form-label">Usuario</label>
                <select class="form-select" name="id_usuario" @error("id_usuario")style="border: solid 2px red"@enderror>
                    <option value="">Selecciona un usuario</option>
                    @foreach ($usuarios as $usuario)
                        @foreach ($proyectos as $proyecto)
                            @if ($usuario->id == $proyecto->id_usuario)
                            {{$valor = $usuario->id}}
                            @endif
                        @endforeach

                        @if ($valor != $usuario->id)
                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                        @else
                            <option value="">{{$usuario->name}} - ya utilzado</option>
                        @endif
                    @endforeach
                </select>
            </div> --}}

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                    <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{$proyecto->fecha_inicio}}" @error("fecha_inicio")style="border: solid 2px red"@enderror>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha Final</label>
                    <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" value="{{$proyecto->fecha_fin}}" @error("fecha_fin")style="border: solid 2px red"@enderror>
                </div>
            </div>

            <div class="col-md-3">
                <label for="select_plantilla" class="form-label">Selecciona una Plantilla</label>
                <select class="form-select" id="select">
                    <option value="" id="">Seleccione Plantilla</option>
                    @foreach ($proyectos as $proyecto)
                        @if ($proyecto->id_cliente == NULL)
                            <option value="{{$proyecto->id}}" id="select_plantilla">{{$proyecto->select_plantilla}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        
        <button type="submit" class="enviar" id="enviar">
        <ion-icon name="save-outline"></ion-icon>
        Guardar
        </button>

    </form>

    <form action="{{url('/proyectos')}}" method="get" class="formularioBuscador d-none">
        <input type="text" name="buscar" class="" id="cargar" placeholder="Buscar" value="{{$busqueda}}">
        <input class="btn btn-primary" id="cargarEnviar" type="submit" value="Buscar">
    </form>

    @endif

    @endforeach
@endif
@endrole
{{-- FOREACH FIN --}}

@endsection

@section('tituloTabla')
Lista de Proyectos

{{-- Espacio del buscador --}}
<form action="{{url('/proyectos')}}" method="get" class="formularioBuscador d-none">
    <input type="text" name="buscar" id="buscar" placeholder="Buscar" value="{{$busqueda}}">
    <input type="submit" value="Buscar">
</form>
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover tablagrande">
        <thead>
            @foreach ($proyectos as $proyecto)
                @if ($proyecto->id_cliente != NULL && $proyecto->id_usuario != NULL)
                    <tr  class="titulo-tabla text-center d-none">
                        <th scope="col">Nombre</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Usuario del Cliente</th>
                        <th scope="col">Responsable Cliente</th>
                        <th scope="col">Email Responsable</th>
                        <th scope="col">Teléfono Responsable</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Final</th>
                        @role('admin')
                        <th scope="col">Acciones</th>
                        @endrole
                        @role('editor')
                        <th scope="col">Acciones</th>
                        @endrole
                    </tr>
                @endif

            @endforeach
        </thead>
        <tbody class="text-center">
            @foreach ($proyectos as $proyecto )
                @if ($proyecto->id_cliente != NULL && $proyecto->id_usuario != NULL)
                    <tr>
                        <td>{{$proyecto->nombre}}</td>
                        <td>{{$proyecto->id_cliente}}</td>
                        @foreach ($userdeclientes as $userdecliente)
                            @if ($userdecliente->id == $proyecto->user_de_cliente)
                                <td>{{$userdecliente->name}}</td>
                            @endif
                        @endforeach
                        <td>{{$proyecto->responsable_cliente}}</td>
                        <td>{{$proyecto->email_responsable}}</td>
                        <td>{{$proyecto->telefono_responsable}}</td>
                        <td>{{$proyecto->id_usuario}}</td>
                        <td>{{$proyecto->fecha_inicio}}</td>
                        <td>{{$proyecto->fecha_fin}}</td>
                        @role('admin')
                        <td class="d-flex justify-content-around">
                            {{-- @foreach ($detalleProyectos as $detalleProyecto)
                                {{$valor = $detalleProyecto->id}}
                            @endforeach --}}
                            <a href="{{url('/detalle_proyectos?buscar='.$proyecto->id)}}" class="show"><ion-icon name="add-circle-outline"></ion-icon></a>
                            |
                            <a href="{{url('proyectos/'.$proyecto->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                            {{-- |
                            <form action="{{url('proyectos/'.$dato->id)}}" method="POST" class="delete">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                            </form> --}}
                        </td>
                        @endrole
                        @role('editor')
                        <td class="d-flex justify-content-around">
                            {{-- @foreach ($detalleProyectos as $detalleProyecto)
                                {{$valor = $detalleProyecto->id}}
                            @endforeach --}}
                            <a href="{{url('/detalle_proyectos?buscar='.$proyecto->id)}}" class="show"><ion-icon name="add-circle-outline"></ion-icon></a>
                            |
                            <a href="{{url('proyectos/'.$proyecto->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                            {{-- |
                            <form action="{{url('proyectos/'.$dato->id)}}" method="POST" class="delete">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                            </form> --}}
                        </td>
                        @endrole
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // const inputs = document.querySelectorAll('input');
    // const formulario = document.querySelector('#form');
    const btnCargar = document.getElementById('cargar');
    const btnCargarEnviar = document.getElementById('cargarEnviar');
    const select = document.getElementById('select');

    select.onclick = (e) => {
        let valor = e.target.value;
        console.log(valor);
        btnCargar.value = valor;
            if (valor != '') {
                btnCargarEnviar.click();
            }
        }

    // let proyectos = JSON.parse('{!! json_encode($proyectos) !!}');
    // proyectos.forEach(element => {
    //     let nombrePlantilla = element.select_plantilla;
    //     let idPlantilla = element.id;

    //     if (nombrePlantilla != null) {

    //         // console.log(nombrePlantilla);
    //         // formulario.onclick = (e) => {

    //         //     let valor = e.target.value;
    //         //     console.log(valor)
    //         //     if (valor == idPlantilla) {
    //         //         if (valor != undefined && valor != '' && btnCargar.id == 'cargar') {
    //         //             btnCargar.value = valor;
    //         //             btnCargarEnviar.click();
    //         //         }
    //         //         // console.log(valor);
    //         //     }else{
    //         //         if (valor != undefined && valor != '' && btnCargar.id == 'cargar') {
    //         //             btnCargar.value = valor;
    //         //             btnCargarEnviar.click();
    //         //         }
    //         //         // console.log(valor);
    //         //     }
    //         // }
    //     }

    // });
</script>
@endsection
