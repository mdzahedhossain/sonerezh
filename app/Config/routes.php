<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'me', 'action' => 'index'));

Router::connect('/install', array('controller' => 'installers', 'action' => 'index'));
Router::connect('/docker-install', array('controller' => 'installers', 'action' => 'docker'));

Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));

Router::connect('/albums', array('controller' => 'albums', 'action' => 'index'));
Router::connect('/albums/:id', array('controller' => 'albums', 'action' => 'album'), array('pass' => array('id')));

Router::connect('/artists', array('controller' => 'bands', 'action' => 'index'));

Router::connect('/playlists/:action/:id', array('controller' => 'playlists'), array('pass' => array('id')));
Router::connect('/playlists/add', array('controller' => 'playlists', 'action' => 'add'));
Router::connect('/playlists/*', array('controller' => 'playlists', 'action' => 'index'));

Router::connect('/settings', array('controller' => 'settings', 'action' => 'index'));

Router::connect('/sync', array('controller' => 'sync', 'action' => 'index', '[method]' => 'GET'));
Router::connect('/sync', array('controller' => 'sync', 'action' => 'patchSync', '[method]' => 'PATCH'));
Router::connect('/sync', array('controller' => 'sync', 'action' => 'postSync', '[method]' => 'POST'));
Router::connect('/sync', array('controller' => 'sync', 'action' => 'deleteSync', '[method]' => 'DELETE'));

Router::connect('/tracks/:id', array('controller' => 'tracks', 'action' => 'tracks', '[method]' => 'GET'), array('pass' => array('id')));

Router::connect('/users', array('controller' => 'users', 'action' => 'index'));

Router::connect('/img/**', array('controller' => 'img', 'action' => 'index'));

Router::connect(
    '/api/v1/albums/:albumId/tracks',
    array('controller' => 'albums', 'action' => 'tracks', 'prefix' => 'api', 'api' => true),
    array('pass' => array('albumId'))
);

Router::connect(
    '/api/v1/bands/:bandId/tracks',
    array('controller' => 'bands', 'action' => 'tracks', 'prefix' => 'api', 'api' => true),
    array('pass' => array('bandId'))
);

Router::connect(
    '/api/v1/tracks/:trackId',
    array('controller' => 'tracks', 'action' => 'view', 'prefix' => 'api', 'api' => true),
    array('pass' => array('trackId'))
);

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
