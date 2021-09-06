<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            Consulta Médica
        </h2>
    </x-slot>

    <!-- Menu de Opciones -->

    <!-- Contenido -->
    <div class="contenido p-3">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>C.I.</th>
                    <th>Nombre Paciente</th>
                    <th>Médico</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td> {{ $reserva->fecha }} </td>
                        <td> {{ $reserva->cipaciente }} </td>
                        <td> {{ $reserva->nom_paciente }} </td>
                        <td> {{ $reserva->medico }} </td>
                        <td> {{ $reserva->estado }} </td>
                        <td>
                            <a href="{{ route('cmedica.edit', $reserva->nroanexo) }}"
                                class="btn btn-success">Atender</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Fecha</th>
                    <th>C.I.</th>
                    <th>Nombres Completo</th>
                    <th>Médico</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Mis Librerias JS -->
    <x-slot name="scriptjs">
        <!-- Código de inicio, introduce datos del Responsable si existe -->
        <script src="{{ asset('js/recaudaciones.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    </x-slot>

</x-app-layout>
