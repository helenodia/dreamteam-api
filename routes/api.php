<?php

$router->group(["prefix" => "players"], function ($router) {
    $router->post("","Players@store");
    $router->get("", "Players@index");
    $router->get("/{player}", "Players@show");
    $router->put("{player}", "Players@update");
    $router->delete("{player}", "Players@destroy");
});

$router->group(["prefix" => "teams"], function ($router) {
    $router->post("","Teams@store");
    $router->get("", "Teams@index");
    $router->get("/{team}", "Teams@show");
    $router->put("{team}", "Teams@update");
    $router->delete("{team}", "Teams@destroy");
});


