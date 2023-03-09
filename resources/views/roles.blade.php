@extends('home')

@section('titulo')
Roles
@endsection

@section('tituloForm')
{{-- Agregar Rol --}}
@endsection

@section('creacion')

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

    <form action="{{ url('/assign') }}" class="row d-none" method="post">
        @csrf
        <div class="col-md-4">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-control">
                {{-- <option value="">Seleccione Usuario</option> --}}
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="col-md-7">
            <div class="col-md-4">
                <label for="role" class="form-label">Rol</label>
                <select name="role" id="role" class="form-control">
                    {{-- <option value="">Seleccione Rol</option> --}}
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="enviar">
            <ion-icon name="save-outline"></ion-icon>
            Guardar
        </button>

        <a href="{{url('/usuarios')}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
    </form>
@endsection

@section('tituloTabla')
Lista de Roles Asignados
@endsection

@section('tablas')
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th>Usuario</th>
                <th>Rol</th>
                <th style="width: 15rem">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center  font-bold fs-5">{{ $user->name }}</td>

                    <td style="color: green" class="text-center  font-bold fs-5">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>

                    @if (auth()->user()->id == 1)
                    <td class="update-rol">
                        <form action="{{ route('role.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="role" id="role" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class=" ml-2"><ion-icon name="add-circle-outline"></ion-icon></button>
                        </form>

                        {{-- <form action="{{ route('role.destroy', $user->id) }}" class="" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-2 delete-rol"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form> --}}
                    </td>
                    @else
                    @role('admin')
                    <td class="update-rol">
                        <form action="{{ route('role.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="role" id="role" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class=" ml-2"><ion-icon name="add-circle-outline"></ion-icon></button>
                        </form>

                        {{-- <form action="{{ route('role.destroy', $user->id) }}" class="" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-2 delete-rol"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form> --}}
                    </td>
                    @endrole
                    @role('editor')
                    <td class="update-rol">
                        <form action="{{ route('role.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="role" id="role" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class=" ml-2"><ion-icon name="add-circle-outline"></ion-icon></button>
                        </form>

                        {{-- <form action="{{ route('role.destroy', $user->id) }}" class="" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-2 delete-rol"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form> --}}
                    </td>
                    @endrole
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection