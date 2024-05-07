<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Agent\AgentItemController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DataWebController;
use App\Http\Controllers\FrontEnd\IndexController;
use App\Http\Controllers\FrontEnd\PerbandinganController;
use App\Http\Controllers\FrontEnd\SavedController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QnAController;
use App\Http\Controllers\Server\BlogController;
use App\Http\Controllers\server\PropertyController;
use App\Http\Controllers\UserController;
use DeepCopy\Matcher\PropertyTypeMatcher;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Mail\SampleEmail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.index');
});

//Frontend client side

Route::get('/', [UserController::class, 'Index'])->name('user.index');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::controller(SavedController::class)->group(function() {
        Route::get('/user/item/tersimpan', 'GetTersimpan')->name('user.item.tersimpan');
        Route::get('/user/get/tersimpan', [SavedController::class, 'GetTersimpanData']);
        Route::post('/unsave-item/{id}', [SavedController::class, 'UnsaveItem']);
    });

    Route::controller(PerbandinganController::class)->group(function() {
        Route::get('/user/item/banding', 'GetBanding')->name('user.item.banding');
        Route::get('/user/get/tersimpan', 'GetBandingData');
        Route::post('/hapus-item/{id}', 'HapusItem');
    });

    Route::controller(BlogController::class)->group(function() {
        Route::post('/blog/tambah/komentar', [BlogController::class, 'TambahKomentar'])->name('blog.tambah.komentar');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/profile/password', [UserController::class, 'UserProfilePassword'])->name('user.profile.password');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
    Route::get('/user/req/jadwal', [UserController::class, 'UserReqJadwal'])->name('user.req.jadwal');

});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/profile/password', [AdminController::class, 'AdminProfilePassword'])->name('admin.profile.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');


}); //End Group Admin mw to protect that it wont go to another role's dashboard

Route::middleware(['auth', 'verified', 'role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    Route::get('/agent/logout',[AgentController::class, 'AgentLogout'])->name('agent.logout');
    Route::get('/agent/profile',[AgentController::class, 'AgentProfile'])->name('agent.profile');
    Route::post('/agent/profile/update',[AgentController::class, 'AgentProfileUpdate'])->name('agent.profile.update');
    Route::get('/agent/password',[AgentController::class, 'AgentPassword'])->name('agent.password');
    Route::post('/agent/password/update',[AgentController::class, 'AgentPasswordUpdate'])->name('agent.password.update');

    Route::get('/agent/qna',[AgentController::class, 'AgentGetQnA'])->name('agent.qna');
    Route::get('/agent/qnaAll',[AgentController::class, 'AgentGetAllQnA'])->name('agent.qnaAll');
    Route::get('/agent/qna/baca/{id}',[AgentController::class, 'AgentGetSingleQnA'])->name('agent.qna.baca');
    Route::post('/agent/qna/reply',[AgentController::class, 'AgentReply'])->name('agent.qna.reply');

    //agent.qna.reply


    Route::get('/agent/schedule/request', [AgentController::class, 'RequestJadwal'])->name('agent.jadwal.tour');
    Route::get('/agent/schedule/detail/{id}', [AgentController::class, 'ViewJadwal'])->name('agent.jadwal.detail');
    Route::get('/agent/schedule/hapus/{id}', [AgentController::class, 'HapusJadwal'])->name('agent.jadwal.hapus');

    Route::post('/agent/schedule/confirm', [AgentController::class, 'ConfirmJadwal'])->name('agent.jadwal.confirm');
    // Route::get('/agent/schedule/hapus', [AgentController::class, 'RequestJadwal'])->name('agent.jadwal.hapus');
}); //End Group Agent mw


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login');
Route::get('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');
Route::post('/agent/register/register', [AgentController::class, 'RegisterData'])->name('agent.register.register');


Route::middleware(['auth', 'verified', 'role:admin'])->group(function(){
    Route::controller(PropertyController::class)->group(function() {
        Route::get('/admin/property', 'GetAll')->name('admin.property');
        Route::get('/property/tambah', 'Add')->name('property.tambah');
        Route::post('/property/tambah/data', 'AddData')->name('property.tambah.data');

        Route::get('/property/edit/{id}', 'Edit')->name('property.edit');
        Route::post('/property/edit/data', 'EditData')->name('property.edit.data');

        Route::get('/property/hapus/{id}', 'Hapus')->name('property.hapus');

    });

    Route::get('/admin/qna',[AdminController::class, 'AdminGetQnA'])->name('admin.qna');
    Route::post('/admin/qna/reply',[AdminController::class, 'AdminReply'])->name('admin.qna.reply');
    Route::get('/admin/qnaAll',[AdminController::class, 'AdminGetAllQnA'])->name('admin.qnaAll');
    Route::get('/admin/contactus',[AdminController::class, 'AdminGetContactUs'])->name('admin.contactus');

    Route::get('/admin/qna/baca/{id}',[AdminController::class, 'AdminGetSingleQnA'])->name('admin.qna.baca');
    Route::get('/admin/contact/baca/{id}',[AdminController::class, 'AdminGetSingleContact'])->name('admin.contactus.baca');


    
    Route::get('/admin/jadwal', [AdminController::class, 'RequestSemuaJadwal'])->name('admin.jadwal');
    Route::get('/admin/semuaJadwal/detail/{id}', [AdminController::class, 'ViewJadwal'])->name('admin.jadwal.detail');
    Route::get('/agent/semuaJadwal/hapus/{id}', [AdminController::class, 'HapusJadwal'])->name('admin.jadwal.hapus');


    Route::controller(AmenitiesController::class)->group(function() {
        
        Route::get('/admin/amenity', 'GetAll')->name('admin.amenity');
        Route::get('/amenity/tambah', 'Add')->name('amenity.tambah');
        Route::post('/amenity/tambah/data', 'AddData')->name('amenity.tambah.data');

        Route::get('/amenity/edit/{id}', 'Edit')->name('amenity.edit');
        Route::post('/amenity/edit/data', 'EditData')->name('amenity.edit.data');

        Route::get('/amenity/hapus/{id}', 'Hapus')->name('amenity.hapus');

    });

    Route::controller(DataWebController::class)->group(function() {
        
        Route::get('/data/web', 'DataWeb')->name('data.web');
        Route::post('update/data/web', 'updateDataWeb')->name('update.data.web');

    });

    Route::controller(ItemController::class)->group(function() {

        Route::get('/admin/item', 'GetAll')->name('admin.item');
        Route::get('/item/tambah', 'Add')->name('item.tambah');
        Route::post('/item/tambah/data', 'AddData')->name('item.tambah.data');

        Route::get('/item/edit/{id}', 'Edit')->name('item.edit');
        Route::post('/item/edit/data', 'EditData')->name('item.edit.data');

        Route::get('/item/hapus/{id}', 'Hapus')->name('item.hapus');

        Route::post('/item/edit/multi', 'EditMultiImage')->name('item.edit.multi');
        Route::get('/item/multi/hapus/{id}', 'HapusMultiImage')->name('item.multi.hapus');
        Route::post('/item/tambah/multi', 'TambahMultiImage')->name('item.tambah.multi');


        Route::post('/item/edit/fasilitas}', 'EditFasilitas')->name('item.edit.fasilitas');


        Route::get('/item/rinci/{id}', 'Rinci')->name('item.rinci');
        Route::post('/item/rinci/inactive', 'EditInactive')->name('item.rinci.inactive');
        Route::post('/item/rinci/active', 'EditActive')->name('item.rinci.active');
    
    });

    Route::controller(AgentController::class)->group(function() {
        
        Route::get('/admin/agent', 'GetAll')->name('admin.agent');
        Route::get('/agent/ditambah', 'Tambah')->name('agent.tambah');
        Route::post('/agent/tambah/data', 'TambahData')->name('agent.tambah.data');
        Route::get('/agent/edit/{id}', 'Edit')->name('agent.edit');
        Route::post('/agent/edit/data', 'EditData')->name('agent.edit.data');
        Route::get('/agent/hapus/{id}', 'Hapus')->name('agent.hapus');
        Route::get('/agent/activate/{id}', 'ActivateAgent')->name('agent.activate');
        Route::get('/agent/inactivate/{id}', 'InactivateAgent')->name('agent.inactivate');

    });

    Route::controller(BlogController::class)->group(function() {
        Route::get('/admin/tipe_blog', 'GetAll')->name('admin.tipe_blog');
        Route::get('/tipe_blog/tambah', 'Add')->name('tipe_blog.tambah');
        Route::post('/tipe_blog/tambah/data', 'AddData')->name('tipe_blog.tambah.data');

        Route::get('/tipe_blog/edit/{id}', 'Edit')->name('tipe_blog.edit');
        Route::post('/tipe_blog/edit/data', 'EditData')->name('tipe_blog.edit.data');

        Route::get('/tipe_blog/hapus/{id}', 'Hapus')->name('tipe_blog.hapus');


        Route::get('/post/all/type', 'GetAllPost')->name('post.all.type');
        Route::get('/post/tambah', 'AddPost')->name('post.tambah');
        Route::post('/post/publish/data', 'PublishPost')->name('post.publish.data');
        Route::get('/post/edit/{id}', 'EditPost')->name('post.edit.page');
        Route::post('/post/edit/data', 'EditPublishPost')->name('post.edit.data');
        Route::get('/post/hapus/{id}', 'HapusPost')->name('post.hapus');

        Route::get('/admin/comment', 'GetAllComment')->name('admin.comment');
        Route::get('/comment/balas/{id}', 'Balas')->name('comment.balas');
        Route::post('/comment/publish/balas', 'PublishBalas')->name('comment.publish.balas');

    });

});


Route::middleware(['auth', 'verified', 'role:agent'])->group(function(){
    Route::controller(AgentItemController::class)->group(function() {
        Route::get('/agent/all/item', 'GetAllProperty')->name('agent.all.item');
        Route::get('/agent/item/tambah', 'Add')->name('agent.item.tambah');
        Route::post('/agent/item/tambah/data', 'AddData')->name('agent.item.tambah.data');

        Route::get('/agent/item/edit/{id}', 'Edit')->name('agent.item.edit');
        Route::post('/agent/item/edit/data', 'EditData')->name('agent.item.edit.data');

        Route::get('/agent/item/hapus/{id}', 'Hapus')->name('agent.item.hapus');

        Route::post('/agent/item/edit/multi', 'EditMultiImage')->name('agent.item.edit.multi');
        Route::get('/agent/item/multi/hapus/{id}', 'HapusMultiImage')->name('agent.item.multi.hapus');
        Route::post('/agent/item/tambah/multi', 'TambahMultiImage')->name('agent.item.tambah.multi');


        Route::post('/agent/item/edit/fasilitas}', 'EditFasilitas')->name('agent.item.edit.fasilitas');


        Route::get('/agent/item/rinci/{id}', 'Rinci')->name('agent.item.rinci');
        Route::post('/agent/item/rinci/inactive', 'EditInactive')->name('agent.item.rinci.inactive');
        Route::post('/agent/item/rinci/active', 'EditActive')->name('agent.item.rinci.active');

    
    });

});


Route::get('/item/details/{id}/{slug}', [IndexController::class, 'ItemDetail'])->name('frontend.item.detail');
Route::get('/item/sewa', [IndexController::class, 'itemSewa'])->name('frontend.item.sewa');
Route::get('/item/jual', [IndexController::class, 'itemJual'])->name('frontend.item.jual');
Route::get('/item/tipe/daftar', [IndexController::class, 'daftarTipe'])->name('frontend.item.daftar_tipe');
Route::get('/item/tipe/{id}', [IndexController::class, 'tipeItem'])->name('frontend.item.tipe');
Route::post('/item/cari/jual', [IndexController::class, 'cariJual'])->name('item.cari.jual');
Route::post('/item/cari/sewa', [IndexController::class, 'cariSewa'])->name('item.cari.sewa');
Route::post('/item/cari/semua', [IndexController::class, 'cariSemua'])->name('item.cari.semua');





Route::post('/save-item/{id}', [SavedController::class, 'SaveItem']);
Route::post('/banding-item/{id}', [PerbandinganController::class, 'BandingItem']);
Route::controller(QnAController::class)->group(function() {
    Route::post('/item/detail/qna', 'sendMessage')->name('item.detail.qna');
});

Route::get('agent/tentang/{id}',[IndexController::class, 'TentangAgen'])->name('agent.tentang');
Route::get('agent/list',[IndexController::class, 'DaftarAgen'])->name('agent.list');
Route::get('agent/cari', [IndexController::class, 'CariAgen'])->name('agent.cari');
Route::post('/agent/detail/qna', [IndexController::class, 'sendMessage'])->name('agent.detail.qna');
Route::post('/schedule', [IndexController::class, 'schedule'])->name('schedule');
Route::get('/blog/detail/{slug}', [IndexController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blog/cat/list/{id}', [IndexController::class, 'blogCategory']);
Route::get('/blog', [IndexController::class, 'AllBlog'])->name('blog.all');
Route::get('/about', [IndexController::class, 'About'])->name('user.about');
Route::get('/contactus', [IndexController::class, 'Contact'])->name('user.contact');
Route::post('/send/contact', [IndexController::class, 'SendContact'])->name('send.contact');








