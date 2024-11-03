<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Origin: *");
// Configuración de la base de datos
$host = 'localhost';
$db = 'crud';
$user = 'root'; // Cambia esto por tu usuario de MySQL
$pass = ''; // Cambia esto por tu contraseña de MySQL
try {
$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo json_encode(['error' => $e->getMessage()]);
exit();
}
// Datos del nuevo usuario
/**Ingresa los datos de ejemplos para realizar el INSERT */
$data = [
    'nombre' => 'Juan',
    'paterno' => 'Perez',
    'materno' => 'Gonzalez',
    'curp' => 'PEGJ980501HMNLZQ02',
    'rfc' => 'PEGJ980501HJ6',
    'fe_nacimiento' => '1998-05-01',
    'email' => 'juan@example.com'
];

// URL de tu API
$url = 'http://localhost/api.php';

// Iniciar una nueva sesión cURL
$ch = curl_init($url);

// Configurar las opciones de cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna la transferencia como string del valor de curl_exec()
curl_setopt($ch, CURLOPT_POST, true); // Establece el método como POST
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json', // Especifica que el contenido es JSON
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Envía los datos en formato JSON

// Ejecutar la solicitud
$response = curl_exec($ch);

// Cerrar la sesión cURL
curl_close($ch);

// Mostrar la respuesta
echo $response;
?>