<?php

namespace App\Controllers;

use App\Models\Comment;
use http\Header;

class HomeController
{
    protected $view_path = __DIR__ . "/../Views/";

    public function index()
    {

        $comments = Comment::all();

        require($this->view_path . "index.php");
    }

    public function create()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $attributes = [
            'name' => $data['name'],
            'email' => $data['email'],
            'title' => $data['title'],
            'text' => $data['text'],
        ];

        if(!$this->validate($attributes)) {
            \header('HTTP/1.1 400 Bad Request');
            die('validation error');
        }


        $comment = Comment::create($attributes);

        print json_encode($comment);
    }

    protected function validate($attributes)
    {
        if(
            $this->isValidEmail($attributes['email']) &&
            !empty($attributes['name']) &&
            !empty($attributes['title']) &&
            !empty($attributes['text'])
        ) {
            return true;
        }

        return false;
    }

    protected function isValidEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}