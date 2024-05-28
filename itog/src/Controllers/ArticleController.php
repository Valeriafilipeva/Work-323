<?php

namespace src\Controllers;

use ReflectionObject;
use src\View\View;
use src\Models\Articles\Article;
use src\Models\Comments\Comment;

class ArticleController
{
    public $view;
    public $db;
    public function __construct()
    {
        $this->view = new View('../templates/');
    }

    public function index()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('articles/index.php', ['articles' => $articles]);
    }

    public function show(int $id)
    {
        $article = Article::getById($id);
        if ($article == []) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $comments = Comment::getByArtId($id);

        $this->view->renderHtml('articles/show.php', ['article' => $article, 'comments' => $comments]);
    }
    public function create()
    {
        $this->view->renderHtml('articles/create.php');
    }
    public function store()
    {
        $article = new Article;
        $article->setName($_POST['title']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();
        header('Location:/231-323/itog/www/articles');
    }
    public function edit(int $id)
    {
        $article = Article::getById($id);
        $this->view->renderHtml('articles/update.php', ['article' => $article]);
    }
    public function update(int $id)
    {
        $article = Article::getById($id);
        $article->setName($_POST['title']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();
        header('Location:/231-323/itog/www/article/' . $article->getId());
    }
    public function delete(int $id)
    {
        //привязка : удаление статьи => и комментариев
        $article = Article::getById($id);
        $article->delete();
        $comments = Comment::getByArtId($id);
        foreach ($comments as $comment) {
            $comment->delete();
        }
        header('Location:/231-323/itog/www/articles');
    }
}