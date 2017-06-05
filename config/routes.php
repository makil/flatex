<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
$app->get('/', App\Action\HomePageAction::class, 'home')->setOptions(['defaults' => ['page'=>'home-page']]);
$app->get('/:page', App\Action\HomePageAction::class, 'page')->setOptions(['defaults' => ['page'=>'home-page']]);

$app->route('/login', Auth\Action\LoginAction::class, ['GET', 'POST'], 'login');
$app->get('/logout', Auth\Action\LogoutAction::class, 'logout');

$app->get('/admin', [
    Auth\Action\AuthAction::class,
    Admin\Action\HomePageAction::class], 'admin.home');
$app->get('/admin/install', [
    Auth\Action\AuthAction::class,
    Admin\Action\InstallAction::class], 'admin.install');
$app->get('/admin/page[/:action[/:id]]', [
    Auth\Action\AuthAction::class,
    Admin\Action\PageAction::class], 
    'admin.page')->setOptions(['defaults' => ['action'=>'index', 'id'=> 0]]);
$app->get('/admin/layout', [
    Auth\Action\AuthAction::class,
    Admin\Action\LayoutAction::class], 'admin.layout');
$app->get('/admin/info', [
    Auth\Action\AuthAction::class,
    Admin\Action\InfoAction::class], 'admin.info');