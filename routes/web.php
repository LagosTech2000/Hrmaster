<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\rhumanos\PaseSalidaController;
use App\Http\Controllers\rhumanos\PaseSalidaAdminController;
use App\Http\Controllers\rhumanos\PaseSalidaPendienteController;
use App\Http\Controllers\rhumanos\PermisoPersonalPendienteController;
use App\Http\Controllers\rhumanos\PermisoPersonalController;
use App\Http\Controllers\rhumanos\PerAdministrativoController;
use App\Http\Controllers\rhumanos\PerAdminisPendienteController;
use App\Http\Controllers\rhumanos\PermisoVentasController;
use App\Http\Controllers\rhumanos\PerVentasPendienteController;
use App\Http\Controllers\rhumanos\IncapacidadController;
use App\Http\Controllers\rhumanos\IncapacidadPendController;
use App\Http\Controllers\rhumanos\SubsidioController;
use App\Http\Controllers\rhumanos\SubsidioPendController;
use App\Http\Controllers\rhumanos\EmpleadoController;

use App\Http\Controllers\atencionCliente\RegistroAveriaController;
use App\Http\Controllers\atencionCliente\RegistroventaController;
use App\Http\Controllers\atencionCliente\RegistroCancelacionesController;
use App\Http\Controllers\atencionCliente\RegistrolineaController;
use App\Http\Controllers\atencionCliente\RegistrowifiController;
use App\Http\Controllers\atencionCliente\InternetaveriaController;
use App\Http\Controllers\atencionCliente\LineafijaController;
use App\Http\Controllers\CrudmapaPrueba;
use App\Http\Controllers\atencionCliente\AveriaPendienteController;
use App\Http\Controllers\atencionCliente\SoliaveriaController;
use App\Http\Controllers\atencionCliente\MaterialaveriaController;
use App\Http\Controllers\mapa\ArmarioController;
use App\Http\Controllers\mapa\ClienteGpsController;
use App\Http\Controllers\mapa\CajaTerminalController;
use App\Http\Controllers\atencionCliente\InternetsolicitudController;
use App\Http\Controllers\atencionCliente\RegistrolineapendienteController;
use App\Http\Controllers\clientes\ClientesController;
use App\Http\Controllers\catalagos\CatalagosController;
use App\Http\Controllers\administracion\AdministracionController;
use App\Http\Controllers\archivos\ArchivosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\vehiculos\VehiculosController;
use App\Http\Controllers\MunicipiosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para la autorizacion de usuarios:
Route::group(['middleware'=>['auth']], function(){
      Route::resource('roles', RolController::class);
      Route::resource('usuarios', UsuarioController::class);
      Route::resource('tareas', TareaController::class);
});

//vista de la parte principal de recursos humanos
Route::get('/recursos_humanos', [App\Http\Controllers\rhumanos\RecursoshumanosController::class, 'index'])->name('recursos_humanos');

//vista de la parte principal de tipos de permisos recursos humanos
Route::get('/recursos-humanos-menu/tipos-de-permisos', [App\Http\Controllers\rhumanos\RecursoshumanosController::class, 'permisos'])->name('recursos-h-tipos-de-permisos');
//vista de la parte principal de tipos de permisos recursos humanos
Route::get('/recursos-humanos-menu/consultas', [App\Http\Controllers\rhumanos\RecursoshumanosController::class, 'consultas'])->name('recursos-humanos-consultas');


//_________________________________________EMPLEADO (INICO)__________________________________________________________
Route::resource('/empleados', EmpleadoController::class);
//_________________________________________EMPLEADO (INICO)__________________________________________________________

//_________________________________________PASE DE SALIDA (INICO)__________________________________________________________
Route::get('/recursos-humanos-permisos/pase-salida/creacion', [PaseSalidaController::class, 'creacion']);
Route::get('/recursos-humanos-permisos/pase-salida/imprimir', [PaseSalidaController::class, 'imprimir']);
Route::resource('/recursos-humanos-permisos/pase-salida', PaseSalidaController::class);
Route::resource('/recursos-humanos-permisos/pase-salida-admin', PaseSalidaAdminController::class);
Route::resource('/recursos-humanos-permisos/pase-salida-pendiente', PaseSalidaPendienteController::class);
//_________________________________________PASE DE SALIDA (FINAL)________________________________________________________

//_________________________________________PERMISO PERSONAL (INICIO)_______________________________________________________
Route::get('/recursos-humanos-permisos/permiso-personal/creacion2', [PermisoPersonalController::class, 'creacion2']);
Route::resource('/recursos-humanos-permisos/permiso-personal', PermisoPersonalController::class);
Route::resource('/recursos-humanos-permisos/p-personal-pendiente', PermisoPersonalPendienteController::class);
//_________________________________________PERMISO PERSONAL (FINAL)______________________________________________________

//_________________________________________PERMISO VENTAS (INICIO)_________________________________________________________
Route::get('/recursos-humanos-permisos/ventas-rc/create3', [PermisoVentasController::class, 'create3']);
Route::resource('/recursos-humanos-permisos/ventas-rc', PermisoVentasController::class);
Route::resource('/recursos-humanos-permisos/ventas-pendientes', PerVentasPendienteController::class);
//_________________________________________PERMISO VENTAS (FINAL)_________________________________________________________

//_________________________________________PERMISO ADMINISTRATIVO (INICIO)________________________________________________
Route::get('/recursos-humanos-permisos/administrativo/create2', [PerAdministrativoController::class, 'create2']);
Route::resource('/recursos-humanos-permisos/administrativo', PerAdministrativoController::class);
Route::resource('/recursos-humanos-permisos/administrativo-pendiente', PerAdminisPendienteController::class);
//_________________________________________PERMISO ADMINISTRATIVO (FINAL)______________________________________________________

//_________________________________________PERMISO DE INCAPACIDAD (INICIO)________________________________________________
Route::get('/recursos-humanos-permisos/incapacidad/create4', [IncapacidadController::class, 'create4']);
Route::resource('/recursos-humanos-permisos/incapacidad', IncapacidadController::class);
Route::resource('/recursos-humanos-permisos/incapacidad-pendiente', IncapacidadPendController::class);
//_________________________________________PERMISO DE INCAPACIDAD (FINAL)________________________________________________

//_________________________________________PERMISO SUBSIDIO (INICIO)________________________________________________
Route::get('/recursos-humanos-permisos/subsidio/create5', [SubsidioController::class, 'create5']);
Route::resource('/recursos-humanos-permisos/subsidio', SubsidioController::class);
Route::resource('/recursos-humanos-permisos/subsidio-pendiente', SubsidioPendController::class);
//_________________________________________PERMISO SUBSIDIO (FINAL)________________________________________________

//_________________________________________MENU ATENCION AL CLIENTE (INICIO)_________________________________________________________
Route::get('/atencion-al-cliente/menu', [App\Http\Controllers\atencionCliente\MenuatencionclienteController::class, 'menuatencion'])->name('menu');
Route::get('/atencion-al-cliente/menu-registro-averia', [App\Http\Controllers\atencionCliente\MenuatencionclienteController::class, 'menuRegistroAveria'])->name('menu-registro-averia');
Route::resource('/atencion-al-cliente/registro-averia', RegistroAveriaController::class);
Route::get('/atencion-al-cliente/ventas/menu-ventas', [App\Http\Controllers\atencionCliente\MenuatencionclienteController::class, 'menuventas'])->name('menu-ventas');
Route::get('/atencion-al-cliente/cancelaciones/menu-cancelaciones', [App\Http\Controllers\atencionCliente\MenuatencionclienteController::class, 'menucancelaciones'])->name('menu-cancelaciones');
Route::resource('/atencion-al-cliente/ventas', RegistroventaController::class);
Route::resource('/atencion-al-cliente/cancelaciones', RegistrocancelacionesController::class);
Route::get('/atencion-al-cliente/cancelaciones/{id}/imprimir', [RegistroCancelacionesController::class, 'imprimir']);
Route::get('/atencion-al-cliente/ventas/{id}/imprimir', [RegistroventaController::class, 'imprimir']);
Route::get('/atencion-al-cliente/registro-averia/{id}/imprimir', [RegistroAveriaController::class, 'imprimir']);
Route::get('/atencion-al-cliente/ventas-linea/wifi123',[RegistrolineaController::class,'wifi123']);
Route::resource('/atencion-al-cliente/ventas-linea', RegistrolineaController::class);
Route::resource('/atencion-al-cliente/ventas-wifi', RegistrowifiController::class);
Route::get('/atencion-al-cliente/ventas-linea/{id}/imprimir', [RegistrolineaController::class, 'imprimir']);
Route::get('/atencion-al-cliente/ventas-wifi/{id}/imprimir', [RegistrowifiController::class, 'imprimir']);
Route::get('/atencion-al-cliente/internet-averia/create2', [InternetaveriaController::class, 'create2']);
Route::get('/atencion-al-cliente/internet-averia/averiainternet',[InternetaveriaController::class,'averiainternet']);
Route::resource('/atencion-al-cliente/internet-averia', InternetaveriaController::class);
Route::resource('/atencion-al-cliente/linea-fija', LineafijaController::class);
Route::get('/atencion-al-cliente/internet-averia/{id}/imprimir', [InternetaveriaController::class, 'imprimir']);
Route::get('/atencion-al-cliente/linea-fija/{id}/imprimir', [LineafijaController::class, 'imprimir']);
Route::resource('/atencion-al-cliente/averia-pendiente', AveriaPendienteController::class);
Route::resource('/atencion-al-cliente/solicitud-averia', SoliaveriaController::class);
Route::resource('/atencion-al-cliente/material-averia', MaterialaveriaController::class);
Route::resource('/atencion-al-cliente/internet-solicitud', InternetsolicitudController::class);
Route::resource('/atencion-al-cliente/lineas-pendientes', RegistrolineapendienteController::class);

//_________________________________________MENU ATENCION AL CLIENTE (FINAL)_________________________________________________________

//_________________________________________MAPA INTERACTIVO (INICIO)________________________________________________
Route::resource('/mapa-interactivo/clientegps', ClienteGpsController::class);
Route::resource('mapa-interactivo/armario', ArmarioController::class);
Route::get('/mapa-interactivo/mapa-menu', [App\Http\Controllers\mapa\MapaMenuController::class, 'menuMapa'])->name('mapa-menu');
Route::get('/mapa-interactivo/mapa', [App\Http\Controllers\mapa\MapaMenuController::class, 'vistamapa'])->name('mapa');
Route::resource('/mapa-interactivo/cajaterminal', CajaTerminalController::class);
Route::get('/mapa-interactivo/menu-consultar-coordenada', [App\Http\Controllers\mapa\MapaMenuController::class, 'consultaArmario'])->name('menu-consultar-coordenada');
Route::get('/mapa-interactivo/menu-crear-coordenadas', [App\Http\Controllers\mapa\MapaMenuController::class, 'menuCrearCoordenadas'])->name('menu-crear-coordenadas');
Route::resource('mapa-interactivo', CrudmapaPrueba::class);

//_________________________________________MAPA INTERACTIVO (FINAL)________________________________________________



//_________________________________________ARCHIVOS (INICIO)______________________________________________________
Route::get('/archivos/menu-archivos', [App\Http\Controllers\archivos\Menuarchivos::class, 'menuarchivos'])->name('menu-archivos');



//________________________________________ARCHIVOS (FINAL)______________________________________________________//

//________________________________________ADMINISTRACION (INICIO)______________________________________________________//
Route::resource('/administracion/accion', AdministracionController::class);
Route::get('/administracion', [App\Http\Controllers\administracion\AdministracionController::class, 'index'])->name('administracion.index');

Route::get('/administracion/{numerodearchivo}/expediente', [App\Http\Controllers\administracion\AdministracionController::class, 'expediente'])->name('expediente');
Route::get('/administracion/{numerodearchivo}/documentos', [App\Http\Controllers\administracion\AdministracionController::class, 'documentos'])->name('documentos');

Route::get('/administracion/create', [App\Http\Controllers\administracion\AdministracionController::class, 'create'])->name('administracion.create');
Route::post('/administracion', [App\Http\Controllers\administracion\AdministracionController::class, 'store'])->name('administracion.store');
Route::get('/administracion/{admin}', [App\Http\Controllers\administracion\AdministracionController::class, 'show'])->name('administracion.show');
Route::get('/administracion/editar', [App\Http\Controllers\administracion\AdministracionController::class, 'edit'])->name('administracion.edit');
Route::post('/administracion/editar', [App\Http\Controllers\administracion\AdministracionController::class, 'edit'])->name('administracion.edit');
Route::put('/administracion/{admin}', [App\Http\Controllers\administracion\AdministracionController::class, 'update'])->name('administracion.update');
Route::delete('/administracion/{admin}', [App\Http\Controllers\administracion\AdministracionController::class, 'destroy'])->name('administracion.destroy');
Route::get('/archivos/expedientes', [App\Http\Controllers\administracion\AdministracionController::class, 'expedientes'])->name('ver-expediente');
Route::post('/archivos/expedientes', [App\Http\Controllers\administracion\AdministracionController::class, 'expedientes'])->name('ver-expediente');
Route::post('/archivos/resumen', [App\Http\Controllers\administracion\AdministracionController::class, 'pdf'])->name('ver-expediente-pdf');
Route::get('/archivos/dashboard', [App\Http\Controllers\administracion\AdministracionController::class, 'dashboard'])->name('adm.dashboard');
Route::post('/archivos/dashboard', [App\Http\Controllers\administracion\AdministracionController::class, 'dashboard'])->name('adm.dashboard');
//________________________________________ADMNISTRACION(FINAL)______________________________________________________/

//________________________________________CATALAGOS (INICIO)______________________________________________________//
Route::resource('/catalagos/accion', CatalagosController::class);
Route::get('/catalagos', [App\Http\Controllers\catalagos\CatalagosController::class, 'index'])->name('catalagos.index');
Route::get('/catalagos/create', [App\Http\Controllers\catalagos\CatalagosController::class, 'create'])->name('catalagos.create');
Route::post('/catalagos', [App\Http\Controllers\catalagos\CatalagosController::class, 'store'])->name('catalagos.store');
Route::get('/catalagos/{catalagos}', [App\Http\Controllers\catalagos\CatalagosController::class, 'show'])->name('catalagos.show');
Route::get('/catalogos/{catalagos}/editar/vista', [App\Http\Controllers\catalagos\CatalagosController::class, 'show_edit'])->name('catalagos.edit');
//Route::post('/catalagos/editar', [App\Http\Controllers\catalagos\CatalagosController::class, 'editarcatalagos'])->name('editarcatalagos');
Route::put('/catalagos/{catalago}', [App\Http\Controllers\catalagos\CatalagosController::class, 'update'])->name('catalagos.update');
Route::delete('/catalagos/{catalagos}', [App\Http\Controllers\catalagos\CatalagosController::class, 'destroy'])->name('catalagos.destroy');
//________________________________________CATALAGOS (FINAL)______________________________________________________//


//________________________________________DASHBOARD (INICIO)______________________________________________________//
Route::get('/dashboard/dash/index', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
//________________________________________DASHBOARD (FINAL)______________________________________________________//

//________________________________________CLIENTES (INICIO)______________________________________________________//

Route::resource('/clientes/accion', ClientesController::class);

//________________________________________CLIENTES (FINAL)______________________________________________________//

//________________________________________vehiculos (INICIO)______________________________________________________//
Route::get('/vehiculos/menu-vehiculos', [App\Http\Controllers\vehiculos\Menuvehiculos::class, 'menuvehiculos'])->name('menu-vehiculos');
Route::resource('/vehiculos/vehiculos', VehiculosController::class);
Route::get('/vehiculos/vehiculos', [App\Http\Controllers\vehiculos\Vehiculo::class, 'vehiculo'])->name('vehiculos');
Route::post('/vehiculos/vehiculos', [App\Http\Controllers\vehiculos\Vehiculo::class, 'vehiculo'])->name('vehiculos');

Route::get('/vehiculos/ordenes', [App\Http\Controllers\vehiculos\Vehiculo::class, 'ordenes'])->name('vehiculos-ordenes');
Route::post('/vehiculos/ordenes', [App\Http\Controllers\vehiculos\Vehiculo::class, 'ordenes'])->name('vehiculos-ordenes');;

Route::get('/vehiculos/emitidas', [App\Http\Controllers\vehiculos\Vehiculo::class, 'emitidas'])->name('vehiculos-emitidas');
Route::post('/vehiculos/emitidas', [App\Http\Controllers\vehiculos\Vehiculo::class, 'emitidas'])->name('vehiculos-emitidas');

Route::get('/vehiculos/abastecer', [App\Http\Controllers\vehiculos\Vehiculo::class, 'abastecer'])->name('abastecer');
Route::post('/vehiculos/abastecer', [App\Http\Controllers\vehiculos\Vehiculo::class, 'abastecer'])->name('abastecer');
Route::get('/vehiculos/resumen', [App\Http\Controllers\vehiculos\Vehiculo::class, 'pdf'])->name('resumen.vehiculos');
Route::post('/vehiculos/resumen', [App\Http\Controllers\vehiculos\Vehiculo::class, 'pdf'])->name('resumen.vehiculos');

Route::get('/vehiculos/crearvehiculos', [App\Http\Controllers\vehiculos\Crearvehiculos::class, 'crearvehiculos'])->name('crearvehiculos');
Route::post('/vehiculos/crearvehiculos', [App\Http\Controllers\vehiculos\Crearvehiculos::class, 'crearvehiculos'])->name('crearvehiculos');
//________________________________________veh(FINAL)______________________________________________________//

//________________________________________COBRANZAS (INICIO)______________________________________________________//

Route::get('/cobranzas/menu-cobranzas', [App\Http\Controllers\cobranzas\Menucobranzas::class, 'menucobranzas'])->name('menu-cobranzas');
Route::get('/cobranzas/crear-cobranzas', [App\Http\Controllers\cobranzas\Crearcobranzas::class, 'crearcobranzas'])->name('crear-cobranzas');
Route::get('/cobranzas/index', [App\Http\Controllers\cobranzas\Index::class, 'index'])->name('index');
Route::get('/cobranzas/buscador', [App\Http\Controllers\cobranzas\Buscador::class, 'buscador'])->name('buscador');
Route::post('/cobranzas/buscador', [App\Http\Controllers\cobranzas\Buscador::class, 'buscador'])->name('buscador');
Route::get('/cobranzas/agendar', [App\Http\Controllers\cobranzas\Agendar::class, 'agendar'])->name('agendar');
Route::post('/cobranzas/agendar', [App\Http\Controllers\cobranzas\Agendar::class, 'agendar'])->name('agendar');
Route::get('/cobranzas/editar', [App\Http\Controllers\cobranzas\Editar::class, 'editar'])->name('editar');
Route::post('/cobranzas/editar', [App\Http\Controllers\cobranzas\Editar::class, 'editar'])->name('editar');
Route::get('/cobranzas/dashboard', [App\Http\Controllers\cobranzas\Dashboard::class, 'index'])->name('dashboardCobranza');
Route::post('/cobranzas/dashboard', [App\Http\Controllers\cobranzas\Dashboard::class, 'index'])->name('dashboardCobranza');
Route::get('/cobranzas/resumen', [App\Http\Controllers\cobranzas\Citas ::class, 'pdf'])->name('resumen.cobranzas');
Route::post('/cobranzas/resumen', [App\Http\Controllers\cobranzas\Citas::class, 'pdf'])->name('resumen.cobranzas');
//________________________________________COBRANZAS (FINAL)______________________________________________________//







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//________________________________________EVALUACIONES______________________________________________________//
Route::get('/evaluaciones', [App\Http\Controllers\Evaluaciones\Evaluaciones::class, 'index'])->name('evaluaciones');
Route::get('/evaluaciones/evaluar', [App\Http\Controllers\Evaluaciones\Evaluaciones::class, 'evaluar'])->name('evaluar');
Route::post('/evaluaciones/evaluar', [App\Http\Controllers\Evaluaciones\Evaluaciones::class, 'evaluar'])->name('evaluar');
Route::get('/evaluaciones/misevaluaciones', [App\Http\Controllers\Evaluaciones\Evaluaciones::class, 'misevaluaciones'])->name('misevaluaciones');
Route::get('/evaluaciones/pdf', [App\Http\Controllers\Evaluaciones\Evaluaciones::class, 'pdf'])->name('evaluacion-resumen');
Route::post('/evaluaciones/pdf', [App\Http\Controllers\Evaluaciones\Evaluaciones::class, 'pdf'])->name('evaluacion-resumen');

//________________________________________Busqueda______________________________________________________//
Route::get('/evaluaciones/evaluados', [App\Http\Controllers\Evaluaciones\Evaluaciones::class, 'evaluados'])->name('evaluados');
Route::post('/evaluaciones/evaluados', [App\Http\Controllers\Evaluaciones\Evaluaciones::class, 'evaluados'])->name('evaluados');
Route::get('/evaluaciones/pdf+', [App\Http\Controllers\Evaluaciones\Evaluaciones::class, 'pdf2'])->name('pdf2');
Route::post('/evaluaciones/pdf+', [App\Http\Controllers\Evaluaciones\Evaluaciones::class, 'pdf2'])->name('pdf2');

//________________________________________DASHBOARD______________________________________________________//
Route::get('/dashboard', [App\Http\Controllers\Dashboard\Dashboard::class, 'index'])->name('dashboard');
Route::post('/dashboard', [App\Http\Controllers\Dashboard\Dashboard::class, 'index'])->name('dashboard');


