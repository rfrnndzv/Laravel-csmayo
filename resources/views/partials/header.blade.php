<div class="row">
    <div class="Encabezado text-white text-center col-xl-9">
        <h1 class="pt-1 display-5">Software Integrado</h1>
        <h1 class="pb-1 display-4">CENTRO DE SALUD 1ro DE MAYO</h1>
    </div>
    <div class="col-xl-3">
        <div class="row justify-content-around">
            <div class="logo col-5 col-xl-5">
                <img class="img-fluid" src="img/logo_csmayo.png" />
            </div>
            @if (Route::has('login'))
                <div class="text-center">
                    @auth
                        <a href="{{ url('/home') }}" class="text-md text-white-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white-700 acceso">Acceder</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</div>
