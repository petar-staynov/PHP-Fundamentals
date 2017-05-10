<?php
require_once 'app.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    $book = $bookService->findBook($id);
}
if(isset($_POST['edit'])){
    if ($_FILES['image']['error'] == 0) {
        $uploadService = new \Services\UploadService();
        $imageUrl = $uploadService->upload($_FILES['image'], "images");
    }

    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $language = $_POST['language'];
    $isbn = $_POST['isbn'];
    $release_date = $_POST['release_date'];
    $genre = $_POST['genre_id'];
    $comment = $_POST['comment'];

    $bookService->editBook($id, $title, $genre, $author, $release_date, $comment, $language);
    header("Refresh:0");
}
$data = $bookService->getIndexViewData();

$app->loadTemplate("edit_frontend", $data, $book);