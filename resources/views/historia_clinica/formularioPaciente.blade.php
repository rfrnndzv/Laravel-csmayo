<p class="division">A. DATOS ADMINISTRATIVOS</p>

<div class="col-lg-3">
    <label class="form-label">Historia Clínica Nº:  {{ $hclinica->nrohc }}</label>
</div>

<div class="col-lg-3">
    <label for="val_codfam" class="form-label">Código de Familia: {{ $hclinica->codfam }}</label>
</div>

<div class="col-lg-3">
    <label for="val_seguro" class="form-label">Seguro: {{ $hclinica->seguro }}</label>
</div>

<div class="col-lg-3">
    <label for="val_codfam" class="form-label">Establecimiento: {{ $hclinica->establecimiento }}</label>
</div>

<div class="col-lg-3">
    <label class="form-label">¿Tiene tos con flemas por más de 15 días?: @if (isset($hclinica->p1) && $hclinica->p1 == 1)
            Si
        @else
            No
        @endif</label>
</div>

<div class="col-lg-3">
    <label class="form-label">¿Conoce a alguien con este problema?:
        @if (isset($hclinica->p1) && $hclinica->p2 == 1)
            Si
        @else
            No
        @endif
    </label>
</div>

<div class="col-lg-3">
    <label id="val_responsable" class="form-label">
        @if ($registra->cipaciente != $registra->ciresponsable)
            Responsable: Si
        @else
            Responsable: No
        @endif
    </label>
</div>

<div id="responsable" class="row"></div>

<p class="division">B. IDENTIFICACIÓN DEL PACIENTE/USUARIO</p>

<div class="col-lg-2">
    <label for="val_cipaciente" class="form-label">C.I. Paciente: {{ isset($paciente->cipaciente) ? $paciente->cipaciente : '' }} </label>
</div>

<div class="col-lg-6">
    <label for="val_nombres" class="form-label">Nombre Completo: {{ (isset($persona->nombres) ? $persona->nombres : '') . ' ' . (isset($persona->apaterno) ? $persona->apaterno : '') . ' ' . (isset($persona->amaterno) ? $persona->amaterno : '') }}</label>
</div>

<div class="col-lg-2">
    <label for="val_apcasada" class="form-label"> {{ isset($paciente->apcasada) ? 'Apellido de Casada: ' . $paciente->apcasada : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_fnac" class="form-label">Fecha de Nacimiento: {{ isset($paciente->fnac) ? $paciente->fnac : '' }}</label>
</div>

<div class="col-lg-2">
    <label class="form-label">Sexo: {{ $paciente->sexo }}</label>
</div>

<div class="col-lg-2">
    <label for="val_procedencia" class="form-label">Procedencia: {{ isset($paciente->procedencia) ? $paciente->procedencia : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_idioma" class="form-label">Idioma: {{ isset($paciente->idioma) ? $paciente->idioma : '' }} </label>
</div>

<div class="col-lg-2">
    <label for="val_idiomamat" class="form-label">Idioma Materno: {{ isset($paciente->idiomamat) ? $paciente->idiomamat : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_autopercult" class="form-label">Auto Pertenencia Cultutal: {{ isset($paciente->autopercult) ? $paciente->autopercult : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_ocprod" class="form-label">Ocupación: {{ isset($paciente->ocupacion) ? $paciente->ocupacion : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_ocgescom" class="form-label">Gestión Comunitaria: {{ isset($paciente->ocomunitaria) ? $paciente->ocomunitaria : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_decididor" class="form-label">Decididor: {{ isset($paciente->decididor) ? $paciente->decididor : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_ecivil" class="form-label">Estado Civil: {{ isset($paciente->ecivil) ? $paciente->ecivil : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_escolaridad" class="form-label">Escolaridad: {{ isset($paciente->escolaridad) ? $paciente->escolaridad : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_nacionalidad" class="form-label">Nacionalidad: {{ isset($paciente->nacionalidad) ? $paciente->nacionalidad : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_depto" class="form-label">Departamento: {{ isset($paciente->depto) ? $paciente->depto : '' }}</label>
</div>

<div class="col-lg-4">
    <label for="val_direccion" class="form-label">Dirección: {{ isset($paciente->direccion) ? $paciente->direccion : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_nrodomicilio" class="form-label">Nro. de Domicilio: {{ isset($paciente->nrodomicilio) ? $paciente->nrodomicilio : '' }}</label>
</div>

<div class="col-lg-2">
    <label for="val_telefono" class="form-label">Telefono: {{ isset($paciente->telefono) ? $paciente->telefono : '' }}</label>
</div>