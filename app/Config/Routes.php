<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/choisir-caisse', 'AchatController::choisirCaisse');
$routes->post('/choisir-caisse', 'AchatController::validerCaisse');

$routes->get('/produits', 'ProduitController::listeProduits');