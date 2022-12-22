<!DOCTYPE html>
<html lang="en">
<head>
	<title>Профиль</title>
	<?php include "views/head.php"; ?>
</head>
<body>

<?php 
    include "views/header.php"; 
	$id = $_SESSION["id"];
?>

<section class="container page">
	<div class="page-content">
		<div class="page-header">
			<h2>Мои блоги</h2>
			
			<a class="button" href="<?= $BASE_URL?>/newblog.php">Новый блог</a>

		</div>

		<div class="blogs">

                <?php
				    $blogs = mysqli_query($con, "SELECT b.*, u.nickname, c.name FROM blogs b INNER JOIN users u ON b.user_id = u.id INNER JOIN categories c ON b.category_id = c.id WHERE user_id = '$id'");
					if(mysqli_num_rows($blogs) > 0){
						while($blog = mysqli_fetch_assoc($blogs)){
				?>			
			<div class="blog-item">
				<img class="blog-item--img" src="<?= $blog["image"]?>" alt="">
				<div class="blog-header">
					<h3><?= $blog["title"]?></h3>
					<span class="link">
						<img src="images/dots.svg" alt="">
						Еще

						<ul class="dropdown">
							<li> <a href="<?=$BASE_URL?>/editblog.php?id=<?=$blog["id"]?>">Редактировать</a> </li>
							<li><a href="" class="danger">Удалить</a></li>
						</ul>
					</span>

				</div>
				<p class="blog-desc">
				    <?= $blog["description"]?>
				</p>
				<p class="blog-desc">
				    <?= $blog["name"]?>
				</p>

				<div class="blog-info">
					<span class="link">
						<img src="images/date.svg" alt="">
						22.12.21
					</span>
					<span class="link">
						<img src="images/visibility.svg" alt="">
						21
					</span>
					<a class="link">
						<img src="images/message.svg" alt="">
						4
					</a>
					<span class="link">
						<img src="images/forums.svg" alt="">
						3
					</span>
					<a class="link">
						<img src="images/person.svg" alt="">
						<?= $blog["nickname"]?>
					</a>
				</div>
			</div>
			
            <?php
				}
			        } else { ?>
			<h1>0 blogs</h1> 

			<?php } ?>


		</div>
	</div>

	<div class="page-info">
		<div class="user-profile">

		    <?php 
	            $user_info = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
		        if(mysqli_num_rows($user_info) > 0){
			        $user = mysqli_fetch_assoc($user_info);
            ?>

			<img class="user-profile--ava" src="images/avatar.png" alt="">

			<h1><?= $user["full_name"]?></h1>
			<h2>В основном пишу про веб - разработку, на React & Redux</h2>
			<p>285 постов за все время</p>
			<a href="" class="button">Редактировать</a>
			<a href="<?= $BASE_URL?>/api/users/signout.php" class="button button-danger"> Выход</a>

			<?php } ?>

		</div>
	</div>
</section>	
</body>
</html>