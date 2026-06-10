<?php

header("Content-Type: application/json; charset=utf-8");

$file = "data/rest_vijesti.json";
$method = $_SERVER["REQUEST_METHOD"];

if (!file_exists($file)) {
    file_put_contents($file, "[]");
}

$data = file_get_contents($file);
$vijesti = json_decode($data, true);

if (!is_array($vijesti)) {
    $vijesti = array();
}

function spremiVijesti($file, $vijesti) {
    file_put_contents(
        $file,
        json_encode($vijesti, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );
}

function pronadiIndexPoId($vijesti, $id) {
    foreach ($vijesti as $index => $vijest) {
        if ($vijest["id"] == $id) {
            return $index;
        }
    }
    return -1;
}

/* GET - dohvat svih vijesti ili jedne vijesti */
if ($method == "GET") {

    if (isset($_GET["id"])) {
        $id = (int)$_GET["id"];
        $index = pronadiIndexPoId($vijesti, $id);

        if ($index >= 0) {
            echo json_encode($vijesti[$index], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(404);
            echo json_encode(array("poruka" => "Vijest nije pronađena."), JSON_UNESCAPED_UNICODE);
        }

    } else {
        echo json_encode($vijesti, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    exit();
}

/* POST - dodavanje nove vijesti */
if ($method == "POST") {

    $input = json_decode(file_get_contents("php://input"), true);

    if (!$input) {
        http_response_code(400);
        echo json_encode(array("poruka" => "Neispravan JSON."), JSON_UNESCAPED_UNICODE);
        exit();
    }

    $maxId = 0;

    foreach ($vijesti as $vijest) {
        if ($vijest["id"] > $maxId) {
            $maxId = $vijest["id"];
        }
    }

    $novaVijest = array(
        "id" => $maxId + 1,
        "naslov" => $input["naslov"],
        "kategorija" => $input["kategorija"],
        "sazetak" => $input["sazetak"]
    );

    $vijesti[] = $novaVijest;
    spremiVijesti($file, $vijesti);

    http_response_code(201);
    echo json_encode($novaVijest, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit();
}

/* PUT - izmjena postojeće vijesti */
if ($method == "PUT") {

    if (!isset($_GET["id"])) {
        http_response_code(400);
        echo json_encode(array("poruka" => "Nedostaje ID."), JSON_UNESCAPED_UNICODE);
        exit();
    }

    $id = (int)$_GET["id"];
    $index = pronadiIndexPoId($vijesti, $id);

    if ($index < 0) {
        http_response_code(404);
        echo json_encode(array("poruka" => "Vijest nije pronađena."), JSON_UNESCAPED_UNICODE);
        exit();
    }

    $input = json_decode(file_get_contents("php://input"), true);

    if (!$input) {
        http_response_code(400);
        echo json_encode(array("poruka" => "Neispravan JSON."), JSON_UNESCAPED_UNICODE);
        exit();
    }

    $vijesti[$index]["naslov"] = $input["naslov"];
    $vijesti[$index]["kategorija"] = $input["kategorija"];
    $vijesti[$index]["sazetak"] = $input["sazetak"];

    spremiVijesti($file, $vijesti);

    echo json_encode($vijesti[$index], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit();
}

/* DELETE - brisanje vijesti */
if ($method == "DELETE") {

    if (!isset($_GET["id"])) {
        http_response_code(400);
        echo json_encode(array("poruka" => "Nedostaje ID."), JSON_UNESCAPED_UNICODE);
        exit();
    }

    $id = (int)$_GET["id"];
    $index = pronadiIndexPoId($vijesti, $id);

    if ($index < 0) {
        http_response_code(404);
        echo json_encode(array("poruka" => "Vijest nije pronađena."), JSON_UNESCAPED_UNICODE);
        exit();
    }

    array_splice($vijesti, $index, 1);
    spremiVijesti($file, $vijesti);

    echo json_encode(array("poruka" => "Vijest je obrisana."), JSON_UNESCAPED_UNICODE);
    exit();
}

/* Ako metoda nije podržana */
http_response_code(405);
echo json_encode(array("poruka" => "Metoda nije podržana."), JSON_UNESCAPED_UNICODE);
?>