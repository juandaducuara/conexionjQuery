
    <h1>Detalles de Persona</h1>

    <p><strong>ID:</strong> {{ $persona->id }}</p>
    <p><strong>Nombre:</strong> {{ $persona->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $persona->apellido }}</p>

    <a href="{{ route('personas.index') }}" class="btn btn-secondary">Volver</a>

