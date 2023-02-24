// import './bootstrap';

fetch('https://jsonplaceholder.typicode.com/users')
      // Analizar la respuesta como JSON
      .then(response => response.json())
      // Ordenar los usuarios por el campo "name"
      .then(data => data.sort((a, b) => a.name.localeCompare(b.name)))
      // Crear la tabla dinámicamente utilizando el plugin DataTables
      .then(data => {
        // Seleccionar la tabla por su ID y aplicar el plugin DataTables
        $('#usuarios').DataTable({
          // Especificar las columnas de la tabla y las propiedades del objeto JSON correspondientes
          columns: [
            { data: 'name', title: 'Nombre' },
            { data: 'username', title: 'Usuario' },
            { data: 'email', title: 'Correo electrónico' },
            { data: 'address.city', title: 'Ciudad' },
            { data: 'phone', title: 'Teléfono' },
            { data: 'company.name', title: 'Empresa' }
          ],
          // Especificar los datos a mostrar en la tabla
          data: data,

          pageLength: 5,

          lengthMenu: [5, 10, 25, 50]
        });
      });
  