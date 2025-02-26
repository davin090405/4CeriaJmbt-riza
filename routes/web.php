<?php
use App\Http\Controllers\Index;
use App\Http\Controllers\CariRumahController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Index::class, 'index'])->name('index');



Route::get('/dashboard', [HouseController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('cariRumah');

Route::get('/dashboard/getRegion/{provinceId}', [HouseController::class, 'getRegion'])->middleware(['auth', 'verified'])->name('dashboard-getRegions');

//house
Route::middleware(['permission:house-view'])->group(function(){
    Route::get('/houses_list', [HouseController::class, 'displayAll'])->name('houses-list');
});

//users
Route::middleware(['permission:user-view'])->group(function(){
    Route::get('/users_list', [UserController::class, 'display'])->name('users.list');
    Route::get('/user_edit_form/{id}', [UserController::class, 'formEdit'])->name('user.edit.form');
});
Route::middleware(['permission:user-edit'])->group(function(){
    Route::put('/user-edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
});

//roles
Route::middleware(['permission:role-view'])->group(function(){
    Route::get('/roles', [RoleController::class, 'index'])->name('role.list');
    Route::get('/roles/view/{id}', [RoleController::class, 'view'])->name('role.view');
});
Route::middleware(['permission:role-create'])->group(function(){
    Route::get('/roles/create', [RoleController::class, 'roleCreateForm'])->name('role.create.form');
    Route::post('/roles/create/post', [RoleController::class, 'createRole'])->name('role.create');
});
Route::middleware(['permission:role-edit'])->group(function(){
    Route::get('/roles/view/{id}', [RoleController::class, 'view'])->name('role.view');
    Route::put('/role/edit/{id}', [RoleController::class, 'editRole'])->name('role.edit');
});
Route::middleware(['permission:role-delete'])->group(function(){
    Route::delete('/role/delete/{id}', [RoleController::class, 'destroyRole'])->name('role.destroy');
});

//permissions
Route::middleware(['permission:permission-view'])->group(function(){
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.list');
});

Route::middleware(['permission:permission-create'])->group(function(){
    Route::get('/permissions/create', [PermissionController::class, 'createPermissionForm'])->name('permission.create.form');
    Route::post('/permissions/create/post', [PermissionController::class, 'createPermission'])->name('permission.create');
});
//contact
Route::middleware(['permission:contact-view'])->group(function(){
    Route::get('/contact', [ContactController::class, 'contactList'])->name('contact.list');
});

Route::middleware(['permission:contact-create'])->group(function(){
    Route::get('/contact/create', [ContactController::class, 'contactCreateForm'])->name('contact.create.form');
    Route::post('/contact/create/post', [ContactController::class, 'contactCreate'])->name('contact.create');
});
Route::middleware(['permission:contact-edit'])->group(function(){
    Route::get('/contact/view/{id}', [ContactController::class, 'contactView'])->name('contact.view');
    Route::put('/contact/edit/{id}', [ContactController::class, 'contactEdit'])->name('contact.edit');
});


Route::middleware('auth')->group(function () {

    Route::get('/house/view/{id}', [HouseController::class, 'viewHouse'])->name('house.view');
    Route::get('/profile/{tab}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/add_phone_number', [ProfileController::class, 'addPhoneNumber'])->name('profile.addPhoneNumber');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/delete_phone_number/{id}', [ProfileController::class, 'deletePhoneNumber'])->name('phoneNumber.destroy');
    Route::put('/profile/edit_phone_number/{id}', [ProfileController::class, 'editPhoneNumber'])->name('update.phoneNumber');
    


    //houses
    
    Route::get('/create_house_form', [HouseController::class, 'formCreateHouse'])->name('house.create.form');
    Route::post('/create_house', [HouseController::class, 'createHouse'])->name('house.create');
    Route::get('/house_edit_form/{id}',[HouseController::class, 'formEditHouse'])->name('house.edit.form');
    Route::put('/house/edit/{id}', [HouseController::class, 'editHouse'])->name('house.edit');
    Route::get('/house/list', [HouseController::class, 'displayOwnedHouse'])->name('user-houses-list');
    Route::delete('/house/delete/{id}', [HouseController::class, 'destroyHouse'])->name('user-house-delete');
    Route::get('/detail_house/{id}', [HouseController::class, 'displayDetail'])->name('house.detail');

    Route::get('/create_house_detail_form/{id}', [HouseController::class, 'formCreateDimension'])->name('house.detail.dimension.create.form');
    Route::put('/create_house_detail/{id}', [HouseController::class, 'createDimension'])->name('house.detail.dimension.create');
    Route::put('/house/detail/edit/{id}', [HouseController::class, 'editDimension'])->name('house.detail.dimension.edit');
    Route::put('/house/detail/delete/{id}', [HouseController::class, 'destroyDimension'])->name('house.detail.dimension.delete');

    Route::get('/house/room/detail/{id}', [HouseController::class, 'displayRoomDetail'])->name('house.room.detail');
    Route::put('/house/room/edit/{id}', [HouseController::class, 'editRoom'])->name('house.room.edit');
    Route::post('/house/room/create', [HouseController::class, 'createRoom'])->name('house.room.create');
    Route::post('/house/room/picUp/{id}',[HouseController::class, 'createRoomPic'])->name('house.room.pic.create');
    Route::delete('/house/room/picDel/{id}',[HouseController::class, 'destroyRoomPic'])->name('house.room.pic.delete');
    
    Route::get('/house_address_create/{id}', [HouseController::class, 'formCreateAddress'])->name('house.address.create.form');
    Route::patch('/house/add_address/{id}',[HouseController::class, 'createAddress'])->name('house.address.create');
    Route::delete('/house/address/delete/{id}', [HouseController::class, 'destroyAddress'])->name('house.address.delete');

    Route::post('/house/pic/upload/{id}', [HouseController::class, 'createHousePic'])->name('house.pic.create');
    Route::delete('/house/pic/delete/{id}', [HouseController::class, 'destroyHousePic'])->name('house.pic.delete');

    Route::get('/search-province', [ProvinceController::class, 'searchProvince']);
    Route::get('/search-city', [CityController::class, 'searchCity']);
});



require __DIR__.'/auth.php';

