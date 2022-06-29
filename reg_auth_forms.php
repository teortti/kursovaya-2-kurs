<?php

session_start();

?>


<div class="popup" id="reg_form">
	<div class="popup_body">
		<div class="popup_content">
			<a href="#" class="popup_close">X</a>
			<h4>АВТОРИЗАЦИЯ</h4>
			<form method="POST" action="controllers/auth.php">
				<input type="text" name="login_auth" placeholder="Логин (эл.почта или телефон)" class="reg_form_input">
				<input type="password" name="password_auth" placeholder="Пароль" class="reg_form_input">
				<input type="submit" name="auth" value="ВОЙТИ" class="reg_form_input auth">
			</form>

			
<?php echo $_SESSION['auth_error'];  ?>
			<div class="or_reg">Или <a href="#registration">зарегистрируйтесь</a></div>
		</div>
	</div>
</div>

<div class="popup" id="registration">
	<div class="popup_body">
		<div class="popup_content reg">
			<a href="#" class="popup_close">X</a>
			<h4>РЕГИСТРАЦИЯ</h4>
			<form method="POST" action="controllers/reg.php">
				<input type="text" name="name" placeholder="Имя" class="reg_form_input">
				<input type="text" name="surname" placeholder="Фамилия" class="reg_form_input">
				<input type="text" name="login" placeholder="Логин (эл.почта или телефон)" class="reg_form_input">
				<input type="password" name="password" placeholder="Пароль" class="reg_form_input">
				<input type="password" name="r_password" placeholder="Подтверждение пароля" class="reg_form_input">
				<input type="submit" name="reg" value="ЗАРЕГЕСТРИРОВАТЬСЯ" class="reg_form_input auth">
			</form>
			<?php echo $_SESSION['reg_error'];  ?>
			<div class="or_reg">Уже есть аккаунт?<a href="#reg_form">Войдите</a></div>

		</div>
	</div>


</div>

