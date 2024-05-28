<?php

namespace src\Controllers;//Пространства имен используются для группировки связанных классов и функций,
// что помогает избежать конфликтов имен и улучшает структуризацию кода

use ReflectionObject;
use src\View\View;
use src\Models\Comments\Comment;
use src\Models\Articles\Article;

class CommentController
{
    public $view;
    public $db;
    public function __construct()
    {
        $this->view = new View('../templates/');
    }
    
    public function create(int $id)
    {
        $article = Article::getById($id);
        $this->view->renderHtml('comments/create.php', ['article' => $article]);
    }
    public function store(int $articleid)
    {
        $comment = new Comment;
        $comment->setName($_POST['title']);
        $comment->setText($_POST['text']);
        $comment->setAuthorId($_POST['authorId']);
        $comment->setArticleId($articleid);
        $comment->save();
        header('Location:/231-323/itog/www/article/' . $articleid);
    }
    public function edit(int $id)
    {
        $comment = Comment::getById($id);
        $this->view->renderHtml('comments/update.php', ['comment' => $comment]);
    }
    public function update(int $id)
    {
        $comment = Comment::getById($id);
        $comment->setName($_POST['title']);
        $comment->setText($_POST['text']);
        $comment->setAuthorId($_POST['authorId']);
        $comment->save();
        header('Location:/231-323/itog/www/article/' . $comment->getArticleId());
    }
    public function delete(int $id)
    {
        $comment = Comment::getById($id);
        $comment->delete();
        header('Location:/231-323/itog/www/article/' . $comment->getArticleId());
    }
}
