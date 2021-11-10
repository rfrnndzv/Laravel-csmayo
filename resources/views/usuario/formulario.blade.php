@csrf

<div class="col-md-3">
    <label for="ciusuario" class="form-label">C.I. Personal (*)</label>
    <input type="text" class="form-control" id="ciusuario" name="ciusuario"
        value="{{ isset($usuario->ciusuario)?$usuario->ciusuario:'' }}" required>
    <div class="invalid-feedback">
        Complete el campo por favor.
    </div>
</div>

<div class="col-md-3">
    <label for="val_nombres" class="form-label">Nombres (*)</label>
    <input type="text" class="form-control" id="val_nombres" name="nombres" value="{{ isset($persona->nombres)?$persona->nombres:'' }}" required>
    <div class="invalid-feedback">
        Complete el campo por favor.
    </div>
</div>

<div class="col-md-3">
    <label for="val_apaterno" class="form-label">Apellido Paterno</label>
    <input type="text" class="form-control" id="val_apaterno" name="apaterno" value="{{ isset($persona->apaterno)?$persona->apaterno:'' }}">
    <div class="invalid-feedback">
        Complete el campo por favor.
    </div>
</div>

<div class="col-md-3">
    <label for="val_amaterno" class="form-label">Apellido Materno</label>
    <input type="text" class="form-control" id="val_amaterno" name="amaterno" value="{{ isset($persona->amaterno)?$persona->amaterno:'' }}">
    <div class="invalid-feedback">
        Complete el campo por favor.
    </div>
</div>

<div class="col-md-3">
    <label for="name" class="form-label">Usuario(*)</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ isset($usuario->name)?$usuario->name:'' }}" required>
    <div class="invalid-feedback">
        Complete el campo por favor.
    </div>
</div>

<div class="col-md-3">
    <label for="email" class="form-label">E-mail(*)</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ isset($usuario->email)?$usuario->email:'' }}" required>
    <div class="invalid-feedback">
        Verifique el correo por favor.
    </div>
</div>

<div class="col-md-2">
    <label for="password" class="form-label">Contraseña</label>
    <input id="c1" type="password" class="form-control" id="password" name="password" required>
    <div class="invalid-feedback">
        Complete el campo por favor.
    </div>
</div>

<div class="col-md-2">
    <label for="cpassword" class="form-label">Confirmar Contraseña (*)</label>
    <input id="c2" type="password" class="form-control" id="cpassword" name="cpassword" required>
    <div class="invalid-feedback">
        Complete el campo por favor.
    </div>
</div>

<div class="col-md-2">
    <label for="val_nivel" class="form-label">Área (*)</label>
    <select class="form-select" id="val_nivel" name="nivel" required>
        <option {{ isset($usuario->nivel)?'':'selected' }} disabled value="">Seleccione un estado</option>
        <option 
            @if(isset($usuario->nivel) && $usuario->nivel == 1)
                selected
            @endif
        value="1">Soporte - Desarrollo</option>
        <option
            @if(isset($usuario->nivel) && $usuario->nivel == 2)
                selected
            @endif
        value="2">Soporte - Mantenimiento</option>
        <option
            @if(isset($usuario->nivel) && $usuario->nivel == 3)
                selected
            @endif
        value="3">Recaudaciones</option>
        <option
            @if(isset($usuario->nivel) && $usuario->nivel == 4)
                selected
            @endif
        value="4">Enfermería - Med. General</option>
        <option
            @if(isset($usuario->nivel) && $usuario->nivel == 5)
                selected
            @endif
        value="5">Medicina General</option>
        <option
            @if(isset($usuario->nivel) && $usuario->nivel == 6)
                selected
            @endif
        value="6">Odontología</option>
        <option
            @if(isset($usuario->nivel) && $usuario->nivel == 7)
                selected
            @endif
        value="7">Farmaceutico</option>
    </select>
    <div id="mc2" class="invalid-feedback">
        Selecciona un estado válido.
    </div>
</div>

<div class="col-2">
    <button id="guardar" class="btn btn-primary" type="submit">Guardar</button>
</div>

<div class="col-2">
    <a id="cancelar" class="btn btn-primary" href="{{ route('usuario.index') }}">Cancelar</a>
</div>
