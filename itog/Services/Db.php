<?php

namespace Services;//Определяет пространство имен Services, где находится класс Db
//область, в которой хранятся имена

class Db{
    private $pdo;
    private static $instance;

    private function __construct(){//вызывается при создании нового экземпляра класса
        // ПРИВАТНый конструктор, поэтому
        //класс имеет только один экземпляр
        $dbOptions = require('settings.php');
        $this->pdo = new \PDO(//код не меняется при изменении бд
            'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['database'],
            $dbOptions['username'],
            $dbOptions['password']
        );
    }

    public static function getInstance(){//гарантирует,что у нас есть только один экземпляр, один раз класс заводится
        if (self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function query(string $sql, $params=[], string $className = 'StdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
        if ($result === false){
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}