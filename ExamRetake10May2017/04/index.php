<?php
require_once 'app.php';

$data = $matchService->findAll();

$app->loadTemplate("index_frontend", $data);