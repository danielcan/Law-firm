<link rel="stylesheet" href="style.css">

<form action="control.php" method="POST" class="ingreso">
  <div class="cont_form_login">
    <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
    <h3 style="margin-top:100px; font-family: Lato, Helvetica, Arial, sans-serif;">INICIAR SESIÓN</h3>
    <input type="text" placeholder="Correo Electronico" name="emailo" style="font-size:large" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required/>
    <input type="password" placeholder="Contraseña" name="passwo" style="font-size:large"  required/>
    <button class="btn_login" type="submit" name="inicio" style="font-size:large">INICIAR SESIÓN</button>
  </div>
</form>

