<?php

Route::group(['middleware' => 'web'], function() {
    /**
     * Switch between the included languages
     */
    Route::group(['namespace' => 'Language'], function () {
        require (__DIR__ . '/Routes/Language/Language.php');
    });

    /**
     * Frontend Routes
     */
    Route::group(['namespace' => 'Frontend'], function () {
        Route::get('/', [
            'as' => 'index', 'uses' => 'FrontendController@index'
        ]);

        Route::get('/posts', [
            'as' => 'posts', 'uses' => 'PostsController@index'
        ]);
        Route::get('post/create', [
            'as' => 'post/create', 'uses' => 'PostsController@store'
        ]);
        Route::post('post/store/{id?}', [
            'as' => 'post/store', 'uses' => 'PostsController@store'
        ]);
        Route::get('post/edit/{id}', [
            'as' => 'post/edit', 'uses' => 'PostsController@edit'
        ]);
        Route::get('post/remove/{id}', [
            'uses' => 'PostsController@remove'
        ]);
        Route::get('posts/export', [
            'as' => 'posts/export', 'uses' => 'PostsController@export'
        ]);
    });
});

/**
 * Backend Routes - NOT USED
 * Namespaces indicate folder structure
 * Admin middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    /**
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    require (__DIR__ . '/Routes/Backend/Dashboard.php');
    require (__DIR__ . '/Routes/Backend/Access.php');
    require (__DIR__ . '/Routes/Backend/LogViewer.php');
});
