<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de Municipios</title>
</head>
<body>
    <h1>Test de Municipios</h1>
    <form action="{{ route('get-municipios') }}" method="GET">
        <label for="departamento">Selecciona un departamento:</label>
        <select name="departamento_id" id="departamento">
            <option value="1">Departamento 1</option>
            <option value="2">Departamento 2</option>
            <!-- Agrega más opciones según tus datos de departamento -->
        </select>
        <button type="submit">Obtener Municipios</button>
    </form>
    <div id="municipios-container">
        <!-- Aquí se mostrarán los municipios obtenidos -->
    </div>
    
    <!-- Aquí podrías mostrar los municipios obtenidos en la respuesta AJAX si lo deseas -->
</body>
<script>
    .then(data => {
    // Limpiar el contenedor de municipios
    document.getElementById('municipios-container').innerHTML = '';

    // Iterar sobre los municipios y agregarlos al contenedor
    data.forEach(municipio => {
        // Crear un elemento de lista para cada municipio
        var listItem = document.createElement('li');
        listItem.textContent = municipio.nombre;

        // Agregar el elemento de lista al contenedor
        document.getElementById('municipios-container').appendChild(listItem);
    });
})

</script>

</html>
