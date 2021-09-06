@extends('plantilla')

@section('contenido')
    <h1>Dejanos un mensaje.</h1>
    <form action="{{ route('contactanos.store') }}" class="row g-3 needs-validation" method="POST" novalidate>
        @csrf
        <div class="col-md-4">
            <label for="nombre" class="form-label">
                Nombre:
            </label>
            <input class="form-control" id="nombre" type="text" name="nombre" required>
            <div class="invalid-feedback">
                Complete el campo por favor.
            </div>
        </div>

        <div class="col-md-4">
            <label for="correo" class="form-label">
                Correo:
            </label>
            <input class="form-control" id="correo" type="email" name="correo" required>
            <div class="invalid-feedback">
                Verifique el formato de correo.
            </div>
        </div>

        <div class="col-md-12">
            <label for="mensaje" class="form-label">
                Mensaje:
            </label>
            <textarea class="form-control" id="mensaje" type="text" name="mensaje" required></textarea>
            <div class="invalid-feedback">
                Complete el campo por favor.
            </div>
        </div>

        <div class="col-md-12">
            <button id="enviar" class="btn btn-primary" type="submit">Enviar Mensaje</button>
        </div>
    </form>

    @if (session('info'))
        <script>
            alert("{{ session('info') }}");
        </script>        
    @endif

@endsection
