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
// Obtener la lista de todos los usuarios
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
$stmt = $pdo->query("SELECT * FROM usuarios");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($users);
exit();
}
// Agregar un nuevo usuario
if (!$pdo) {
    echo json_encode(['error' => 'Error de conexión a la base de datos']);
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $nombre = $data->nombre ?? '';
    $paterno = $data->paterno ?? '';
    $materno = $data->materno ?? '';
    $curp = $data->curp ?? '';
    $rfc = $data->rfc ?? '';
    $fe_nacimiento = $data->fe_nacimiento ?? '';
    $email = $data->email ?? '';


    if ($nombre && $email) {
        $stmt = $pdo->prepare("INSERT INTO usuarios (Nombre, Paterno, Materno, CURP, RFC, Fe_nacimiento, Email) VALUES (?, ?,?,?,?,?,?)");
        
        // Cambia NULL por el valor correspondiente si tienes datos para esos campos
        //var_dump($stmt->errorInfo());
        //var_dump($stmt);
        if ($stmt->execute([$nombre,$paterno,$materno,$curp,$rfc,$fe_nacimiento,$email])) {
            $newUser = [
                'id' => $pdo->lastInsertId(),
                'nombre' => $nombre,
                'paterno' => $paterno,
                'materno' => $materno,
                'curp' => $curp,
                'rfc' => $rfc,
                'fe_nacimiento' => $fe_nacimiento,
                'email' => $email
            ];
            echo json_encode($newUser);
        } else {
            echo json_encode(['error' => 'Error al agregar el usuario']);
        }
    } else {
        echo json_encode(['error' => 'Datos incompletos']);
    }
    exit();
}
// Eliminar un usuario por su ID
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
$id = intval(basename($_SERVER['REQUEST_URI']));
$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
if ($stmt->execute([$id])) {
echo json_encode(['message' => 'Usuario eliminado correctamente']);
} else {
echo json_encode(['error' => 'Usuario no encontrado']);
}
exit();
}
?>