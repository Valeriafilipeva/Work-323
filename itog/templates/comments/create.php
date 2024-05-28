<?php require(dirname(__DIR__) . '/header.php'); ?>
<div class="card mt-3" style="width: 28rem;">
	<div class="card-body">
		<h5 class="card-title">Комментарий для<?= $article->getName(); ?></h5>

		<p class="card-text"><?= $article->getText(); ?></p>
		<form action="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/store/<?= $article->getId(); ?>" method="POST">

			<div class="form-group">
				<label for="title">Заголовок</label>
				<input type="text" class="form-control" id="title" name="title">
			</div>
			<div class="form-group">
				<label for="text">Текст</label>
				<textarea name="text" id="text" class="form-control"></textarea>
			</div>
			<input type="hidden" name="authorId" value="1">
			<button type="submit" class="btn btn-primary">Добавить</button>
		</form>
	</div>
</div>



<?php require(dirname(__DIR__) . '/footer.php'); ?>