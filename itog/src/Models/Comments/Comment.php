<?php

namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;

class Comment extends ActiveRecordEntity
{
    protected $name;
    protected $text;
    protected $authorId;
    protected $articleId;
    protected $createdAt;

    // public function __construct(){}

    public function getName()
    {
        return $this->name;
    }
    public function getText()
    {
        return $this->text;
    }
    public function getArticleId()
    {
        return $this->articleId;
    }
    public function getAuthorId()
    {
        return User::getById($this->authorId);
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setText(string $text)
    {
        $this->text = $text;
    }
    public function setAuthorId(int $authorId)
    {
        $this->authorId = $authorId;
    }
    public function setArticleId(int $articleId)
    {
        $this->articleId = $articleId;
    }
    protected static function getTableName()
    {
        return 'comments';
    }
}
