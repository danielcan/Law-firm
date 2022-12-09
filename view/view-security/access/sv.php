<?php
session_start();
include_once 'header-inicial.php';
?>

<div class="container mt-4">
  <?php include('mensaje.php'); ?>
</div>

<link rel="stylesheet" href="style.css">

<div class="cotn_principal">
  <div class="cont_centrar">
    <div class="cont_login">
      <div class="cont_info_log_sign_up">
        <div class="col_md_login">
          <div class="cont_ba_opcitiy">
            <h3 style="font-family: Lato, Helvetica, Arial, sans-serif;" style="font-size:large">INICIAR SESIÓN</h3>
            <p style="font-size:large">Inicia sesión para ingregar al sistema del bufete legal.</p>

            <button class="btn_login" onclick="cambiar_login()" style="font-size:large">Iniciar sesión</button>
          </div>
        </div>
        <div class="col_md_sign_up">
          <div class="cont_ba_opcitiy">
            <h3 style="font-family: Lato, Helvetica, Arial, sans-serif;">REGÍSTRATE</h3>
            <p style="font-size:large">¿Aun no tienes acceso a nuestro sistema? Regístrate ahora para darte asesoria legal</p>

            <button class="btn_sign_up" onclick="cambiar_sign_up()" style="font-size:large">Regístrate</button>
          </div>
        </div>
      </div>

      <div class="cont_back_info">
        <div class="cont_img_back_grey">
          <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
        </div>

      </div>
      <div class="cont_forms">
        <div class="cont_img_back_">
          <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
        </div>

        <?php
        include_once 'login.php';
        ?>

        <?php
        include_once 'register.php';
        ?>


      </div>


    </div>
  </div>
</div>
<script type="text/javascript">
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";
  document.querySelector('.cont_form_login').style.display = "block";
  document.querySelector('.cont_form_sign_up').style.opacity = "0";

  setTimeout(function() {
    document.querySelector('.cont_form_login').style.opacity = "1";
  }, 400);

  setTimeout(function() {
    document.querySelector('.cont_form_sign_up').style.display = "none";
  }, 200);
</script>
<script src="login.js"></script>