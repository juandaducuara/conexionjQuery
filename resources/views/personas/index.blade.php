<!-- resources/views/personas/index.blade.php -->




    <h1>Listado de Personas</h1>

    <a href="{{ route('personas.create') }}" class="btn btn-primary mb-3">Crear Persona</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
                <tr>
                    <td>{{ $persona->id }}</td>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->apellido }}</td>
                    <td>
                        <a href="{{ route('personas.show', $persona->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta persona?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

