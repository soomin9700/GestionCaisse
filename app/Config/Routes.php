<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('/', 'LoginController::index');
$routes->post('/login', 'LoginController::authenticate');

$routes->get('/caisse', 'CaisseController::caisse');
$routes->post('/Achat', 'AchatController::achat');
