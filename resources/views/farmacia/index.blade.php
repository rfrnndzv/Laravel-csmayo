<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            Farmacia
        </h2>
    </x-slot>

    <!-- Menu de Opciones -->

    <!-- Contenido -->
    <div class="contenido p-3">
        <table id="Tabla" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tipo Atención</th>
                    <th>Seguro</th>
                    <th>Nombre Paciente</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recetas as $receta)
                    <tr>
                        <td> {{ $receta->fecha }} </td>
                        <td> {{ $receta->tipoatencion }} </td>
                        <td> {{ $receta->seguro }} </td>
                        <td> {{ $receta->nombres . ' ' .  $receta->apaterno . ' ' . $receta->amaterno }} </td>
                        <td> </td>
                        <td>
                            <a href=" {{ route('farmacia.edit', $receta->nroanexo) }} "
                                class="btn btn-success
                                    @if(Auth::user()->nivel != 7)
                                        deshabilitar
                                    @endif">Atender
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Fecha</th>
                    <th>Tipo Atención</th>
                    <th>Seguro</th>
                    <th>Nombre Paciente</th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Mis Librerias JS -->
    <x-slot name="scriptjs">
        <script>
            $(document).ready(function() {
                $('#Tabla').DataTable()
            });
        </script>
    </x-slot>

</x-app-layout>
