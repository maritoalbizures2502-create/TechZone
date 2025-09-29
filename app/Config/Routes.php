<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Ruta por defecto de CodeIgniter

// =========================================================================
// RUTAS PARA EL MÓDULO CLIENTES
// =========================================================================

// GET: Muestra la lista de clientes
$routes->get('/clientes', 'ControladorClientes::verClientes');

// POST: Guarda un nuevo cliente
$routes->post('/clientes/guardar', 'ControladorClientes::guardarCliente');

// GET: Muestra el formulario para editar un cliente (localiza por ID)
$routes->get('/clientes/editar/(:num)', 'ControladorClientes::localizarCliente/$1');

// POST: Actualiza un cliente existente
$routes->post('/clientes/actualizar', 'ControladorClientes::modificarCliente');

// GET: Elimina un cliente
$routes->get('/clientes/eliminar/(:num)', 'ControladorClientes::eliminarCliente/$1');


// =========================================================================
// RUTAS PARA EL MÓDULO EMPLEADOS
// =========================================================================

$routes->get('/empleados', 'ControladorEmpleados::verEmpleados');
$routes->post('/empleados/guardar', 'ControladorEmpleados::guardarEmpleado');
$routes->get('/empleados/editar/(:num)', 'ControladorEmpleados::localizarEmpleado/$1');
$routes->post('/empleados/actualizar', 'ControladorEmpleados::modificarEmpleado');
$routes->get('/empleados/eliminar/(:num)', 'ControladorEmpleados::eliminarEmpleado/$1');


// =========================================================================
// RUTAS PARA EL MÓDULO ESPECIALIDADES
// =========================================================================

$routes->get('/especialidades', 'ControladorEspecialidades::verEspecialidades');
$routes->post('/especialidades/guardar', 'ControladorEspecialidades::guardarEspecialidad');
$routes->get('/especialidades/editar/(:num)', 'ControladorEspecialidades::localizarEspecialidad/$1');
$routes->post('/especialidades/actualizar', 'ControladorEspecialidades::modificarEspecialidad');
$routes->get('/especialidades/eliminar/(:num)', 'ControladorEspecialidades::eliminarEspecialidad/$1');


// =========================================================================
// RUTAS PARA EL MÓDULO GARANTIAS
// =========================================================================

$routes->get('/garantias', 'ControladorGarantias::verGarantias');
$routes->post('/garantias/guardar', 'ControladorGarantias::guardarGarantia');
$routes->get('/garantias/editar/(:num)', 'ControladorGarantias::localizarGarantia/$1');
$routes->post('/garantias/actualizar', 'ControladorGarantias::modificarGarantia');
$routes->get('/garantias/eliminar/(:num)', 'ControladorGarantias::eliminarGarantia/$1');


// =========================================================================
// RUTAS PARA EL MÓDULO PAGOS
// =========================================================================

$routes->get('/pagos', 'ControladorPagos::verPagos');
$routes->post('/pagos/guardar', 'ControladorPagos::guardarPago');
$routes->get('/pagos/editar/(:num)', 'ControladorPagos::localizarPago/$1');
$routes->post('/pagos/actualizar', 'ControladorPagos::modificarPago');
$routes->get('/pagos/eliminar/(:num)', 'ControladorPagos::eliminarPago/$1');


// =========================================================================
// RUTAS PARA EL MÓDULO PRODUCTOS
// =========================================================================

$routes->get('/productos', 'ControladorProductos::verProductos');
$routes->post('/productos/guardar', 'ControladorProductos::guardarProducto');
$routes->get('/productos/editar/(:num)', 'ControladorProductos::localizarProducto/$1');
$routes->post('/productos/actualizar', 'ControladorProductos::modificarProducto');
$routes->get('/productos/eliminar/(:num)', 'ControladorProductos::eliminarProducto/$1');


// =========================================================================
// RUTAS PARA EL MÓDULO VENTAS
// =========================================================================

$routes->get('/ventas', 'ControladorVentas::verVentas');
$routes->post('/ventas/guardar', 'ControladorVentas::guardarVenta');
$routes->get('/ventas/editar/(:num)', 'ControladorVentas::localizarVenta/$1');
$routes->post('/ventas/actualizar', 'ControladorVentas::modificarVenta');
$routes->get('/ventas/eliminar/(:num)', 'ControladorVentas::eliminarVenta/$1');
