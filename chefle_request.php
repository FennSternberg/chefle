<?php
$ingredient = $_GET['ingredient'];
$data = (array)json_decode(file_get_contents('ingredients.json'));

$rank = array_search($ingredient, (array)$data['ingredient']);
$score = $data['score']->$rank;
$return = [$rank, $score];
echo json_encode($return);
