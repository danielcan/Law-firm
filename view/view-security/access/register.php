
<form action="<?php echo htmlspecialchars("control.php");?>" method="POST" class="formulario">
   <div class="cont_form_sign_up">
      <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
      <h4 style="text-align: center;  font-size:20px; margin-top:45px; font-family: Lato, Helvetica, Arial, sans-serif;">REGÍSTRATE</h4>
      <input type="text" placeholder="Correo Electronico" style="padding: 10px 5px;font-size:large;" name="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required/>
      <input type="password" placeholder="Contraseña" style="padding: 10px 5px;font-size:large;" name="passw"  required/>
      <input type="password" placeholder="Confirmación contraseña" style="padding: 10px 5px;font-size:large;" name="verify"  required/>
      <button class="btn_sign_up" type="submit" name="registrar" style="font-size:large">REGÍSTRATE</button>
   </div>
</form>