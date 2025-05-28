<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Agregar Empleado
    Route::delete('agregar-empleados/destroy', 'AgregarEmpleadoController@massDestroy')->name('agregar-empleados.massDestroy');
    Route::resource('agregar-empleados', 'AgregarEmpleadoController');

    // Flujos
    Route::delete('flujos/destroy', 'FlujosController@massDestroy')->name('flujos.massDestroy');
    Route::resource('flujos', 'FlujosController');

    // Pasos
    Route::delete('pasos/destroy', 'PasosController@massDestroy')->name('pasos.massDestroy');
    Route::resource('pasos', 'PasosController');

    // Agregar Caso
    Route::delete('agregar-casos/destroy', 'AgregarCasoController@massDestroy')->name('agregar-casos.massDestroy');
    Route::resource('agregar-casos', 'AgregarCasoController');

    // Caso Pasos
    Route::delete('caso-pasos/destroy', 'CasoPasosController@massDestroy')->name('caso-pasos.massDestroy');
    Route::resource('caso-pasos', 'CasoPasosController');

    // Agregar Documento
    Route::delete('agregar-documentos/destroy', 'AgregarDocumentoController@massDestroy')->name('agregar-documentos.massDestroy');
    Route::post('agregar-documentos/media', 'AgregarDocumentoController@storeMedia')->name('agregar-documentos.storeMedia');
    Route::post('agregar-documentos/ckmedia', 'AgregarDocumentoController@storeCKEditorImages')->name('agregar-documentos.storeCKEditorImages');
    Route::resource('agregar-documentos', 'AgregarDocumentoController');

    // Adjuntos
    Route::delete('adjuntos/destroy', 'AdjuntosController@massDestroy')->name('adjuntos.massDestroy');
    Route::resource('adjuntos', 'AdjuntosController');

    // Comentarios
    Route::delete('comentarios/destroy', 'ComentariosController@massDestroy')->name('comentarios.massDestroy');
    Route::resource('comentarios', 'ComentariosController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
