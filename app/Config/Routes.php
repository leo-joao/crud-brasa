<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::index');
$routes->get('registration', 'Home::registration');
$routes->get('logout', 'Mensagens::logout');
$routes->get('mensagens', 'Mensagens::listar');
$routes->get('delete/(:num)', 'Mensagens::deletar/$1');
$routes->get('newmsg', 'Mensagens::novamensagem');

$routes->post('auth', 'Home::authentication');
$routes->post('register', 'Home::register');
$routes->post('responder', 'Mensagens::responder');
$routes->post('sendMessage', 'Mensagens::gravaMensagem');
