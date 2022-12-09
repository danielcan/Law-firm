<?php


//utilización de la clase de autenticación 
require "Authenticator.php";
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: inicial.php");
    die();
}
//instanción de la clase de autenticación
$Authenticator = new Authenticator();

//verifica el resultado para ver si el código es correcto. 
//devuelve verdadero o falso(si no es la clave).
$checkResult = $Authenticator->verifyCode($_SESSION['auth_secret'], $_POST['code'], 2);    // 2 = 2*30sec clock tolerance

//regresa a la form de autenticación para que ingrese bien el codigo de qr.
if (!$checkResult) {
    $_SESSION['failed'] = true;
    header("location: inicial.php");
    die();
}

//para insertar en update.
$two_factor = $_POST['code'];

?>


<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" style="background: white; padding: 20px; box-shadow: 10px 10px 5px #888888; margin-top: 100px;">
            <hr>
            <form action="redireccion.php" method="post">
            <div style="text-align: center;">
                <h1>Autenticación exitosa</h1>
                <h3>Gracias por usar nuestro autenticador.</h3>
            </div>
            <hr>
            <div style="margin-left: 22%;">
                <button type="submit" name="redireccion" class="btn btn-md btn-info" style="width: 300px;border-radius: 0px; FONT-SIZE: 20pt;">Ir a la plataforma</button>
            </div>  
            </form>  
        </div>
    </div>
</div>