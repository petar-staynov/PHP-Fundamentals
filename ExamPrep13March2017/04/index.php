<?php
require_once 'app.php';

$data = $bookService->getIndexViewData();

if (isset($_POST['add'])) {
    $imageUrl = null;
    if ($_FILES['image']['error'] == 0) {
        $uploadService = new \Services\UploadService();
        $imageUrl = $uploadService->upload($_FILES['image'], "images");
    }
    try {
        $bookService->addBook(
            $_POST['isbn'],
            $_POST['author'],
            $_POST['title'],
            $_POST['genre_id'],
            $_POST['language'],
            $_POST['comment'],
            $_POST['release_date'],
            $imageUrl
        );
    } catch (Exception $exception) {
        $data->setErrors($exception->getMessage());
    }
}
$data->setFormData($_POST);

$app->loadTemplate("index_frontend", $data);

