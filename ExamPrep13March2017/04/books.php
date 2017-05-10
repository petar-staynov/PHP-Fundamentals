<?php
require_once 'app.php';

$data = $bookService->findAllBooks();

$app->loadTemplate("books_frontend", $data);