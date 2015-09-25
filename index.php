<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 9/25/15
 * Time: 10:37 AM
 */

require 'vendor/autoload.php';

$app = new \Slim\Slim();
$app->contentType("application/json");


$app->get('/pages/', function() {
    require_once 'data/config.php';
    global $config;
    $output = array();
    foreach ($config["pages"] as $key => $value) {
        $page = array();
        $page["id"] = $key;
        $page["title"] = $value["title"];
        $output[] = $page;
    }
    echo json_encode($output);
});


$app->get('/title/:lang/:page_id', function($lang, $page_id) {
    require_once 'data/config.php';
    global $config;
    $output = $config["pages"][$page_id]["title"][$lang];
    echo json_encode($output);
});


$app->get('/content/:lang/:page_id', function($lang, $page_id) {
    require_once 'data/config.php';
    global $config;
    $path = $config["pages"][$page_id]["content"][$lang];
    $Parsedown = new Parsedown();
    $output = array();
    $output["content"] = $Parsedown->text(file_get_contents($path));
    $output["format"] = array();
    $output["format"]["source"] = "md";
    $output["format"]["output"] = "html";
    echo json_encode($output);
});

$app->run();