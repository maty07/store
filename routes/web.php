<?php


Route::get('/', function () {
	return redirect()->route('home');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::group([
	'middleware' => 'admin',
	'prefix' => 'admin',
	'namespaces' => 'Admin'
], function(){
	Route::resource('departamento', 'DepartamentController')->except('destroy');
	Route::resource('categoria', 'CategoryController')->except('destroy');
	Route::resource('producto', 'ProductController')->except('destroy');
	Route::resource('carrusel', 'CarouselController')->except('destroy');
});

//Eliminar
Route::put('eliminar/departamento/{id}', 'DepartamentController@destroy')->name('dep.delete');
Route::put('eliminar/categoria/{id}', 'CategoryController@destroy')->name('category.delete');
Route::put('eliminar/producto/{id}', 'ProductController@destroy')->name('pro.delete');
Route::put('eliminar/carrusel/{id}', 'CarouselController@destroy')->name('carousel.delete');

//Views Store
Route::get('electro', 'Store\ViewsStoreController@electro')->name('electro');
Route::get('tecno', 'Store\ViewsStoreController@tecno')->name('tecno');
Route::get('linea-blanca', 'Store\ViewsStoreController@linea_blanca')->name('linea_blanca');
Route::get('dormitorio', 'Store\ViewsStoreController@dormitorio')->name('dormitorio');
Route::get('muebles', 'Store\ViewsStoreController@muebles')->name('muebles');
Route::get('deco', 'Store\ViewsStoreController@deco')->name('deco');
Route::get('mujer', 'Store\ViewsStoreController@mujer')->name('mujer');
Route::get('hombre', 'Store\ViewsStoreController@hombre')->name('hombre');
Route::get('zapatos', 'Store\ViewsStoreController@zapatos')->name('zapatos');
Route::get('deportes', 'Store\ViewsStoreController@deportes')->name('deportes');
Route::get('ninos', 'Store\ViewsStoreController@ninos')->name('niños');
Route::get('categoria/{id}/{slug}','Store\ViewsStoreController@showCategories')->name('category.detail');
Route::get('producto/{slug}', 'Store\ViewsStoreController@showProducts')->name('product.detail');

Route::get('carrito', 'Store\ViewsStoreController@cart')->name('cart');
Route::get('getcart/{id}', 'Store\ViewsStoreController@getCart')->name('getCart');
Route::post('buy', 'Store\ViewsStoreController@buy')->name('buy');

Route::get('boleta', function(){
	return view('store.ticket');
})->name('boleta');
