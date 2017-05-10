<?php
require_once 'app.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $bookService->deleteBook($id);

    header('Location: books.php');
}

