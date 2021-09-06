@csrf
<p class="division">A. DATOS ADMINISTRATIVOS</p>

<div class="col-lg-3">
    <label for="val_nrohc" class="form-label">Número de Historia Clínica</label>
    <input type="text" class="form-control" id="val_nrohc" name="nrohc"
        value="{{ isset($registra->nrohc) ? $registra->nrohc : 'Este valor se asignará automaticamente' }}" readonly>
</div>

<div class="col-lg-3">
    <label for="val_codfam" class="form-label">Código de Familia</label>
    <input type="text" class="form-control" id="val_codfam" name="codfam"
        value="{{ isset($hclinica->codfam) ? $hclinica->codfam : 'Este valor se asignará automaticamente' }}" readonly>
</div>

<div class="col-lg-3">
    <label for="val_seguro" class="form-label">Seguro</label>
    <input type="text" class="form-control" name="seguro" list="val_seguro"
        value="{{ isset($hclinica->seguro) ? $hclinica->seguro : '' }}" require />
    <datalist id="val_seguro">
        <option>SUS</option>
        <option>CNS</option>
        <option>CPS</option>
        <option>CBES</option>
        <option>Otro</option>
    </datalist>
</div>

<div class="col-lg-3">
    <label for="val_codfam" class="form-label">Establecimiento</label>
    <input type="text" class="form-control" id="val_codfam" name="establecimiento" value="1ro de Mayo" readonly>
</div>

<div class="col-lg-4">
    <label class="form-label">¿Tiene tos con flemas por más de 15 días?(*)</label>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="val_preg1s" name="p1" value="1" @if (isset($hclinica->p1) && $hclinica->p1 == 1)
        checked
        @endif
        required>
        <label class="form-check-label" for="val_preg1s">Si</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="val_preg1n" name="p1" value="0" @if (isset($hclinica->p1) && $hclinica->p1 == 0)
        checked
        @endif
        required>
        <label class="form-check-label" for="val_preg1n">No</label>
        <div class="invalid-feedback">Seleccione almenos uno</div>
    </div>
</div>

<div class="col-lg-4">
    <label class="form-label">¿Conoce a alguien con este problema?(*)</label>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="val_preg2s" name="p2" value="1" @if (isset($hclinica->p1) && $hclinica->p2 == 1)
        checked
        @endif
        required>
        <label class="form-check-label" for="val_preg2s">Si</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="val_preg2n" name="p2" value="0" @if (isset($hclinica->p1) && $hclinica->p2 == 0)
        checked
        @endif
        required>
        <label class="form-check-label" for="val_preg2n">No</label>
        <div class="invalid-feedback">Seleccione almenos uno</div>
    </div>
</div>

<div class="col-lg-4">
    <input type="checkbox" class="form-check-input" id="val_responsable" value="1" @if (isset($registra->cipaciente) && $registra->cipaciente != $registra->ciresponsable)
    CHECKED
    @endif
    name="responsable">
    <label for="val_responsable" class="form-check-label">Responsable</label>
</div>

<div id="responsable" class="row"></div>

<p class="division">B. IDENTIFICACIÓN DEL PACIENTE/USUARIO</p>

<input type="hidden" name="cipaciente"
    value="{{ isset($paciente->cipaciente) ? $paciente->cipaciente : '' }}" readonly>

<div class="col-lg-2">
    <label for="val_cipaciente" class="form-label">C.I. Paciente(*)</label>
    <input type="text" class="form-control" id="val_cipaciente" name="nuevocipaciente"
        value="{{ isset($paciente->cipaciente) ? $paciente->cipaciente : '' }}" required>
    <div class="invalid-feedback">
        Ingrece Cédula de Identidad
    </div>
</div>

<div class="col-lg-2">
    <label for="val_nombres" class="form-label">Nombres(*)</label>
    <input type="text" class="form-control" id="val_nombres" name="nombres"
        value="{{ isset($persona->nombres) ? $persona->nombres : '' }}" required>
    <div class="invalid-feedback">
        Introduzca al menos un nombre
    </div>
</div>

<div class="col-lg-2">
    <label for="val_apaterno" class="form-label">Apellido Paterno</label>
    <input type="text" class="form-control" id="val_apaterno" name="apaterno"
        value="{{ isset($persona->apaterno) ? $persona->apaterno : '' }}">
</div>

<div class="col-lg-2">
    <label for="val_amaterno" class="form-label">Apellido Materno</label>
    <div class="input-group has-validation">
        <input type="text" class="form-control" id="val_amaterno" name="amaterno"
            value="{{ isset($persona->amaterno) ? $persona->amaterno : '' }}">
    </div>
</div>

<div class="col-lg-2">
    <label for="val_apcasada" class="form-label">Apellido de Casada</label>
    <div class="input-group has-validation">
        <input type="text" class="form-control" id="val_apcasada" name="apcasada"
            value="{{ isset($paciente->apcasada) ? $paciente->apcasada : '' }}">
    </div>
</div>

<div class="col-lg-2">
    <label for="val_fnac" class="form-label">Fecha de Nacimiento(*)</label>
    <input type="date" class="form-control" id="val_fnac" name="fnac"
        value="{{ isset($paciente->fnac) ? $paciente->fnac : '' }}" required>
    <div class="invalid-feedback">
        Por favor proporcione una fecha de nacimiento.
    </div>
</div>

<div class="col-lg-2">
    <label class="form-label">Sexo(*)</label>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="val_sexof" name="sexo" value="F" @if (isset($paciente->sexo) && $paciente->sexo == 'F')
        checked
        @endif
        required>
        <label class="form-check-label" for="val_sexof">Femenino</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="val_sexom" name="sexo" value="M" @if (isset($paciente->sexo) && $paciente->sexo == 'M')
        checked
        @endif
        required>
        <label class="form-check-label" for="val_sexom">Masculino</label>
        <div class="invalid-feedback">Seleccione almenos uno</div>
    </div>
</div>

<div class="col-lg-2">
    <label for="val_procedencia" class="form-label">Procedencia</label>
    <input type="text" class="form-control" id="val_procedencia" name="procedencia"
        value="{{ isset($paciente->procedencia) ? $paciente->procedencia : '' }}">
</div>

<div class="col-lg-2">
    <label for="val_idioma" class="form-label">Idioma(*)</label>
    <select class="form-select" id="val_idioma" name="idioma" required>
        <option {{ isset($paciente->idioma) ? '' : 'selected' }} disabled value="">Seleccione un estado</option>
        <option @if (isset($paciente->idioma) && $paciente->idioma == 'Castellano')
            selected
            @endif
            value="Castellano">Castellano</option>
        <option @if (isset($paciente->idioma) && $paciente->idioma == 'Aymara')
            selected
            @endif
            value="Aymara">Aymara</option>
        <option @if (isset($paciente->idioma) && $paciente->idioma == 'Quechua')
            selected
            @endif
            value="Quechua">Quechua</option>
        <option @if (isset($paciente->idioma) && $paciente->idioma == 'Castellano y Aymara')
            selected
            @endif
            value="Castellano y Aymara">Castellano y Aymara</option>
        <option @if (isset($paciente->idioma) && $paciente->idioma == 'Castellano y Quechua')
            selected
            @endif
            value="Castellano y Quechua">Castellano y Quechua</option>
        <option @if (isset($paciente->idioma) && $paciente->idioma == 'Aymara y Quechua')
            selected
            @endif
            value="Aymara y Quechua">Aymara y Quechua</option>
        <option @if (isset($paciente->idioma) && $paciente->idioma == 'Otro')
            selected
            @endif
            value="Otro">Otro</option>
    </select>
    <div class="invalid-feedback">
        Selecciona un estado válido.
    </div>
</div>

<div class="col-lg-2">
    <label for="val_idiomamat" class="form-label">Idioma Materno(*)</label>
    <select class="form-select" id="val_idiomamat" name="idiomamat" required>
        <option {{ isset($paciente->idiomamat) ? '' : 'selected' }} disabled value="">Seleccione un estado</option>
        <option @if (isset($paciente->idiomamat) && $paciente->idiomamat == 'Castellano')
            selected
            @endif
            value="Castellano">Castellano</option>
        <option @if (isset($paciente->idiomamat) && $paciente->idiomamat == 'Aymara')
            selected
            @endif
            value="Aymara">Aymara</option>
        <option @if (isset($paciente->idiomamat) && $paciente->idiomamat == 'Quechua')
            selected
            @endif
            value="Quechua">Quechua</option>
        <option @if (isset($paciente->idiomamat) && $paciente->idiomamat == 'Castellano y Aymara')
            selected
            @endif
            value="Castellano y Aymara">Castellano y Aymara</option>
        <option @if (isset($paciente->idiomamat) && $paciente->idiomamat == 'Castellano y Quechua')
            selected
            @endif
            value="Castellano y Quechua">Castellano y Quechua</option>
        <option @if (isset($paciente->idiomamat) && $paciente->idiomamat == 'Aymara y Quechua')
            selected
            @endif
            value="Aymara y Quechua">Aymara y Quechua</option>
        <option @if (isset($paciente->idiomamat) && $paciente->idiomamat == 'Otro')
            selected
            @endif
            value="Otro">Otro</option>
    </select>
    <div class="invalid-feedback">
        Selecciona un estado válido.
    </div>
</div>

<div class="col-lg-2">
    <label for="val_autopercult" class="form-label">Auto Pertenencia Cultutal</label>
    <input type="text" class="form-control" id="val_autopercult" name="autopercult"
        value="{{ isset($paciente->autopercult) ? $paciente->autopercult : '' }}">
</div>

<div class="col-lg-2">
    <label for="val_ocprod" class="form-label">Ocupación</label>
    <input type="text" class="form-control" id="val_ocprod" name="ocupacion"
        value="{{ isset($paciente->ocupacion) ? $paciente->ocupacion : '' }}" require>
    <div class="invalid-feedback">
        Por favor complete el campo.
    </div>
</div>

<div class="col-lg-2">
    <label for="val_ocgescom" class="form-label">Gestión Comunitaria</label>
    <input type="text" class="form-control" id="val_ocgescom" name="ocomunitaria"
        value="{{ isset($paciente->ocomunitaria) ? $paciente->ocomunitaria : '' }}">
</div>

<div class="col-lg-2">
    <label for="val_decididor" class="form-label">Decididor</label>
    <input type="text" class="form-control" name="decididor" list="val_decididor"
        value="{{ isset($paciente->decididor) ? $paciente->decididor : '' }}" require />
    <datalist id="val_decididor">
        <option>Pareja</option>
        <option>Hija/a(s)</option>
        <option>Otro Familiar</option>
        <option>Usted Mismo</option>
        <option>Otro</option>
    </datalist>
</div>

<div class="col-lg-2">
    <label for="val_ecivil" class="form-label">Estado Civil(*)</label>
    <select class="form-select" id="val_ecivil" name="ecivil" required>
        <option {{ isset($paciente->ecivil) ? '' : 'selected' }} disabled value="">Seleccione un estado</option>
        <option @if (isset($paciente->ecivil) && $paciente->ecivil == 'Soltero(a)')
            selected
            @endif
            value="Soltero(a)">Soltero(a)</option>
        <option @if (isset($paciente->ecivil) && $paciente->ecivil == 'Casado(a)')
            selected
            @endif
            value="Casado(a)">Casado(a)</option>
        <option @if (isset($paciente->ecivil) && $paciente->ecivil == 'Conviviente')
            selected
            @endif
            value="Conviviente">Conviviente</option>
        <option @if (isset($paciente->ecivil) && $paciente->ecivil == 'Viudo(a)')
            selected
            @endif
            value="Viudo(a)">Viudo(a)</option>
        <option @if (isset($paciente->ecivil) && $paciente->ecivil == 'Divorsiado(a)')
            selected
            @endif
            value="Divorsiado(a)">Divorsiado(a)</option>
        <option @if (isset($paciente->ecivil) && $paciente->ecivil == 'Separado(a)')
            selected
            @endif
            value="Separado(a)">Separado(a)</option>
    </select>
    <div class="invalid-feedback">
        Selecciona un estado válido.
    </div>
</div>

<div class="col-lg-2">
    <label for="val_escolaridad" class="form-label">Escolaridad(*)</label>
    <select class="form-select" id="val_escolaridad" name="escolaridad" required>
        <option {{ isset($paciente->escolaridad) ? '' : 'selected' }} disabled value="">Seleccione un estado</option>
        <option @if (isset($paciente->escolaridad) && $paciente->escolaridad == 'Sin Instrucción')
            selected
            @endif
            value="Sin Instrucción">Sin Instrucción</option>
        <option @if (isset($paciente->escolaridad) && $paciente->escolaridad == 'Básico')
            selected
            @endif
            value="Básico">Básico</option>
        <option @if (isset($paciente->escolaridad) && $paciente->escolaridad == 'Intermedio')
            selected
            @endif
            value="Intermedio">Intermedio</option>
        <option @if (isset($paciente->escolaridad) && $paciente->escolaridad == 'Medio')
            selected
            @endif
            value="Medio">Medio</option>
        <option @if (isset($paciente->escolaridad) && $paciente->escolaridad == 'Mas')
            selected
            @endif
            value="Mas">Mas</option>
    </select>
    <div class="invalid-feedback">
        Selecciona un estado válido.
    </div>
</div>

<div class="col-lg-2">
    <label for="val_nacionalidad" class="form-label">Nacionalidad</label>
    <input type="text" class="form-control" id="val_nacionalidad" name="nacionalidad"
        value="{{ isset($paciente->nacionalidad) ? $paciente->nacionalidad : '' }}">
</div>

<div class="col-lg-2">
    <label for="val_depto" class="form-label">Departamento(*)</label>
    <select class="form-select" id="val_depto" name="depto" required>
        <option {{ isset($paciente->depto) ? '' : 'selected' }} disabled value="">Seleccione un estado</option>
        <option @if (isset($paciente->depto) && $paciente->depto == 'Beni')
            selected
            @endif
            value="Beni">Beni</option>
        <option @if (isset($paciente->depto) && $paciente->depto == 'Chuquisaca')
            selected
            @endif
            value="Chuquisaca">Chuquisaca</option>
        <option @if (isset($paciente->depto) && $paciente->depto == 'Cochabamba')
            selected
            @endif
            value="Cochabamba">Cochabamba</option>
        <option @if (isset($paciente->depto) && $paciente->depto == 'La Paz')
            selected
            @endif
            value="La Paz">La Paz</option>
        <option @if (isset($paciente->depto) && $paciente->depto == 'Oruro')
            selected
            @endif
            value="Oruro">Oruro</option>
        <option @if (isset($paciente->depto) && $paciente->depto == 'Pando')
            selected
            @endif
            value="Pando">Pando</option>
        <option @if (isset($paciente->depto) && $paciente->depto == 'Potosí')
            selected
            @endif
            value="Potosí">Potosí</option>
        <option @if (isset($paciente->depto) && $paciente->depto == 'Santa Cruz')
            selected
            @endif
            value="Santa Cruz">Santa Cruz</option>
        <option @if (isset($paciente->depto) && $paciente->depto == 'Tarija')
            selected
            @endif
            value="Tarija">Tarija</option>
    </select>
    <div class="invalid-feedback">
        Selecciona un estado válido.
    </div>
</div>

<div class="col-lg-4">
    <label for="val_direccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="val_direccion" name="direccion"
        value="{{ isset($paciente->direccion) ? $paciente->direccion : '' }}" require>
    <div class="invalid-feedback">
        Ingrese una dirección
    </div>
</div>

<div class="col-lg-2">
    <label for="val_nrodomicilio" class="form-label">Nro. de Domicilio</label>
    <input type="number" class="form-control" id="val_nrodomicilio" name="nrodomicilio"
        value="{{ isset($paciente->nrodomicilio) ? $paciente->nrodomicilio : '' }}">
</div>

<div class="col-lg-2">
    <label for="val_telefono" class="form-label">Telefono</label>
    <input type="text" class="form-control" id="val_telefono" name="telefono"
        value="{{ isset($paciente->telefono) ? $paciente->telefono : '' }}">
</div>

<div class="col-12 text-center">
    <button class="btn btn-primary" id="guarda" name="guarda" type="submit">Guardar</button>
</div>
