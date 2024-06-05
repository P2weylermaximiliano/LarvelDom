<x-app-layout>
<form action="{{ route('assit') }}" method="POST">
    @csrf
    <h2>Poner asistencia</h2>
    
    <input type="text" name="valor" placeholder="Ingrese el dni">
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

</x-app-layout>