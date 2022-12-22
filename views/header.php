<?php
    include "config/baseurl.php";
    include "config/db.php";
	session_start();
?>    


<header class="header container">
	<div class="header-logo">
	    <a href="<?= $BASE_URL?>/">Decode Blog</a>	
	</div>
	<div class="header-search">
		<input type="text" class="input-search" placeholder="Поиск по блогам">
		<button class="button button-search">
			<img src="images/search.svg" alt="">	
			Найти
		</button>
	</div>
	<div>
		<?php
		    if(isset($_SESSION["nickname"])){
		?>
		
		<a href="<?=$BASE_URL?>/profile.php?nickname=<?=$_SESSION["nickname"]?>">
			<img class="avatar" src="images/avatar.png" alt="Avatar">
		</a>

		<?php }else{ ?>
        
		<div class="button-group">
			<a href="<?= $BASE_URL?>/register.php" class="button">Регистрация</a>
			<a href="<?= $BASE_URL?>/login.php" class="button">Вход</a>
		</div>	

		<?php } ?>

	</div>
</header>