#!/usr/bin/env php
<?php
$home = $_ENV['HOME'];

// setting paths and including what we need

set_include_path(get_include_path().PATH_SEPARATOR.$home.'/git/clsStraico');

require_once 'clsStraico.php';
require_once 'clsStraicoCli.php';

require_once $home.'/git/clsStraico/vendor/autoload.php';

use Symfony\Component\HttpClient\HttpClient;

$client = HttpClient::create();
$response = $client->request(
    'GET',
    'https://blog.roelfrenkema.com'
);

var_dump($response);
?>
