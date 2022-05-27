<p class="division">CONSULTAS MEDICAS</p>

<table id="Tabla" class="display" style="width:100%">
    <thead>
        <tr>
        <th>Fecha</th>
        <th>Subjetivo</th>
        <th>Objetivo</th>
        <th>Plan de Accion</th>
        <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($amedicas as $amedica)
            <tr>
                <td> {{ $amedica->fecha }} </td>
                <td> {{ $amedica->subjetivo }} </td>
                <td> {{ $amedica->objetivo }} </td>
                <td> {{ $amedica->paccion }} </td>
                <td> {{ $amedica->estado }} </td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>