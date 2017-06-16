<?php


session_start();

include_once '../config/database.php';

// Instanciamos el objeto para la base de datos

$database = new Database();
$db = $database->getConnection();

function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return $str;
}

// Limpiamos los valores enviados y hacemos una previa validación de existencia.

$login = clean($_POST['login']);
$password = clean($_POST['password']);
$n_p = md5($password);

if($login == '') {
    $errmsg_arr[] = 'Login ID missing';
    $errflag = true;
}
if($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
}

if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: ../index.php");
    exit();
}


// Aquí realizamos la consulta a la tabla usuario

$query = "SELECT * FROM user WHERE usuario = :login AND contrasena = :passwd";
$stmt = $db->prepare($query);
$login2 = clean($_POST['login']);
$clave = md5($_POST['password']);
$stmt->bindParam(':login', $login2);
$stmt->bindParam(':passwd', $clave);
$result = $stmt->execute();
$num = $stmt->rowCount();
//echo $num;

// Aquí validamos la respuesta de la consulta y tomamos desiciones para mostrar una pantalla de respuesta.

if($result){
    if($num == 1){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $_SESSION['SESS_MEMBER_ID'] = $row['id'];
            $_SESSION['SESS_FIRST_NAME'] = $row['usuario'];

            session_write_close();
            header("location: ../dashboard.php");
            exit();
        }
    } else {
        header("location: ../index.php");
        exit();
    }
} else {
    die("Query failed");
}

?>