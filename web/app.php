<?php

include_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

$app
	->register(new Silex\Provider\TwigServiceProvider(), array(
		'twig.path' => __DIR__ . '/../tpl',
	))
	->register(new Silex\Provider\MonologServiceProvider(), array(
		'monolog.logfile' => __DIR__ . '/../logs/dev.log',
	));

$app->get('/', function() use($app) {
	return $app['twig']->render('index.twig', array());
	})->bind('home');

$app->run();