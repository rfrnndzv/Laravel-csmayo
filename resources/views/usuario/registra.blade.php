<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            C.S. 1º de Mayo
        </h2>
    </x-slot>
    <form id="registro" class="row g-3 needs-validation" method="POST" action="{{ route('usuario.store') }}" novalidate>
        @include('usuario.formulario')
    </form>
    
    <x-slot name="scriptjs">
        <script src="{{ asset('js/usuario.js') }}"></script>
        <script>
          $(document).ready(function() {
              $('#example').DataTable();
          });
        </script>
      </x-slot>

</x-app-layout>
