<?php

class Lesson {
    public $title;
    public $text;
    public $homework;

    public function __construct($title, $text, $homework) {
        $this->title = $title;
        $this->text = $text;
        $this->homework = $homework;
    }
}

class PaidLesson extends Lesson {
    private $price;

    public function __construct($title, $text, $homework, $price) {
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}

$paidLesson = new PaidLesson(
    "Урок о наследовании в PHP",
    "Лол, кек, чебурек",
    "Ложитесь спать, утро вечера мудренее",
    99.90
);

var_dump($paidLesson);

?>
