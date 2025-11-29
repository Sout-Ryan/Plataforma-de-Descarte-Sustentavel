<?php
header("Content-Type: application/json");

$busca = urlencode($_GET["q"]);

$url = "https://nominatim.openstreetmap.org/search?format=json&limit=1&q=$busca";

$opts = [
  "http" => [
    "header" => "User-Agent: MeuAppMapa/1.0 (seuemail@exemplo.com)"
  ]
];

$context = stream_context_create($opts);
$resultado = file_get_contents($url, false, $context);

echo $resultado;
