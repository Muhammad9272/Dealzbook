<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
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

// Route::get('/home', function(){
//     return view('admin.dashboard');
// })->name('admin.dashboard')
//     ->middleware('auth');
// Auth::routes();



//======================== public apis ==========================
Route::group([
    'prefix'        => 'admin',
    'namespace'     => 'Api',
    'middleware' => 'auth:admin'
], function (Router $router) {


 Route::get('/country/datatables', 'CountryController@datatables')->name('admin-country-datatables'); //JSON REQUEST
  Route::get('/country', 'CountryController@index')->name('admin-country-index');
  Route::get('/country/create', 'CountryController@create')->name('admin-country-create');
  Route::post('/country/create', 'CountryController@store')->name('admin-country-store');
  Route::get('/country/edit/{id}', 'CountryController@edit')->name('admin-country-edit');
  Route::post('/country/edit/{id}', 'CountryController@update')->name('admin-country-update');
  Route::get('/country/status/{id1}/{id2}', 'CountryController@status')->name('admin-country-status');
  // Route::get('/country/delete/{id}', 'CountryController@destroy')->name('admin-country-delete');


  Route::get('/city/datatables', 'CityController@datatables')->name('admin-city-datatables'); //JSON REQUEST
  Route::get('/city', 'CityController@index')->name('admin-city-index');
  Route::get('/city/create', 'CityController@create')->name('admin-city-create');
  Route::post('/city/create', 'CityController@store')->name('admin-city-store');
  Route::get('/city/edit/{id}', 'CityController@edit')->name('admin-city-edit');
  Route::post('/city/edit/{id}', 'CityController@update')->name('admin-city-update');
  Route::get('/city/status/{id1}/{id2}', 'CityController@status')->name('admin-city-status');


  Route::get('/store/datatables', 'StoreController@datatables')->name('admin-store-datatables'); //JSON REQUEST
  Route::get('/store', 'StoreController@index')->name('admin-store-index');
  Route::get('/store/create', 'StoreController@create')->name('admin-store-create');
  Route::post('/store/create', 'StoreController@store')->name('admin-store-store');
  Route::get('/store/edit/{id}', 'StoreController@edit')->name('admin-store-edit');
  Route::post('/store/edit/{id}', 'StoreController@update')->name('admin-store-update');
  Route::get('/store/status/{id1}/{id2}', 'StoreController@status')->name('admin-store-status');
  Route::get('/store/featured/{id1}/{id2}', 'StoreController@featured')->name('admin-store-featured');




    // Route::get('/stores', 'StoreController@index')->name('all.stores');
    // Route::post('/store', 'StoreController@store')->name('add.store');
    // Route::patch('/toggle/store/status', 'StoreController@toggleStatus')->name('toggle.store.status');
    // Route::patch('/toggle/store/featured', 'StoreController@toggleFeatured')->name('toggle.store.featured');
    // Route::get('/store/{store}/branches', 'StoreController@storeBranches')->name('all.stores');



  // Route::get('/mall/datatables', 'MallController@datatables')->name('admin-mall-datatables'); //JSON REQUEST
  // Route::get('/mall', 'MallController@index')->name('admin-mall-index');
  // Route::get('/mall/create', 'MallController@create')->name('admin-mall-create');
  // Route::post('/mall/create', 'MallController@store')->name('admin-mall-store');
  // Route::get('/mall/edit/{id}', 'MallController@edit')->name('admin-mall-edit');
  // Route::post('/mall/edit/{id}', 'MallController@update')->name('admin-mall-update');


    

  Route::get('/branch/datatables', 'BranchController@datatables')->name('admin-branch-datatables'); //JSON REQUEST
  Route::get('/branch', 'BranchController@index')->name('admin-branch-index');
  Route::get('/branch/create', 'BranchController@create')->name('admin-branch-create');
  Route::post('/branch/create', 'BranchController@store')->name('admin-branch-store');
  Route::get('/branch/edit/{id}', 'BranchController@edit')->name('admin-branch-edit');
  Route::post('/branch/edit/{id}', 'BranchController@update')->name('admin-branch-update');
  Route::get('/branch/status/{id1}/{id2}', 'BranchController@status')->name('admin-branch-status');
  Route::get('/load/city/{id}/', 'BranchController@load')->name('admin-city-load'); //JSON REQUEST
 

  Route::get('/tags/datatables', 'TagController@datatables')->name('admin-tags-datatables'); //JSON REQUEST
  Route::get('/tags', 'TagController@index')->name('admin-tags-index');
  Route::get('/tags/create', 'TagController@create')->name('admin-tags-create');
  Route::post('/tags/create', 'TagController@store')->name('admin-tags-store');
  Route::get('/tags/edit/{id}', 'TagController@edit')->name('admin-tags-edit');
  Route::post('/tags/edit/{id}', 'TagController@update')->name('admin-tags-update');
  Route::get('/tags/status/{id1}/{id2}', 'TagController@status')->name('admin-tags-status');



  Route::get('/catalogs/datatables', 'CatalogController@datatables')->name('admin-catalogs-datatables'); //JSON REQUEST
  Route::get('/catalogs', 'CatalogController@index')->name('admin-catalogs-index');
  Route::get('/catalogs/create', 'CatalogController@create')->name('admin-catalogs-create');
  Route::post('/catalogs/create', 'CatalogController@store')->name('admin-catalogs-store');
  Route::get('/catalogs/edit/{id}', 'CatalogController@edit')->name('admin-catalogs-edit');
  Route::post('/catalogs/edit/{id}', 'CatalogController@update')->name('admin-catalogs-update');
  Route::get('/catalogs/status/{id1}/{id2}', 'CatalogController@status')->name('admin-catalogs-status');
   Route::get('/catalogs/featured/{id1}/{id2}', 'CatalogController@featured')->name('admin-catalogs-featured');
  Route::get('/load/branch/{id}/', 'CatalogController@load')->name('admin-branch-load'); //JSON REQUEST




  Route::get('/faqs/datatables', 'FaqController@datatables')->name('admin-faqs-datatables'); //JSON REQUEST
  Route::get('/faqs', 'FaqController@index')->name('admin-faqs-index');
  Route::get('/faqs/create', 'FaqController@create')->name('admin-faqs-create');
  Route::post('/faqs/create', 'FaqController@store')->name('admin-faqs-store');
  Route::get('/faqs/edit/{id}', 'FaqController@edit')->name('admin-faqs-edit');
  Route::post('/faqs/edit/{id}', 'FaqController@update')->name('admin-faqs-update');
  Route::get('/faqs/status/{id1}/{id2}', 'FaqController@status')->name('admin-faqs-status');


  Route::get('/blogs/datatables', 'BlogController@datatables')->name('admin-blogs-datatables'); //JSON REQUEST
  Route::get('/blogs', 'BlogController@index')->name('admin-blogs-index');
  Route::get('/blogs/create', 'BlogController@create')->name('admin-blogs-create');
  Route::post('/blogs/create', 'BlogController@store')->name('admin-blogs-store');
  Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('admin-blogs-edit');
  Route::post('/blogs/edit/{id}', 'BlogController@update')->name('admin-blogs-update');
  Route::get('/blogs/status/{id1}/{id2}', 'BlogController@status')->name('admin-blogs-status');

 
  Route::get('/banners/datatables', 'BannerController@datatables')->name('admin-banners-datatables'); //JSON REQUEST
  Route::get('/banners', 'BannerController@index')->name('admin-banners-index');
  Route::get('/banners/create', 'BannerController@create')->name('admin-banners-create');
  Route::post('/banners/create', 'BannerController@store')->name('admin-banners-store');
  Route::get('/banners/edit/{id}', 'BannerController@edit')->name('admin-banners-edit');
  Route::post('/banners/edit/{id}', 'BannerController@update')->name('admin-banners-update');
  Route::get('/banners/status/{id1}/{id2}', 'BannerController@status')->name('admin-banners-status');


  Route::get('/advertisements/datatables', 'AdvertisementController@datatables')->name('admin-advertisements-datatables'); //JSON REQUEST
  Route::get('/advertisements', 'AdvertisementController@index')->name('admin-advertisements-index');
  Route::get('/advertisements/create', 'AdvertisementController@create')->name('admin-advertisements-create');
  Route::post('/advertisements/create', 'AdvertisementController@store')->name('admin-advertisements-store');
  Route::get('/advertisements/edit/{id}', 'AdvertisementController@edit')->name('admin-advertisements-edit');
  Route::post('/advertisements/edit/{id}', 'AdvertisementController@update')->name('admin-advertisements-update');
  Route::get('/advertisements/status/{id1}/{id2}', 'AdvertisementController@status')->name('admin-advertisements-status');
  

  Route::get('/seotools/keywords', 'HomeController@keywords')->name('admin-seotool-keywords');
  Route::post('/seotools/keywords/update', 'HomeController@keywordsupdate')->name('admin-seotool-keywords-update');


  Route::get('/terms/edit', 'TermController@edit')->name('admin-terms-edit');
  Route::post('/terms/edit', 'TermController@update')->name('admin-terms-update');  

  Route::get('/about/edit', 'AboutController@edit')->name('admin-about-edit');
  Route::post('/about/edit', 'AboutController@update')->name('admin-about-update'); 

  Route::get('/social/edit', 'SocialController@edit')->name('admin-social-edit');
  Route::post('/social/edit', 'SocialController@update')->name('admin-social-update');

    Route::get('/contacts', 'ContactController@index')->name('all.contacts');
 

    // Route::get('/catalogs', 'CatalogController@index')->name('all.catalogs');
    // Route::post('/catalog', 'CatalogController@store')->name('add.catalog');
    // Route::patch('/catalog/{catalog}', 'CatalogController@update')->name('update.catalog');
    // Route::patch('/reorder/catalog/images', 'CatalogController@reorderImages')->name('reorder.catalog.images');
    // Route::patch('/toggle/catalog/status', 'CatalogController@toggleStatus')->name('toggle.catalog.status');

    // Route::post('/catalog/images', 'CatalogController@storeImages')->name('add.catalog.images');
    // Route::post('/delete/catalog/image', 'CatalogController@deleteImage')->name('delete.catalog.image');
    // Route::post('/toggle/featured/image', 'CatalogController@toggleFeaturedImage')->name('toggle.catalog.featured.image');
    // Route::post('/catalog/pdf', 'CatalogController@storePdf')->name('add.catalog.pdf');
    // Route::post('/delete/catalog/pdf', 'CatalogController@deletePdf')->name('delete.catalog.pdf');




    // Route::get('/faqs', 'FaqController@index')->name('all.faqs');
    // Route::post('/faq', 'FaqController@store')->name('add.faq');
    // Route::patch('/faq/{faq}', 'FaqController@update')->name('update.faq');
    // Route::patch('/toggle/faq/status', 'FaqController@toggleStatus');

    // Route::get('/terms', 'TermController@index')->name('all.terms');
    // Route::post('/term', 'TermController@store')->name('add.term');
    // Route::patch('/term/{term}', 'TermController@update')->name('update.term');
    // Route::patch('/toggle/term/status', 'TermController@toggleStatus');

    // Route::post('/about', 'AboutController@store')->name('add.about');
    // Route::get('/about', 'AboutController@index')->name('about');

    // Route::get('/blogs', 'BlogController@index')->name('all.blogs');
    // Route::post('/blog', 'BlogController@store')->name('add.blog');
    // Route::post('/blog/upload/image', 'BlogController@uploadImage');
    // Route::patch('/blog/{blog}', 'BlogController@update')->name('update.blog');
    // Route::patch('/toggle/blog/{blog}/status', 'BlogController@toggleStatus');

    Route::get('/account/details', 'AuthController@index');
    Route::patch('/account/details', 'AuthController@update');

    // Route::get('/home', 'HomeController@index');
    // Route::post('/home/page', 'HomeController@store');
    // Route::patch('/home/page/{home}', 'HomeController@update');

    // Route::get('/social', 'SocialController@index');
    // Route::post('/social', 'SocialController@store');
    // Route::patch('/social/{social}', 'SocialController@update');

    // Route::get('/banners', 'BannerController@index')->name('all.banners');
    // Route::post('/banner', 'BannerController@store')->name('add.banner');
    // Route::patch('/toggle/banner/status', 'BannerController@toggleStatus')->name('toggle.banner.status');
    // Route::patch('/toggle/store/featured', 'StoreController@toggleFeatured')->name('toggle.store.featured');
    // Route::get('/store/{store}/branches', 'StoreController@storeBranches')->name('all.stores');

    // Route::get('/advertisements', 'AdvertisementController@index')->name('all.advertisements');
    // Route::post('/advertisements', 'AdvertisementController@store')->name('add.advertisement');
    // Route::post('/toggle/advertisements/status', 'AdvertisementController@toggleStatus')->name('toggle.advertisement.status');

});
//======================== public apis end ==========================


Route::prefix('admin')->group(function() {

  //------------ ADMIN LOGIN SECTION ------------

  Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
  Route::get('/forgot', 'Admin\LoginController@showForgotForm')->name('admin.forgot');
  Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
  Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');


  Route::get('/profile', 'Admin\AdminController@profile')->name('admin.profile');
  Route::post('/profile/update', 'Admin\AdminController@profileupdate')->name('admin.profile.update');

  Route::get('/generalsettings/edit', 'Admin\AdminController@gsedit')->name('admin.gs.edit');
  Route::post('/generalsettings/update', 'Admin\AdminController@gsupdate')->name('admin-gs-update');

  Route::get('/password', 'Admin\AdminController@passwordreset')->name('admin.password');
  Route::post('/password/update', 'Admin\AdminController@changepass')->name('admin.password.update');

  Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

    Route::get('/cache/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect()->route('admin.dashboard')->with('cache','System Cache Has Been Removed.');
  })->name('admin-cache-clear');




});

Route::get('/','HomeController@index')->name('front.index');

// Route::get('/', function () {

//     $locale = session('locale');

//      if(empty($locale)){
//          $locale = 'en';
//          app()->setLocale($locale);
//          session(['locale' => $locale]);
//          redirect('/en');
//      }
//      else{
//         return redirect("/{$locale}");
//      }
// });

Route::middleware(['locale'])->group(function () {
    Route::get('/stores', 'StoreController@index');
    Route::get('/store/{store}', 'StoreController@show');

    Route::get('/catalogs', 'CatalogController@index');

    Route::get('/blog', 'BlogController@index');

    Route::get('/blog/{blog}', 'BlogController@show');

    Route::get('/terms', 'TermController@index');

    Route::get('/faq', 'FaqController@index');
});


Route::prefix('/{lang}')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/city/{city}', 'CityController@filter');
    Route::get('/country/{country}', 'CountryController@filter');

    Route::get('/stores', 'StoreController@index');
    Route::get('/store/{store}', 'StoreController@show');
    Route::get('/catalog/{catalog}', 'CatalogController@show')->middleware('cors');

    Route::get('/catalogs', 'CatalogController@index');

    Route::get('/blog', 'BlogController@index');
    Route::get('/blog/{blog}', 'BlogController@show');

    Route::get('/terms', 'TermController@index');

    Route::get('/faq', 'FaqController@index');

    Route::get('/about-us', 'AboutController@index');

    Route::get('/contact-us', 'ContactController@index');

});

Route::post('/contact-us', 'ContactController@store')->name('contact.store');


Route::get('/tag/{tag}', 'TagController@show');

Route::get('/store/{store}/catalogs', 'StoreController@showCatalogs');

Route::get('/{store}/{city}/{branch}', 'BranchController@show');










Route::post('/search/catalogs', 'CatalogController@search')->name('search.catalogs');

Route::get('/language/{language}', 'LanguageController@setLanguage');

//


Route::get('/{city}/{mall}', 'MallController@show');
