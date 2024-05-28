<?php require(dirname(__DIR__) . '/header.php'); ?>
<div class="card mt-3">
  <div class="card-body">
    <h5 class="card-title"><?= $article->getName(); ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?= $article->getAuthorId()->getNickName(); ?></h6>
    <p class="card-text"><?= $article->getText(); ?></p>
    <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/edit/<?= $article->getId(); ?>" class="btn btn-success">Edit Article</a>
    <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/create/<?= $article->getId(); ?>" class="btn btn-secondary">Add comment</a>
    <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/delete/<?= $article->getId(); ?>" class="btn btn-warning">Delete Article</a>
  </div>
</div>
<?php


if (isset($comments) && sizeof($comments) > 0) {

?> <h6 class=" mt-3">Комментарии</h6>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Автор</th>
      <th scope="col">Заголовок</th>
      <th scope="col">Текст</th>
      <th scope="col"></th><th scope="col"></th>
    </tr>
  </thead>
    <?php
    foreach ($comments as $comment) :
    ?>
      <tr>
        <td><?= $article->getAuthorId()->getNickname(); ?>
        </td>
        <td><?= $comment->getName(); ?>
        </td>
        <td><?= $comment->getText(); ?>
        </td>
        <td>
          <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/edit/<?= $comment->getId(); ?>" class="btn btn-success">Редактировать</a>
        </td>
        <td>
          <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/delete/<?= $comment->getId(); ?>" class="btn btn-warning">Удалить</a>
        </td>
      </tr>
    <?php
    endforeach;
    ?>
  </table><?php
        }
          ?>
<?php
require(dirname(__DIR__) . '/footer.php');
?>