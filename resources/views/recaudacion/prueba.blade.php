<p class="division">A.1. IDENTIFICACIÓN DEL RESPONSABLE</p>
<div class="col-lg-2">
    <label for="val_ciresponsable" class="form-label">C.I. Responsable: {{ $responsable->ci }}</label>
</div>
<div class="col-lg-2">
    <label for="val_nombresresp" class="form-label">Nombre Completo: {{ $responsable->nombres . ' ' . (isset($responsable->apaterno) ? $responsable->apaterno : '') . ' ' . (isset($responsable->amaterno) ? $responsable->amaterno : '') }}</label>
</div>
