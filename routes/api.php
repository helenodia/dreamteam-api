<?php

$router->group(["prefix" => "players"], function ($router) {
    $router->post("","Players@store");
    $router->get("{player}", "Players@show");
    $router->put("{player}", "Players@update");
    $router->delete("{player}", "Players@destroy");
});