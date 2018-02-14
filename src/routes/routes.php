<?php

Route::group(['prefix' => 'jumlah-penduduk-tingkat-pendidikan', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\JPTingkatPendidikan\Http\Controllers\JPTingkatPendidikanController@index',
        'create'     => 'Bantenprov\JPTingkatPendidikan\Http\Controllers\JPTingkatPendidikanController@create',
        'store'     => 'Bantenprov\JPTingkatPendidikan\Http\Controllers\JPTingkatPendidikanController@store',
        'show'      => 'Bantenprov\JPTingkatPendidikan\Http\Controllers\JPTingkatPendidikanController@show',
        'update'    => 'Bantenprov\JPTingkatPendidikan\Http\Controllers\JPTingkatPendidikanController@update',
        'destroy'   => 'Bantenprov\JPTingkatPendidikan\Http\Controllers\JPTingkatPendidikanController@destroy',
    ];

    Route::get('/',$controllers->index)->name('jumlah-penduduk-tingkat-pendidikan.index');
    Route::get('/create',$controllers->create)->name('jumlah-penduduk-tingkat-pendidikan.create');
    Route::post('/store',$controllers->store)->name('jumlah-penduduk-tingkat-pendidikan.store');
    Route::get('/{id}',$controllers->show)->name('jumlah-penduduk-tingkat-pendidikan.show');
    Route::put('/{id}/update',$controllers->update)->name('jumlah-penduduk-tingkat-pendidikan.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('jumlah-penduduk-tingkat-pendidikan.destroy');

});

