<x-app-layout>
<form action="{{ route('Ponerdias') }}" method="POST">
    @csrf
    <h2>Poner dias</h2>
    
    <input type="text" name="dias" placeholder="Ingrese los dias">
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

</x-app-layout>
