<?php

use Stevebauman\Location\Facades\Location;
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect(url()->previous())->with('message', 'Clear Cache!'); 
});
Route::get('/clear-route', function() {
   
    Artisan::call('route:clear');
    return redirect(url()->previous())->with('message', 'Clear Route!'); 

});

Route::get('/clear-config', function() {
    Artisan::call('config:clear');
    return redirect(url()->previous())->with('message', 'Clear Config!'); 

});
Route::get('/clear-view', function() {
    Artisan::call('view:clear');
    return redirect(url()->previous())->with('message', 'Clear View!'); 

});



Route::get('get-location-from-ip',function(){
    $ip = '87.231.45.33';
 
    $data = \Location::get($ip);
    dd($data);
    
});
Route::get('/', 'PagesController@HomePage');



Route::group(['middleware' => ['auth', 'roles'],'roles' => ['admin','user','vendor']], function () {
// Route::group(['middleware' => ['auth', 'roles'],'roles' => ['admin','user']], function () {

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
    Route::get('account-settings', 'UsersController@getSettings');
    Route::post('account-settings', 'UsersController@saveSettings');
    
});

Route::group(['middleware' => 'guest'],function (){   
});
Route::group(['middleware' => 'auth'], function () {
});

// Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin','roles' => 'vendor'], function () {
Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin','vendor'], function () {
    Route::get('index2', function () {
        return view('dashboard.index2');
    });
    Route::get('index3', function () {
        return view('dashboard.index3');
    });
    Route::get('index4', function () {
        return view('ecommerce.index4');
    });
    Route::get('products', function () {
        return view('ecommerce.products');
    });
    Route::get('product-detail', function () {
        return view('ecommerce.product-detail');
    });
    Route::get('product-edit', function () {
        return view('ecommerce.product-edit');
    });
    Route::get('product-orders', function () {
        return view('ecommerce.product-orders');
    });
    Route::get('product-cart', function () {
        return view('ecommerce.product-cart');
    });
    Route::get('product-checkout', function () {
        return view('ecommerce.product-checkout');
    });
    Route::get('panels-wells', function () {
        return view('ui-elements.panels-wells');
    });
    Route::get('panel-ui-block', function () {
        return view('ui-elements.panel-ui-block');
    });
    Route::get('portlet-draggable', function () {
        return view('ui-elements.portlet-draggable');
    });
    Route::get('buttons', function () {
        return view('ui-elements.buttons');
    });
    Route::get('tabs', function () {
        return view('ui-elements.tabs');
    });
    Route::get('modals', function () {
        return view('ui-elements.modals');
    });
    Route::get('progressbars', function () {
        return view('ui-elements.progressbars');
    });
    Route::get('notification', function () {
        return view('ui-elements.notification');
    });
    Route::get('carousel', function () {
        return view('ui-elements.carousel');
    });
    Route::get('user-cards', function () {
        return view('ui-elements.user-cards');
    });
    Route::get('timeline', function () {
        return view('ui-elements.timeline');
    });
    Route::get('timeline-horizontal', function () {
        return view('ui-elements.timeline-horizontal');
    });
    Route::get('range-slider', function () {
        return view('ui-elements.range-slider');
    });
    Route::get('ribbons', function () {
        return view('ui-elements.ribbons');
    });
    Route::get('steps', function () {
        return view('ui-elements.steps');
    });
    Route::get('session-idle-timeout', function () {
        return view('ui-elements.session-idle-timeout');
    });
    Route::get('session-timeout', function () {
        return view('ui-elements.session-timeout');
    });
    Route::get('bootstrap-ui', function () {
        return view('ui-elements.bootstrap');
    });
    Route::get('starter-page', function () {
        return view('pages.starter-page');
    });
    Route::get('blank', function () {
        return view('pages.blank');
    });
    Route::get('blank', function () {
        return view('pages.blank');
    });
    Route::get('search-result', function () {
        return view('pages.search-result');
    });
    Route::get('custom-scroll', function () {
        return view('pages.custom-scroll');
    });
    Route::get('lock-screen', function () {
        return view('pages.lock-screen');
    });
    Route::get('recoverpw', function () {
        return view('pages.recoverpw');
    });
    Route::get('animation', function () {
        return view('pages.animation');
    });
    Route::get('profile', function () {
        return view('pages.profile');
    });
    Route::get('invoice', function () {
        return view('pages.invoice');
    });
    Route::get('gallery', function () {
        return view('pages.gallery');
    });
    Route::get('pricing', function () {
        return view('pages.pricing');
    });
    Route::get('400', function () {
        return view('pages.400');
    });
    Route::get('403', function () {
        return view('pages.403');
    });
    Route::get('404', function () {
        return view('pages.404');
    });
    Route::get('500', function () {
        return view('pages.500');
    });
    Route::get('503', function () {
        return view('pages.503');
    });
    Route::get('form-basic', function () {
        return view('forms.form-basic');
    });
    Route::get('form-layout', function () {
        return view('forms.form-layout');
    });
    Route::get('icheck-control', function () {
        return view('forms.icheck-control');
    });
    Route::get('form-advanced', function () {
        return view('forms.form-advanced');
    });
    Route::get('form-upload', function () {
        return view('forms.form-upload');
    });
    Route::get('form-dropzone', function () {
        return view('forms.form-dropzone');
    });
    Route::get('form-pickers', function () {
        return view('forms.form-pickers');
    });
    Route::get('basic-table', function () {
        return view('tables.basic-table');
    });
    Route::get('table-layouts', function () {
        return view('tables.table-layouts');
    });
    Route::get('data-table', function () {
        return view('tables.data-table');
    });
    Route::get('bootstrap-tables', function () {
        return view('tables.bootstrap-tables');
    });
    Route::get('responsive-tables', function () {
        return view('tables.responsive-tables');
    });
    Route::get('editable-tables', function () {
        return view('tables.editable-tables');
    });
    Route::get('inbox', function () {
        return view('inbox.inbox');
    });
    Route::get('inbox-detail', function () {
        return view('inbox.inbox-detail');
    });
    Route::get('compose', function () {
        return view('inbox.compose');
    });
    Route::get('contact', function () {
        return view('inbox.contact');
    });
    Route::get('contact-detail', function () {
        return view('inbox.contact-detail');
    });
    Route::get('calendar', function () {
        return view('extra.calendar');
    });
    Route::get('widgets', function () {
        return view('extra.widgets');
    });
    Route::get('morris-chart', function () {
        return view('charts.morris-chart');
    });
    Route::get('peity-chart', function () {
        return view('charts.peity-chart');
    });
    Route::get('knob-chart', function () {
        return view('charts.knob-chart');
    });
    Route::get('sparkline-chart', function () {
        return view('charts.sparkline-chart');
    });
    Route::get('simple-line', function () {
        return view('icons.simple-line');
    });
    Route::get('fontawesome', function () {
        return view('icons.fontawesome');
    });
    Route::get('map-google', function () {
        return view('maps.map-google');
    });
    Route::get('map-vector', function () {
        return view('maps.map-vector');
    });

    #Permission management
    Route::get('permission-management', 'PermissionController@getIndex');
    Route::get('permission/create', 'PermissionController@create');
    Route::post('permission/create', 'PermissionController@save');
    Route::get('permission/delete/{id}', 'PermissionController@delete');
    Route::get('permission/edit/{id}', 'PermissionController@edit');
    Route::post('permission/edit/{id}', 'PermissionController@update');
    

    #Role management
    Route::get('role-management', 'RoleController@getIndex');
    Route::get('role/create', 'RoleController@create');
    Route::post('role/create', 'RoleController@save');
    Route::get('role/delete/{id}', 'RoleController@delete');
    Route::get('role/edit/{id}', 'RoleController@edit');
    Route::post('role/edit/{id}', 'RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log', 'LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    Route::get('users', 'UsersController@getIndex');
    Route::get('user/create', 'UsersController@create');
    Route::post('user/create', 'UsersController@save');
    Route::get('user/edit/{id}', 'UsersController@edit');
    Route::post('user/edit/{id}', 'UsersController@update');
    Route::get('user/delete/{id}', 'UsersController@delete');
    Route::get('user/deleted/', 'UsersController@getDeletedUsers');
    Route::get('user/restore/{id}', 'UsersController@restoreUser');

});

//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');

#blog routes frontend
// Route::get('/', 'BlogController@getBlogList');
Route::get('blogs/{slug}', 'BlogController@getBlog');
Route::get('blogs/category/{slug}', 'BlogController@getCategoryBlog');
Route::get('blogs/tag/{slug}', 'BlogController@getTagBlog');
Route::get('blogs/author/{slug}', 'BlogController@getAuthorBlog');


Route::get('auth/{provider}/', 'Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout');
Route::resource('category/category', 'Category\\CategoryController');
Auth::routes();

Route::resource('sub-category/sub-category', 'SubCategoryController\\SubCategoryController');
Route::resource('brand', 'BrandController\\BrandController');
// Route::resource('brand', 'BrandController\\BrandController');
// Route::resource('brand', 'BrandController\\BrandController');
// Route::resource('brand', 'BrandController\\BrandController');

Route::get('select-category-type/{category_type_id}', 'SubCategoryController\\SubCategoryController@fetchCategoryBaseList');
Route::get('select-brand-type/{brand_type_id}', 'BannerController\\BannerController@fetchCategoriesList');


Route::resource('product/product', 'ProductController\\ProductController');
Route::get('get-category-by-select-product-type/{product_type_id}', 'ProductController\\ProductController@fetchCategories');
Route::get('get-subcategory-by-select-category-type/{category_type_id}', 'ProductController\\ProductController@fetchSubCategories');
Route::get('get-childSubcategory-by-select-subcategory-type/{subcategory_type_id}', 'ProductController\\ProductController@fetchChildSubCategories');
Route::post('products/sku-combination', 'ProductController\\ProductController@sku_combination')->name('admin.products.sku-combination');
Route::post('products/sku_combination_edit', 'ProductController\\ProductController@sku_combination_edit')->name('admin.products.sku_combination_edit');
Route::post('products/get-color-codes', 'ProductController\\ProductController@getColorCodes');
Route::post('product/product/update/{id}', 'ProductController\\ProductController@update');
Route::post('product/product-sku-check/{sku}', 'ProductController\\ProductController@skuCheck');
Route::post('product/product-sku-update-check/{sku}', 'ProductController\\ProductController@skuUpdateCheck');
Route::post('product/product-coupon-check/{coupon}', 'CouponController\\CouponController@couponCheck');
Route::post('product/product-coupon-update-check/{coupon}', 'CouponController\\CouponController@couponUpdateCheck');





Route::post('uploads', 'ProductController\\ProductController@upload');
Route::get('test', 'ProductController\\ProductController@test');








Route::resource('child-sub-category', 'ChildSubCategory\\ChildSubCategoryController');
Route::resource('banner', 'BannerController\\BannerController');
Route::resource('coupon', 'CouponController\\CouponController');
// Route::resource('coupon', 'CouponController\\CouponController');
Route::resource('discount', 'DiscountController\\DiscountController');

// New Routes 26-05

Route::get('getcategoryforchildsubcat/{id}','ChildSubCategory\\ChildSubCategoryController@GetCategoryForChildSubCategory');
Route::get('getsubcategoryforchildsubcat/{id}','ChildSubCategory\\ChildSubCategoryController@GetSubCategoryForChildSubCategory');


Route::get('admin/reviews', 'ProductController\\ProductController@customerReviews');
Route::get('admin/vendors', 'VendorController@vendorsList');
Route::get('admin/vendor-status-change', 'VendorController@vendorStatusChange');
Route::post('admin/product-stock-status', 'ProductController\\ProductController@stockStatus');




Route::delete('deleteAllBranner', 'BannerController\\BannerController@deleteAll');
Route::delete('deleteAllBrands', 'BrandController\\BrandController@deleteAll');
Route::delete('deleteAllCategory', 'Category\\CategoryController@deleteAll');
Route::delete('deleteAllSubCategory', 'SubCategoryController\\SubCategoryController@deleteAll');
Route::delete('deleteAllChildCategory', 'ChildSubCategory\\ChildSubCategoryController@deleteAll');
Route::delete('deleteAllCoupon', 'CouponController\\CouponController@deleteAll');
Route::delete('deleteAllDiscount', 'DiscountController\\DiscountController@deleteAll');
Route::delete('deleteAllProducts', 'ProductController\\ProductController@deleteAll');
Route::delete('deleteAllSlider', 'Slider\\SliderController@deleteAll');

Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');

Route::get('category/category-banner/{id}','PagesController@categoryBanner');
 
Route::resource('slider/slider', 'Slider\\SliderController');

// CART ROUTES
Route::get('product/product-add-to-cart/{id}','PagesController@addToCart');
Route::get('product/product-remove-from-cart/{id}','PagesController@removeCart');
Route::get('home/get-child-category/{id}','PagesController@getChildCategory');

Route::post('/product/getProduct/','PagesController@getProduct')->name('product.getProduct');
