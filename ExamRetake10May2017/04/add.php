<?php
require_once 'app.php';

$data = $matchService->getIndexViewData();

if (isset($_SESSION['form'])) {
    $data->setFormData($_SESSION['form']);
    unset($_SESSION['form']);
}

if (isset($_POST['add'])) {
    try {
        $matchService->addMatch(
            $_POST['home_team'],
            $_POST['away_team'],
            $_POST['match_type'],
            $_POST['home_goals'],
            $_POST['away_goals'],
            $_POST['played_on'],
            $_POST['stadium'],
            $_POST['tickets_sold'],
            $_POST['tickets_price']
        );
    } catch (Exception $e) {
        $data->setError($e->getMessage());
    }
    $_SESSION['form'] = $_POST;
    header("Location: index.php");
    exit;
}

$app->loadTemplate("add_frontend", $data);