<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\IndexComponent;
use App\Http\Livewire\Admin\CategoryComponent;
use App\Http\Livewire\Admin\ProductComponent;
use App\Http\Livewire\Admin\PropertiesComponent;
use App\Http\Livewire\Admin\OrdersComponent;
use App\Http\Livewire\Admin\UserComponent;
use App\Http\Livewire\Admin\LoginComponent;
use App\Http\Livewire\Admin\VoucherComponent;
use App\Http\Livewire\Admin\StatisticsComponent;

use App\View\Components\AddressComponent;

use App\Http\Livewire\Customer\IndexComponent as Customer_Index;
use App\Http\Livewire\Customer\LoginComponent as Customer_Login;
use App\Http\Livewire\Customer\AccountComponent as Customer_Account;
use App\Http\Livewire\Customer\ProductComponent as Customer_Product;
use App\Http\Livewire\Customer\CartComponent as Customer_Cart;
use App\Http\Livewire\Customer\CheckoutComponent as Customer_Checkout;

use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;

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
Route::get('error', [PageController::class, 'error'])->name('error');

Route::group(['middleware' => 'auth_admin'], function() {
	Route::get('index-ad', [IndexComponent::class, 'render'])->name('index-ad');
	Route::get('danh-muc', [CategoryComponent::class, 'render'])->name('danh-muc');

	Route::get('san-pham-ban-chay', [StatisticsComponent::class, 'render'])->name('san-pham-ban-chay');
	Route::get('thong-ke-don-hang', [StatisticsComponent::class, 'thong_ke_don_hang'])->name('thong-ke-don-hang');
	Route::get('loc-don-hang', [StatisticsComponent::class, 'loc_don_hang'])->name('loc-don-hang');
	Route::get('thong-ke-doanh-thu', [StatisticsComponent::class, 'thong_ke_doanh_thu'])->name('thong-ke-doanh-thu');
	Route::get('loc-doanh-thu', [StatisticsComponent::class, 'loc_doanh_thu'])->name('loc-doanh-thu');


	Route::get('gui-voucher/{id}', [VoucherComponent::class, 'gui_voucher'])->name('gui-voucher');
	Route::post('guivoucher', [VoucherComponent::class, 'guivoucher'])->name('guivoucher');

	Route::post('danhsachuser', [VoucherComponent::class, 'danhsachuser'])->name('danhsachuser');

});



Route::post('them-danh-muc', [CategoryComponent::class, 'them_danh_muc'])->name('them-danh-muc');
Route::post('danh-muc-cha', [CategoryComponent::class, 'danh_muc_cha'])->name('danh-muc-cha');
Route::get('sua-danh-muc/{id}', [CategoryComponent::class, 'sua_danh_muc'])->name('sua-danh-muc');
Route::post('suadanhmuc', [CategoryComponent::class, 'suadanhmuc'])->name('suadanhmuc');
Route::get('xoa-danh-muc/{id}', [CategoryComponent::class, 'xoa_danh_muc'])->name('xoa-danh-muc');

Route::get('san-pham', [ProductComponent::class, 'render'])->name('san-pham');
Route::get('them-san-pham', [ProductComponent::class, 'them_san_pham'])->name('them-san-pham');
Route::post('themsanpham', [ProductComponent::class, 'themsanpham'])->name('themsanpham');
Route::get('xoa-san-pham/{id}', [ProductComponent::class, 'xoa_san_pham'])->name('xoa-san-pham');
Route::get('san-pham-noi-bat/{id}', [ProductComponent::class, 'san_pham_noi_bat'])->name('san-pham-noi-bat');
Route::get('huy-noi-bat/{id}', [ProductComponent::class, 'huy_noi_bat'])->name('huy-noi-bat');



Route::get('chi-tiet-san-pham/{id}', [ProductComponent::class, 'chi_tiet_san_pham'])->name('chi-tiet-san-pham');
Route::post('thembienthe', [ProductComponent::class, 'thembienthe'])->name('thembienthe');
Route::post('doianhbia', [ProductComponent::class, 'doianhbia'])->name('doianhbia');
Route::post('themanh', [ProductComponent::class, 'themanh'])->name('themanh');

Route::get('cac-thuoc-tinh', [PropertiesComponent::class, 'render'])->name('cac-thuoc-tinh');
Route::post('themmausac', [PropertiesComponent::class, 'themmausac'])->name('themmausac');
Route::post('themkichco', [PropertiesComponent::class, 'themkichco'])->name('themkichco');

Route::get('don-hang', [OrdersComponent::class, 'render'])->name('don-hang');
Route::get('chi-tiet-don-hang/{id}', [OrdersComponent::class, 'chi_tiet'])->name('chi_tiet-don-hang');
Route::get('duyet-don-hang/{id}', [OrdersComponent::class, 'duyet_don_hang'])->name('duyet-don-hang');

Route::get('thanh-vien', [UserComponent::class, 'render'])->name('thanh-vien');
Route::get('them-thanh-vien', [UserComponent::class, 'them_thanh_vien'])->name('them-thanh-vien');
Route::post('themthanhvien', [UserComponent::class, 'themthanhvien'])->name('themthanhvien');

Route::get('dang-nhap', [LoginComponent::class, 'render'])->name('dang-nhap');
Route::post('dangnhap', [PageController::class, 'dangnhap'])->name('dangnhap');
Route::get('dang-xuat', [PageController::class, 'dang_xuat'])->name('dang-xuat');

Route::get('voucher', [VoucherComponent::class, 'render'])->name('voucher');
Route::post('themvoucher', [VoucherComponent::class, 'themvoucher'])->name('themvoucher');

Route::group(['middleware' => 'auth'], function() {
	Route::get('account', [Customer_Account::class, 'render'])->name('account');
	Route::get('cart', [Customer_Cart::class, 'render'])->name('cart');
	Route::get('del-cart-item/{id}', [Customer_Cart::class, 'del_cart_item'])->name('del-cart-item');
	Route::get('order-detail/{id}', [Customer_Account::class, 'order_detail'])->name('order-detail');
	Route::get('cancel-order/{id}', [Customer_Product::class, 'cancel_order'])->name('cancel-order');


});

Route::get('index', [Customer_Index::class, 'render'])->name('index');
Route::get('login_signup', [Customer_Login::class, 'render'])->name('login_signup');
Route::post('signup', [Customer_Login::class, 'signup'])->name('signup');
Route::post('quanhuyen', [Customer_Login::class, 'quanhuyen'])->name('quanhuyen');
Route::post('phuongxa', [Customer_Login::class, 'phuongxa'])->name('phuongxa');
Route::post('login', [CustomerController::class, 'login'])->name('login');

Route::post('updateaccount', [Customer_Account::class, 'updateaccount'])->name('updateaccount');
Route::get('product/{id}', [Customer_Product::class, 'render'])->name('product');
Route::get('product-list/{id}', [Customer_Product::class, 'product_list'])->name('product-list');

Route::post('search', [Customer_Product::class, 'search'])->name('search');
Route::post('review', [Customer_Product::class, 'review'])->name('review');

Route::get('cart', [Customer_Cart::class, 'render'])->name('cart');

Route::get('checkout', [Customer_Checkout::class, 'render'])->name('checkout');

Route::post('kichco', [Customer_Product::class, 'kichco'])->name('kichco');
Route::post('soluong', [Customer_Product::class, 'soluong'])->name('soluong');
Route::post('checkout', [Customer_Product::class, 'checkout'])->name('checkout');
Route::post('checkout_end', [Customer_Checkout::class, 'checkout'])->name('checkout_end');



Route::post('newadress', [AddressComponent::class, 'newadress'])->name('newadress');

Route::post('test', [Customer_Product::class, 'test'])->name('test');