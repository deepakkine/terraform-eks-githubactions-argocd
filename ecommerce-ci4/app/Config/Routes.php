<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Product::index');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('product/list', 'Admin\Product::index');
    $routes->get('product/add', 'Admin\Product::create');
    $routes->post('product/save', 'Admin\Product::store');
    $routes->get('product/edit/(:num)', 'Admin\Product::edit/$1');
    $routes->post('product/update/(:num)', 'Admin\Product::update/$1');
    $routes->get('product/delete/(:num)', 'Admin\Product::delete/$1');
    $routes->get('product/toggle/(:num)', 'Admin\Product::toggle/$1');

    $routes->get('order/list', 'Admin\Order::index');
    $routes->get('order/view/(:num)', 'Admin\Order::view/$1');
    $routes->post('order/status/(:num)', 'Admin\Order::updateStatus/$1');

    $routes->get('category/list', 'Admin\Category::index');
    $routes->get('category/add', 'Admin\Category::create');
    $routes->post('category/save', 'Admin\Category::store');
    $routes->get('category/edit/(:num)', 'Admin\Category::edit/$1');
    $routes->post('category/update/(:num)', 'Admin\Category::update/$1');
    $routes->get('category/delete/(:num)', 'Admin\Category::delete/$1');

    $routes->get('banner', 'Admin\HomeBanner::index');
    $routes->get('banner/create', 'Admin\HomeBanner::create');
    $routes->post('banner/store', 'Admin\HomeBanner::store');
    $routes->get('banner/delete/(:num)', 'Admin\HomeBanner::delete/$1');
    $routes->get('banner/edit/(:num)', 'Admin\HomeBanner::edit/$1');
    $routes->post('banner/update/(:num)', 'Admin\HomeBanner::update/$1');
    $routes->post('banner/sort', 'Admin\HomeBanner::sort');

    $routes->get('coupons', 'Admin\Coupon::index');
    $routes->get('coupon/create', 'Admin\Coupon::create');
    $routes->post('coupon/store', 'Admin\Coupon::store');
    $routes->get('coupon/edit/(:num)', 'Admin\Coupon::edit/$1');
    $routes->post('coupon/update/(:num)', 'Admin\Coupon::update/$1');
    $routes->get('coupon/delete/(:num)', 'Admin\Coupon::delete/$1');


    $routes->get('promo-banner', 'Admin\PromoBannerController::index');
    $routes->get('promo-banner/create', 'Admin\PromoBannerController::create');
    $routes->post('promo-banner/store', 'Admin\PromoBannerController::store');
    $routes->get('promo-banner/edit/(:num)', 'Admin\PromoBannerController::edit/$1');
    $routes->post('promo-banner/update/(:num)', 'Admin\PromoBannerController::update/$1');
    $routes->get('promo-banner/delete/(:num)', 'Admin\PromoBannerController::delete/$1');
});

$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::saveRegister');
$routes->get('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->post('/login', 'Auth::checkLogin');


$routes->group('cart', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Cart::index');
    $routes->get('add/(:num)', 'Cart::add/$1');
    $routes->get('remove/(:num)', 'Cart::remove/$1');
    $routes->post('update', 'Cart::update');
});

$routes->get('/checkout', 'Checkout::index', ['filter' => 'auth']);
$routes->post('/checkout/place', 'Checkout::placeOrder', ['filter' => 'auth']);

$routes->get('/orders', 'Order::index', ['filter' => 'auth']);
$routes->get('/orders/(:num)', 'Order::view/$1', ['filter' => 'auth']);

$routes->get('/cart/count', 'Cart::count');
$routes->get('/wishlist/list', 'Wishlist::list');

$routes->get('/wishlist/toggle/(:num)', 'Wishlist::toggle/$1');
$routes->get('/wishlist/list', 'Wishlist::getUserWishlist');


$routes->get('/wishlist', 'Wishlist::index');

$routes->get('/product/(:any)', 'Product::view/$1');


$routes->post('/cart/apply-coupon', 'Cart::applyCoupon');
$routes->get('/cart/remove-coupon', 'Cart::removeCoupon');

$routes->get('/category/(:any)', 'Product::category/$1');
