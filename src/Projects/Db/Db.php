<?php

namespace Projects\Db;

class Db
{

    private $example;

    private static $singleton;

    private function __construct()
    {

        $connect = (require __DIR__ . '/../bd_mysql.php')['phpmyadmin'];
        try {

            $this->example = new \PDO(
                'mysql:host=' . $connect['host'] . ';dbname=' . $connect['dbname'],
                $connect['user'],
                $connect['password'],

            );

            $this->example->exec('SET NAMES UTF8');
        } catch (\PDOException $e) {

            echo "Проблеми зі з'єднанням до БД:" . $e->getMessage();
        }
    }

    public static function singleton_connection()
    {

        if (self::$singleton === null) {
            self::$singleton = new self();
        }

        return self::$singleton;
    }

    public function query(string $mysql, array $evidence = []): ?array
    {
        $method = $this->example->prepare($mysql);
        $effect = $method->execute($evidence);

        if (false === $effect) {
            return null;
        }

        return $method->fetchAll();
    }
}
