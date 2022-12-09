
<?php

//verificación e insercion del registro de usuario cliente.


///agregar que verifique si no hay correo existente....
///agregar que no haya sql inyección.
if (!empty($_POST["registrar"])) {
    if (empty($_POST["email"]) or empty($_POST["user"]) or empty($_POST["passw"]) or empty($_POST["verify"])) {
        echo 'Falta uno de los campos de llenar';
    } else {

        $user = mysqli_real_escape_string($con, $_POST['user']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $passw = mysqli_real_escape_string($con, $_POST['passw']);
        $rol = 1;
        $two_factor = 0;
        //registro de usuario 
        $query = "INSERT INTO users (user,passw,email,rol,two_factor_key) VALUES ('$user','$email','$passw',$rol,$two_factor)";
        $query_run = mysqli_query($con, $query);

        $query_run1=false;
        //actualizacion de la tabla usuario
        $query1 = "SELECT id,email FROM users WHERE user='$user' ";
        $query_run1 = mysqli_query($con, $query1);
        $data = mysqli_fetch_array($query_run1);

        $_SESSION['id'] = $data['id'];
        $_SESSION['correo'] = $data['email'];

        if ($query_run == 1 ) {
            // echo 'AGREGADO';|
            // echo '<div class="success">usuario</div>';
            //header('Location: ../../index.php');
            echo "<script> window.location='../../view/view-security/check/verify.php'; </script>";
        } else {
            echo 'ocurrio un error...';
        }
    }
}

?>