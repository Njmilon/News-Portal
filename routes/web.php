<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SocialLinkController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\WebsiteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


//frontend home
Route::get('/',[HomeController::class,'Index'])->name('index');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('backend.contents.index');
})->name('dashboard');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');



//__admin category all route__//
Route::get('/category/index',[CategoryController::class,'Index'])->name('category.index');
Route::get('/category/create/index',[CategoryController::class,'CreateIndex'])->name('category.create.index');
Route::post('/category/create',[CategoryController::class,'Create'])->name('category.create');
Route::get('/category/edit/{id}',[CategoryController::class,'Edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'Update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'Delete'])->name('category.delete');


//__admin subcategory all route__//
Route::get('/subcategory/index',[SubCategoryController::class,'Index'])->name('subcategory.index');
Route::get('/subcategory/create/index',[SubCategoryController::class,'CreateIndex'])->name('subcategory.create.index');
Route::post('/subcategory/create',[SubCategoryController::class,'Create'])->name('subcategory.create');
Route::get('/subcategory/edit/{id}',[SubCategoryController::class,'Edit'])->name('subcategory.edit');
Route::post('/subcategory/update/{id}',[SubCategoryController::class,'Update'])->name('subcategory.update');
Route::get('/subcategory/delete/{id}',[SubCategoryController::class,'Delete'])->name('subcategory.delete');



//__admin district all route__//
Route::get('/district/index',[DistrictController::class,'Index'])->name('district.index');
Route::get('/district/create/index',[DistrictController::class,'CreateIndex'])->name('district.create.index');
Route::post('/district/create',[DistrictController::class,'Create'])->name('district.create');
Route::get('/district/edit/{id}',[DistrictController::class,'Edit'])->name('district.edit');
Route::post('/district/update/{id}',[DistrictController::class,'Update'])->name('district.update');
Route::get('/district/delete/{id}',[DistrictController::class,'Delete'])->name('district.delete');



//__admin district all route__//
Route::get('/subdistrict/index',[SubDistrictController::class,'Index'])->name('subdistrict.index');
Route::get('/subdistrict/create/index',[SubDistrictController::class,'CreateIndex'])->name('subdistrict.create.index');
Route::post('/subdistrict/create',[SubDistrictController::class,'Create'])->name('subdistrict.create');
Route::get('/subdistrict/edit/{id}',[SubDistrictController::class,'Edit'])->name('subdistrict.edit');
Route::post('/subdistrict/update/{id}',[SubDistrictController::class,'Update'])->name('subdistrict.update');
Route::get('/subdistrict/delete/{id}',[SubDistrictController::class,'Delete'])->name('subdistrict.delete');


//__admin subcategory & subdistrict json route__//
Route::get('/get/subcategory/{category_id}',[NewsPostController::class,'GetSubCategory']);
Route::get('/get/subdistrict/{district_id}',[NewsPostController::class,'GetSubDistrict']);


//__admin news post all route__//
Route::get('/post/index',[NewsPostController::class,'Index'])->name('news.post.index');
Route::get('/post/create/index',[NewsPostController::class,'PostCreateIndex'])->name('news.post.create.index');
Route::post('/post/create',[NewsPostController::class,'PostCreate'])->name('news.post.create');
Route::get('/post/edit/{id}',[NewsPostController::class,'Edit'])->name('news.post.edit');
Route::post('/post/update/{id}',[NewsPostController::class,'Update'])->name('news.post.update');
Route::get('/post/delete/{id}',[NewsPostController::class,'Delete'])->name('news.post.delete');


//__admin social setting all route__//
Route::get('/social/edit',[SocialLinkController::class,'EditSocial'])->name('social.link.edit');
Route::post('/social/update',[SocialLinkController::class,'UpdateSocial'])->name('social.link.update');

//__admin seo setting all route__//
Route::get('/seo/edit',[SocialLinkController::class,'EditSeo'])->name('seo.link.edit');
Route::post('/seo/update',[SocialLinkController::class,'UpdateSeo'])->name('seo.link.update');


//__prayer time setting all route__//
Route::get('/prayer/edit',[SocialLinkController::class,'EditPrayer'])->name('prayer.link.edit');
Route::post('/prayer/update',[SocialLinkController::class,'UpdatePrayer'])->name('prayer.link.update');



//__live tv setting all route__//
Route::get('/livetv/edit',[SocialLinkController::class,'EditLiveTv'])->name('livetv.link.edit');
Route::post('/livetv/update',[SocialLinkController::class,'UpdateLiveTv'])->name('livetv.link.update');
Route::get('/livetv/set/offline',[SocialLinkController::class,'SetOffline'])->name('set.offline');
Route::get('/livetv/set/online',[SocialLinkController::class,'SetOnline'])->name('set.online');


//__project notice setting all route__//
Route::get('/notice/edit',[SocialLinkController::class,'EditNotice'])->name('notice.link.edit');
Route::post('/notice/update',[SocialLinkController::class,'UpdateNotice'])->name('notice.link.update');
Route::get('/notice/set/offline',[SocialLinkController::class,'NoticeSetOffline'])->name('notice.set.offline');
Route::get('/notice/set/online',[SocialLinkController::class,'NoticeSetOnline'])->name('notice.set.online');



//__Important websites all route__//
Route::get('/website/index',[WebsiteController::class,'Index'])->name('website.index');
Route::get('/website/create/index',[WebsiteController::class,'CreateIndex'])->name('website.create.index');
Route::post('/website/create/store',[WebsiteController::class,'CreateStore'])->name('website.create.store');
Route::get('/website/edit/{id}',[WebsiteController::class,'Edit'])->name('website.edit');
Route::post('/website/update/store/{id}',[WebsiteController::class,'UpdateStore'])->name('website.update.store');
Route::get('/website/delete/{id}',[WebsiteController::class,'Delete'])->name('website.delete');



//__Photo gallery all route__//
Route::get('/photo/gallery/index',[GalleryController::class,'PhotoIndex'])->name('photo.gallery.index');
Route::get('/photo/gallery/create/index',[GalleryController::class,'PhotoCreateIndex'])->name('photo.gallery.create.index');
Route::post('/photo/gallery/create',[GalleryController::class,'PhotoCreate'])->name('photo.gallery.create');
Route::get('/photo/gallery/edit/{id}',[GalleryController::class,'PhotoEdit'])->name('photo.gallery.edit');
Route::post('/photo/gallery/update/{id}',[GalleryController::class,'PhotoUpdate'])->name('photo.gallery.update');
Route::get('/photo/gallery/delete/{id}',[GalleryController::class,'PhotoDelete'])->name('photo.gallery.delete');



//__Video gallery all route__//
Route::get('/video/gallery/index',[GalleryController::class,'VideoIndex'])->name('video.gallery.index');
Route::get('/video/gallery/create/index',[GalleryController::class,'VideoCreateIndex'])->name('video.gallery.create.index');
Route::post('/video/gallery/create',[GalleryController::class,'VideoCreate'])->name('video.gallery.create');
Route::get('/video/gallery/edit/{id}',[GalleryController::class,'VideoEdit'])->name('video.gallery.edit');
Route::post('/video/gallery/update/{id}',[GalleryController::class,'VideoUpdate'])->name('video.gallery.update');
Route::get('/video/gallery/delete/{id}',[GalleryController::class,'VideoDelete'])->name('video.gallery.delete');


//__ads all route__//
Route::get('/all/ads/index',[AdsController::class,'AdsIndex'])->name('all.ads.index');
Route::get('/all/ads/create/index',[AdsController::class,'AdsCreateIndex'])->name('all.ads.create.index');
Route::post('/all/ads/create',[AdsController::class,'AdsCreate'])->name('all.ads.create');
Route::get('/ads/delete/{id}',[AdsController::class,'AdsDelete'])->name('single.ads.delete');


//__user role all route__//
Route::get('/create/user/role/index',[RoleController::class,'RoleCreateIndex'])->name('create.role.index');
Route::post('/store/user/role',[RoleController::class,'StoreRole'])->name('store.user.role');
Route::get('/user/role/index',[RoleController::class,'Index'])->name('user.role.index');




                            //__Frontend Route__//

//for language version
Route::get('/language/bangla',[HomeController::class,'Bangla'])->name('language.bangla');//for bangla
Route::get('/language/english',[HomeController::class,'English'])->name('language.english');//for english

//for single page
Route::get('/details/news/{id}',[HomeController::class,'SinglePage'])->name('design.single.page');


//for category all post page
Route::get('/category/all/news/{id}',[HomeController::class,'SingleCategory'])->name('category.single.news.page');


//for subcategory all post page
Route::get('/subcategory/all/news/{id}',[HomeController::class,'SingleSubCategory'])->name('subcategory.single.news.page');