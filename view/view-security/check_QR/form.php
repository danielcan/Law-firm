<?php


$correo=$_SESSION['correo'];
//$correo = $_SESSION['correo'];
require "Authenticator.php";

//Instanciación de la clase authenticator. 
$Authenticator = new Authenticator();
//verifica si la variable es null y devuelve falso o verdadero 
if (!isset($_SESSION['auth_secret'])) {
    $secret = $Authenticator->generateRandomSecret();
    $_SESSION['auth_secret'] = $secret;
}

//obtención de codigo qr por medio del metodo get.
$qrCodeUrl = $Authenticator->getQR($correo, $_SESSION['auth_secret'], 'Bufete legal');

//para mensaje de error se inicializa en falso para que no de el mensaje.
if (!isset($_SESSION['failed'])) {
    $_SESSION['failed'] = false;
}

?>


<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" style="background: white; padding: 20px;  margin-top: 30px;">
            <h1 style="text-align: center;">Autentícate con Google Autheticator</h1>
            <h3 style="text-align: center;">Descarga la app de google authenticator para poder ingresar</h3>
            <hr>
            <form action="acep.php" method="post">
                <div style="text-align: center;">
                    <?php if ($_SESSION['failed']) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Código invalido..</h4>
                        </div>
                        <?php
                        $_SESSION['failed'] = false;
                        ?>
                    <?php endif ?>

                    <img style="text-align: center;;" class="img-fluid" src="<?php echo $qrCodeUrl ?>" alt="Verify this Google Authenticator"><br><br>
                    <h3 style="text-align: center;">Escanea el código QR en la app e ingrese el código en este campo.</h3>
                    <input type="text" class="form-control" name="code" placeholder="******" style="font-size:x-large ;width: 200px;border-radius: 0px;text-align: center;display: inline;color: #0275d8;" id="codigo" ><br>
                    <button type="submit" class="btn btn-md btn-primary" style="width: 200px;border-radius: 0px; FONT-SIZE: 20pt;">Verificación</button>
                </div>
            </form>
        </div>
    </div>
</div>