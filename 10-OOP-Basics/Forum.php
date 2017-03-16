<?php
class User
{
    private static $lastId;
    private $id;
    private $username;
    private $password;
    private $questions = [];
    private $answers = [];
    private $comments = [];
    public function __construct(string $username, string $password)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->id = ++self::$lastId;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setPassword($password)
    {
        if (!preg_match("/[0-9]+/", $password)){
        throw new Exception("Password must contain numbers");
        }
        if (!preg_match("/[a-z]+/", $password)){
            throw new Exception("Password must contain letters");
        }
        $this->password = $password;
    }
    public function getQuestions(): array
    {
        return $this->questions;
    }
    public function setQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }
    public function setAnswer(Question $question, Answer $answer)
    {
        $this->answers[] = $answer;
        $question->setAnswer($answer);
    }
    public function getComments(): array
    {
        return $this->comments;
    }
    public function comment(Answer $comment, Answer $answer)
    {
        $this->comments[] = $comment;
        $answer->comment($comment);
    }

}

class Question
{
    const TITLE_MIN_LENGHT = 3;
    const BODY_MING_LENGHT = 10;
    private static $lastId;
    private $id;
    private $title;
    private $body;
    private $author;
    private $answers = [];
    public function __construct(string $title, string $body, User $author)
    {
        $this->setTitle($title);
        $this->setBody($body);
        $this->setAuthor($author);
        $this->id = ++self::$lastId;
    }
    public function setAuthor(User $author){
        $this->author = $author;
    }
    public function setTitle(string $title){
        if (strlen($title) < self::TITLE_MIN_LENGHT){
            throw new Exception("Title too short");
        }
        $this->title = $title;
    }
    public function setBody(string $body){
        if (strlen($body) < self::BODY_MING_LENGHT){
            throw new Exception("Title too short");
        }
        $this->body = $body;
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function getBody(): string {
        return $this->body;
    }
    public function getAuthor(): User {
        return $this->author;
    }
    public function getId() {
        return $this->id;
    }
    public function getAnswer(){
        return $this->answers;
    }
    public function answerQuestion(Answer $answer){
        $this->answers[] = $answer;
    }
}

class Answer
{
    const BODY_MIN_LENGTH = 7;
    private static $lastId;
    private $id;
    private $body;
    private $author;
    private $question;
    private $answer;
    private $comments = [];
    public function __construct(string $body, string $author, Question $question, Answer $answer = null)
    {
        $this->setBody($body);
        $this->setAuthor($author);
        $this->setQuestion($question);
        $this->setAnswer($answer);
        $this->id = ++self::$lastId;
    }
    public function setBody(string $body){
        if (strlen($body) < self::BODY_MIN_LENGTH){
            throw new Exception("Title too short");
        }
        $this->body = $body;
    }
    public function getAuthor() {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }
    public function getAnswer()
    {
        return $this->answer;
    }
    public function setQuestion(Question $question){
        $this->question = $question;
    }
    public function comment(Answer $answer = null){
        $this->comments[] = $answer;
    }
}