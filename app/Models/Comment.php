<?php

namespace App\Models;


class Comment
{
    public static function all()
    {
        $db = self::connect();

        $query = "SELECT * FROM comments";

        return $db->query($query)->fetchAll();
    }

    public static function create($attributes)
    {
        $db = self::connect();

        $query = "INSERT INTO `comments` (`name`, `email`, `title`, `text`, `created_at`) VALUES (:name, :email, :title, :text, :created_at)";
        $params = [
            ':name' => $attributes['name'],
            ':email' => $attributes['email'],
            ':title' => $attributes['title'],
            ':text' => $attributes['text'],
            ':created_at' => date('Y-m-d H:i:s'),
        ];
        $stmt = $db->prepare($query);

        try {
            $stmt->execute($params);
            $id = $db->lastInsertId();
        } catch(\PDOException $e) {
            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }

        $query = "SELECT * FROM comments WHERE `id` = $id";

        $result = $db->query($query)->fetchAll();

        if(!isset($result[0])) {
            \header('HTTP/1.1 400 Bad Request');
            die('validation error');
        }

        return $result[0];
    }

    protected static function connect()
    {
        $config = require(__DIR__ . "/../db.php");

        try {
            $db = new \PDO("mysql:host=$config[host];dbname=$config[database]", $config['username'], $config['password']);
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }

        return $db;
    }
}