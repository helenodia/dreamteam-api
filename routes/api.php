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
});

$router->group(["prefix" => "teams"], function ($router) {
	$router->get("", "Teams@teams");

	// not using yet:
    // $router->post("","Teams@store");
    // // $router->get("", "Teams@index");
    // $router->get("/{team}", "Teams@show");
    // $router->put("{team}", "Teams@update");
    // $router->delete("{team}", "Teams@destroy");
});


