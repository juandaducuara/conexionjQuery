
<h1>Crear Persona</h1>

<form action="{{ route('personas.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="departamento">Departamento:</label>
        <select name="departamento" id="departamento" class="form-control" required>
            <option value="">Selecciona un departamento</option>
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="municipio">Municipio:</label>
        <select name="municipio" id="municipio" class="form-control" required>
            <option value="">Selecciona un municipio</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
<h1>{{$json}}</h1>


<script>
    // Escuchar cambios en el campo de selección del departamento
    document.getElementById('departamento').addEventListener('change', function() {
        var departamentoId = this.value;
        var municipioSelect = document.getElementById('municipio');

        // Limpiar la lista de municipios
        municipioSelect.innerHTML = '<option value="">Selecciona un municipio</option>';

        // Si no se ha seleccionado un departamento, salir de la función
        if (!departamentoId) {
            return;
        }
       
        // Realizar una solicitud AJAX para obtener los municipios del departamento seleccionado
        fetch('/get-municipios?departamento_id=' + departamentoId)
            .then(response => response.json())
            .then(data => {
                // Agregar los municipios al campo de selección de municipios
                data.forEach(municipio => {
                    var option = document.createElement('option');
                    option.value = municipio.id;
                    option.textContent = municipio.nombre;
                    municipioSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al cargar los municipios:', error);
            });
    });
</script>