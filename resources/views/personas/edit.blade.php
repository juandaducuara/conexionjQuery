<!-- resources/views/personas/edit.blade.php -->

    <h1>Editar Persona</h1>

    <form action="{{ route('personas.update', $persona->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $persona->nombre }}">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $persona->apellido }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
