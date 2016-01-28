<?php include_once(ROOT. '/views/layouts/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<h1>Кабинет пользователя</h1>
			<h4>Привет, <?php echo $user['name']; ?>!</h4>
			<ul>
				<li><a href="/cabinet/edit">Редактировать данные</a></li>
				<li><a href="/user/history/">Список покупок</a></li>
			</ul>
		</div>
	</div>
	
</section>

<?php include_once(ROOT. '/views/layouts/footer.php'); ?>
