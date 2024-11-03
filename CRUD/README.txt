Pasos para la instalación:
Instalar la Base de datos (crud.sql) en su servidor local (sugerencia usar XAMPP).
El proyecto contiene varios archivos, la primer carpeta corresponde a la 
conexión a la base de datos, dentro de esta se encuentra un archivo php con la
confihuración de la base, configurar los datos de usuario y cointraseña acorde a 
los que tenga en su servidor local.
Posteriormente se encuentra un archivo api.php, el cual debera colocar en la raíz
de su servidor local (carpeta htdocs) y ejecutar ahí para probar la api.
El resultado de la API, lo devuelve en consola o en el response en formato json
El archivo index.php es donde se encuentra todo el CRUD, en este se aloja una interfaz
que fue diseñada con apoyo de bootstrap 5, se encuentra un botón de Agregar un usuario
el cual despliega un formulario con algunas verificaciones.
Posteriormente muestra una tabla que enlista los usuarios agregados en la BD, así
como dos botones para poder editar y eliminar al usuario, en el botón de editar
despliega el formulario en un modal donde deberá oprimir la opción a ejecutar.
El archivo usuarios.php es el encargado de recibiur los datos enviados por el método
POST en el formulari, así como las disitintas funciones del CRUD.

Por último, hay un botón para probar la API, el cuál llama al archivo prueba_api.html
que nos muestra un formulario para indicar las funciones requeridas en los ENDPOINT
de la API, ya sea ingresar un registro, elimarlo mediante su ID o mostrarlos, cabe
señalar que todos los resultados mostrados en formato JSON, son mostrados en consola,
por lo que deberá abrirla en su navegador para visualizarlos.

Par finalizar, el archivo insert_user, mes otrra prueba de la API, para insertar un
nuevo usuario, solo deberá configurar los datos de su base de datos con su usuario y
contraseña local, y se ejecutar y mostrará el resultado, ya se encuentra en el código
una configuración ejemplo de los datos, solo deberá llamar a la ruta del archivo para
su ejecución.

Adjunto un archivo PDF con los resultados y quedó atento de su respuesta.