<?php

class Question
{
    private static $lastId;

    private $id;
    private $username;
    private $password;
    private $author;

    public function _constructor(string $username, string $body, string $title, User $author){
        $this->setTitle($title);
    }

    public function setTitle(string $title){

    }

    public function
}