<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            C.S. 1º de Mayo
        </h2>
    </x-slot>

    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Usuarios
            </button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="btnGroupDrop1">
                <li><a class="dropdown-item" href="{{ route('usuario.create') }}">Registrar Nuevo</a></li>
                <li><a class="dropdown-item" href="{{ route('usuarios.pdf') }}">Generar PDF</a></li>
            </ul>
        </div>
    </div>

    <div class="contenido p-3">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>C.I.</th>
                    <th>Usuario</th>
                    <th>Nivel</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($usuarios as $usuario)
                    <tr>
                        <td> {{ $usuario->ciusuario }} </td>
                        <td> {{ $usuario->name }} </td>
                        <td>
                            @if ($usuario->nivel == 1)
                                Desarrollo
                            @endif
                            @if ($usuario->nivel == 2)
                                Mantenimiento
                            @endif
                            @if ($usuario->nivel == 3)
                                Recaudaciones
                            @endif
                            @if ($usuario->nivel == 4)
                                Enfermeria
                            @endif
                            @if ($usuario->nivel == 5)
                                Medicina General
                            @endif
                            @if ($usuario->nivel == 6)
                                Odontología
                            @endif
                        </td>
                        <td> <a href="{{ route('usuario.edit', $usuario) }}" class="btn btn-warning"><span
                                    class="editar"></span></a></td>
                        <td>
                            <form action="{{ route('usuario.destroy', $usuario) }}" method="POST"
                                onclick="return confirm('¿Se eliminará registro?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><span class="eliminar"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>C.I.</th>
                    <th>Usuario</th>
                    <th>Nivel</th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <x-slot name="scriptjs">
        <script src="{{ asset('js/usuario.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    </x-slot>

</x-app-layout>
