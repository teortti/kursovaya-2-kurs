<?php 

session_start();


include_once 'connect_db.php';



?>

<main>
			
			<!-- баннер !-->
				<div class="carousel-wrapper">
  <span id="item-1"></span>
  <span id="item-2"></span>

  <div class="carousel-item item-1"> 
  </div>

 <div class="arrows">
  <a class="arrow arrow-prev" href="#item-2"></a>
    <a class="arrow arrow-next" href="#item-1"></a>
</div>

  <div class="carousel-item item-2">
    
  </div>

<div class="arrows">
<a class="arrow arrow-prev" href="#item-2"></a>
    <a class="arrow arrow-next" href="#item-1"></a>
</div>
  
</div>

<!-- новинки и хиты продаж !-->

<!-- ХИТ ПРОДАЖ !-->

				<div class="hits_and_new_goods_wrap">

					<div class="hits_and_newgoods_title">
					<span>ХИТ ПРОДАЖ</span>
					</div>

<span id="item-3"></span>
  <span id="item-4"></span>
  <span id="item-5"></span>

					<div class="hits_and_new_goods item-3">
<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE id IN(100,40,60,70)";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>

						
<a class="arrow arrow-prev-goods" href="#item-5"></a>
    <a class="arrow arrow-next-goods" href="#item-4"></a>

					</div>

					<!-- ХИТ ПРОДАЖ (ДЛЯ МОБ. ВЕРСИЙ) !-->
<div class="hits_and_new_goods_for_mobile_ver item-3 ">
<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE id IN(100,40)";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
	<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>

						
<a class="arrow arrow-prev-goods" href="#item-5"></a>
    <a class="arrow arrow-next-goods" href="#item-4"></a>

					</div>


					<div class="hits_and_new_goods_for_mobile_ver item-4">
						<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE id IN(23,26)";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>
<a class="arrow arrow-prev-goods" href="#item-3"></a>
    <a class="arrow arrow-next-goods" href="#item-5"></a>

					</div>

					<div class="hits_and_new_goods_for_mobile_ver item-5">
						<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE id IN(65,21)";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>
<a class="arrow arrow-prev-goods" href="#item-4"></a>
    <a class="arrow arrow-next-goods" href="#item-3"></a>

					</div>

					
					<!-- КОНЕЦ ХИТ ПРОДАЖ (ДЛЯ МОБ. ВЕРСИЙ) !-->

					<div class="hits_and_new_goods item-4">
						<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE id IN(23,26,65,96)";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>
<a class="arrow arrow-prev-goods" href="#item-3"></a>
    <a class="arrow arrow-next-goods" href="#item-5"></a>

					</div>

					

					<div class="hits_and_new_goods item-5">
						<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE id > 10 LIMIT 4";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>
<a class="arrow arrow-prev-goods" href="#item-4"></a>
    <a class="arrow arrow-next-goods" href="#item-3"></a>

					</div>

				</div>


<!-- НОВИНКИ !-->

				<div class="hits_and_new_goods_wrap">

					<div class="hits_and_newgoods_title">
					<span>НОВИНКИ</span>
					</div>

<span id="item-6"></span>
  <span id="item-7"></span>
  <span id="item-8"></span>

  <!-- НОВИНКИ (МОБ. ВЕРСИЯ) !-->


<div class="hits_and_new_goods_for_mobile_ver item-6">
						<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE add_time > '2022-03-19 19:03:20' LIMIT 2";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>
<a class="arrow arrow-prev-goods" href="#item-8"></a>
    <a class="arrow arrow-next-goods" href="#item-7"></a>

					</div>

					

					<div class="hits_and_new_goods_for_mobile_ver item-7">
						<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE add_time > '2022-03-20 10:13:36' LIMIT 2";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>
<a class="arrow arrow-prev-goods" href="#item-6"></a>
    <a class="arrow arrow-next-goods" href="#item-8"></a>

					</div>

					

					<div class="hits_and_new_goods_for_mobile_ver item-8">
						<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE add_time > '2022-03-20 09:56:50' LIMIT 2";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>
<a class="arrow arrow-prev-goods" href="#item-7"></a>
    <a class="arrow arrow-next-goods" href="#item-6"></a>

					</div>



   <!-- КОНЕЦ НОВИНКИ (МОБ. ВЕРСИЯ) !-->

					<div class="hits_and_new_goods item-6">
						<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE add_time > '2022-03-19 19:03:20' LIMIT 4";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>
<a class="arrow arrow-prev-goods" href="#item-8"></a>
    <a class="arrow arrow-next-goods" href="#item-7"></a>

					</div>

					

					<div class="hits_and_new_goods item-7">
						<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE add_time > '2022-03-20 10:13:36' LIMIT 4";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>
<a class="arrow arrow-prev-goods" href="#item-6"></a>
    <a class="arrow arrow-next-goods" href="#item-8"></a>

					</div>

					

					<div class="hits_and_new_goods item-8">
						<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE add_time > '2022-03-20 09:56:50' LIMIT 4";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_index'>
				<img src='images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image'>
				<div class=product_info>
					<a href='category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

						

						?>
<a class="arrow arrow-prev-goods" href="#item-7"></a>
    <a class="arrow arrow-next-goods" href="#item-6"></a>

					</div>

				</div>

<!-- акции !-->

				<div class="stocks_wrapper">

					<div class="stocks_title">
						АКЦИИ
					</div>

					<div class="stocks_wrapper_in_stocks_wrapper">

						<div class="big_stocks_banner">
							
						</div>
						<div class="stocks_wrapper_in_stocks_wrapper_inside_of_stocks_wrapper_but_for_small">
							<div class="small_stocks_banner"></div>
							<div class="small_stocks_banner"></div>
							<div class="small_stocks_banner"></div>
							<div class="small_stocks_banner"></div>
							<div class="small_stocks_banner"></div>
							<div class="small_stocks_banner"></div>
							<div class="small_stocks_banner"></div>
							<div class="small_stocks_banner"></div>
							<div class="small_stocks_banner"></div>
						</div>


					</div>

				</div>

<!-- о нас !-->

<?php 

$str_out_section_name="SELECT * FROM `section_for_school` WHERE id='1'";
$run_out_section_name=mysqli_query($connect, $str_out_section_name);
$out_name=mysqli_fetch_array($run_out_section_name);

?>


				<div class="partners_wrap" >
					<div class="partners_title">БРЕНДЫ</div>
					<div class="our_partners">
						<?php 

						$str_out_picture="SELECT * FROM `brands` WHERE id between 2 and 10";
						$run_out_picture=mysqli_query($connect, $str_out_picture);

						while ($out_pic=mysqli_fetch_array($run_out_picture)) {
							echo "<img src='images/бренды/$out_pic[picture]' class='brands_images'>";
						}

						?>
						
						
					</div>
					<div class="other_partners">
						<a href="brands/index.php"><div class="border_partners">
					ДРУГИЕ БРЕНДЫ
						</div></a>
				</div>
				</div>

<!-- наши партнёры !-->

				<div class="about_us_wrap">
					<div class="about_us_title">НЕМНОГО О НАС...</div>
					<div class="about_us">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
						<br>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>

		</main>

<!-- конец контента !-->
