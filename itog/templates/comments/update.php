<?php require(dirname(__DIR__).'/header.php');?>
<h5>Редактирование комментария</h5>
<form action="<?=dirname($_SERVER['SCRIPT_NAME']);?>/comment/update/<?=$comment->getId();?>" method="POST">
  <div class="form-group">
    <label for="title">Заголовок </label>
    <input type="text" class="form-control" id="title" name="title" value="<?=$comment->getName();?>">
  </div>
  <div class="form-group">
    <label for="text">Текст </label>
    <textarea name="text" id="text" class="form-control"><?=$comment->getText();?></textarea>
  </div>
  <input type="hidden" name="authorId" value="<?=$comment->getAuthorId()->getId();?>">
  <button type="submit" class="btn btn-primary">Обновить</button>
</form>
<?php require(dirname(__DIR__).'/footer.php');?>