<!-- начало футера !-->

		<footer>

			<div class="logo_wrapper">

				<a href="index.php"><span class="logo">НОЖНИЦЫ</span></a><br>
				<span class="logo_desc">Интернет-магазин канцтоваров</span>


			</div>

<div class="footer_filling">
			<ul>
				<li><a href="menu/about_us/index.php">О НАС</a></li>
				<li><a href="menu/stocks/index.php">АКЦИИ</a></li>
				<li><a href="menu/delivery/index.php">ДОСТАВКА И ОПЛАТА</a></li>
				<li><a href="menu/contacts/index.php">КОНТАКТЫ</a></li>
				<li><a href="menu/bonus/index.php">БОНУСНАЯ ПРОГРАММА</a></li>
				<?php 

			if ($_SESSION['user']) {
				echo "<li><a href=personal_account/index.php>АККАУНТ</a></li>";
			}
			else
			{
				echo "<li><a href=#reg_form>АККАУНТ</a></li>";
			}

			?>
			</ul>
<div class="subscribe_wrapper">
			<div class="subscribe_title">ПОДПИШИТЕСЬ, ЧТОБЫ БЫТЬ В КУРСЕ АКЦИЙ И НОВОСТЕЙ</div>

			<div class="subscribe_form">
			<input type="email" name="subscribe" class="your_mail" placeholder="Ваша почта">
			<button class="sbscrb_btn">ПОДПИСАТЬСЯ</button>
			</div>

</div>

</div>	

<div class="social_media">
	©2022 Магазин канцтоваров "Ножницы". Все права защищены
	<ul>
		<a href="#"><li class="vk"></li></a>
		<a href="#"><li class="fb"></li></a>
		<a href="#"><li class="twitter"></li></a>
		<a href="#"><li class="inst"></li></a>
	</ul>
</div>		
		</footer>

<!-- конец футера !-->


</body>
</html>

