<?php include ROOT. '/views/layouts/header.php'; ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 padding-right">
		
			<?php if (isset($errors) && is_array($errors)):?>
				<h5>Ошибка входа</h5>
				<ul>
					<?php foreach($errors as $error):?>
						<li>--<?php echo $error; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>


			
			<div class="signup-form">
				<h2>Вход на сайт</h2>
				<form action="#" method="post">
					<input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
					<input type="password" name="password" placeholder="Пароль" value="">
					<input type="submit" name="submit" class="btn btn-default" value="Регистрация">
				</form>
	
				</div>
				<br>
				<br>
			</div>
		</div>
	</div>
</section>

<?include ROOT. '/views/layouts/footer.php'; ?>