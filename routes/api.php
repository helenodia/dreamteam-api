<?php

$router->group(["prefix" => "players"], function ($router) {
	// tested and working:
    $router->post("","Players@store");
    $router->get("", "Players@list");
    $router->put("{player}", "Players@update");
    $router->delete("{player}", "Players@destroy");
    $router->delete("", "Players@reset");



    // $router->get("/{player}", "Players@show");
    // $router->get("{team}/players", "Players@index");
    $router->delete("{player}", "Players@destroy");
});

$router->group(["prefix" => "teams"], function ($router) {
    $router->post("","Teams@store");
    $router->get("", "Teams@index");
    $router->get("/{team}", "Teams@show");
    $router->put("{team}", "Teams@update");
    $router->delete("{team}", "Teams@destroy");

    // routes to add a player to a team and to show players that belong to a team 
    // $router->post("{team}/players","Players@store");
    $router->get("{team}/players", "Players@index");
});


