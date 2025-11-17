<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DynamicController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CustomPaymentController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Auth\UserLogincontroller;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\GeneralsettingsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RoleAndPermissionController;
use App\Models\CustomPayment;

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




Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'login'])->name('login');
    Route::post('login-details-submit', [AdminLoginController::class, 'loginDetailsSubmit'])->name('login-details-submit');
    Route::get('forgot-password', [AdminLoginController::class, 'forgotPasswordForm'])->name('forgot.password');
    Route::post('send-otp', [AdminLoginController::class, 'sendOtp'])->name('send.otp');
    Route::post('otp-verification', [AdminLoginController::class, 'otpVerification'])->name('otp.verification');
    Route::get('reset-password', [AdminLoginController::class, 'resetPasswordform'])->name('reset.password');
    Route::post('reset-password', [AdminLoginController::class, 'resetPassword'])->name('reset.password');


    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('profileform', [AdminController::class, 'profileForm'])->name('profileForm');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::post('update-profile/{id}', [AdminController::class, 'updateProfile'])->name('updateProfile');
        Route::get('user-list', [AdminController::class, 'userList'])->name('user-list');
        Route::get('add-user-form', [AdminController::class, 'addUserForm'])->name('add-user-form');
        Route::post('change-user-status', [AdminController::class, 'changeUserStatus'])->name('change-user-status');
        Route::post('add-user', [AdminController::class, 'addUser'])->name('add-user');
        Route::get('edit-user/{id}', [AdminController::class, 'editUser'])->name('edit-user');
        Route::get('contacts-list', [AdminController::class, 'contactus'])->name('contacts.list');
        Route::get('leads-list', [AdminController::class, 'leadsList'])->name('leads.list');
        Route::post('update-user/{id}', [AdminController::class, 'updateUser'])->name('update-user');
        Route::get('change-user-password/{id}', [AdminController::class, 'changeUserPassword'])->name('change-user-password');
        Route::get('delete-user/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');
        Route::get('add-permission-form', [RoleAndPermissionController::class, 'addPermissionForm'])->name('add-permission-form');
        Route::post('add-permission', [RoleAndPermissionController::class, 'addPermission'])->name('add-permission');
        Route::get('roles', [RoleAndPermissionController::class, 'roleList'])->name('roles');
        Route::get('add-role-form', [RoleAndPermissionController::class, 'addRoleForm'])->name('add-role-form');
        Route::post('add-role', [RoleAndPermissionController::class, 'addRole'])->name('add-role');
        Route::post('change-role-status', [RoleAndPermissionController::class, 'changeRoleStatus'])->name('change-role-status');

         //Faq
        Route::get('faq-list', [FaqController::class, 'faqList'])->name('faq.list');
        Route::get('faq-form', [FaqController::class, 'faqcreate'])->name('faq.form');
        Route::post('faq-add', [FaqController::class, 'faqadd'])->name('faq.add');
        Route::get('faq-edit/{id}', [FaqController::class, 'faqedit'])->name('faq.edit');
        Route::post('faq-update/{id}', [FaqController::class, 'faqupdate'])->name('faq.update');
        Route::get('faq-delete/{id}', [FaqController::class, 'faqdelete'])->name('faq.delete');
        //Blog
         Route::get('blog-list', [BlogController::class, 'index'])->name('blog.list');
         Route::get('blog-form', [BlogController::class, 'create'])->name('blog.form');
         Route::post('blog-form', [BlogController::class, 'store']);
         Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
         Route::put('blog/{id}', [BlogController::class, 'update'])->name('blog.update');
         Route::get('blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

         //testimonial   
        Route::get('testimonial-list', [TestimonialController::class, 'testimoniallisting'])->name('testimonial.list');
        Route::get('testimonial-form', [TestimonialController::class, 'testimonialcreate'])->name('testimonial.form');
        Route::post('testimonial-form', [TestimonialController::class, 'testimonialstore']);
        Route::get('testimonial/edit/{id}', [TestimonialController::class, 'testimonialedit'])->name('testimonial.edit');
        Route::put('testimonial/{id}', [TestimonialController::class, 'testimonialupdate'])->name('testimonial.update');
        Route::get('testimonial/{id}', [TestimonialController::class, 'testimonialdelete'])->name('testimonial.destroy');

        // dynamic
        Route::get('dynamic-list', [DynamicController::class, 'DynamicList'])->name('dynamic.list');
        Route::get('dynamic-add-form', [DynamicController::class, 'DynamicForm'])->name('dynamic.add.form');
        Route::post('dynamic-add', [DynamicController::class, 'DynamicAdd'])->name('dynamic.add');
        Route::get('dynamic-edit/{id}', [DynamicController::class, 'DynamicEdit'])->name('dynamic.edit');
        Route::put('dynamic-update/{id}', [DynamicController::class, 'DynamicUpdate'])->name('dynamic.update');
        Route::get('dynamic-delete/{id}', [DynamicController::class, 'DynamicDelete'])->name('dynamic.delete');

        //gallery
        Route::get('gallery-list', [GalleryController::class, 'galleryllisting'])->name('gallery.list');
        Route::get('gallery-add-form', [GalleryController::class, 'galleryForm'])->name('gallery.add.form');
        Route::post('gallery-add', [GalleryController::class, 'galleryAdd'])->name('gallery.add');
        Route::get('gallery-edit/{id}', [GalleryController::class, 'galleryEdit'])->name('gallery.edit');
        Route::put('gallery-update/{id}', [GalleryController::class, 'galleryUpdate'])->name('gallery.update');
        Route::get('gallery-delete/{id}', [GalleryController::class, 'galleryDelete'])->name('gallery.delete');

        //request-callback
        Route::get('request-callback', [UserController::class, 'requestCallback'])->name('request.callback');
        Route::get('export', [UserController::class, 'requestExport'])->name('request.export');

        //Order Listing and EXPORT
        Route::get('order-list', [OrderController::class, 'orderList'])->name('order.list');
        Route::get('order-export', [OrderController::class, 'orderExport'])->name('order.export');
        Route::get('order-view/{id}', [OrderController::class, 'orderView'])->name('order.view');

        //RATINGS
        Route::get('rating-list', [RatingController::class, 'rating'])->name('rating.list');// routes/web.php
        Route::post('approve-status', [RatingController::class, 'approveStatus'])->name('approve.status');

        //add photo
         Route::get('photo/{id}', [PhotoController::class, 'photo'])->name('photo');
         Route::post('photo/add/{id}', [PhotoController::class, 'photoAdd'])->name('photo.add');
        Route::get('delete/{id}', [PhotoController::class, 'PhotoDelete'])->name('photo.delete');
         
        // banner image
        Route::get('banner', [WebsiteController::class, 'banner'])->name('banner');
        Route::post('update-banner/{id}', [WebsiteController::class, 'updateBanner'])->name('update.banner');
        Route::post('update/user-banner', [WebsiteController::class, 'updateUserBanner'])->name('update.user.banner');
        Route::get('delete-banner/{image}', [WebsiteController::class, 'deleteBanner'])->name('delete.banner');
        Route::get('delete-user-banner/{image}', [WebsiteController::class, 'deleteUserBanner'])->name('delete.user.banner');

        //subscriptions
        Route::prefix('subscriptions')->name('subscriptions.')->group(function () {
            Route::get('/', [AdminController::class, 'subscriptions'])->name('index');
            Route::get('/export', [AdminController::class, 'export'])->name('export');
        });

        //category
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [CategoriesController::class, 'index'])->name('index');
            Route::get('create', [CategoriesController::class, 'create'])->name('create');
            Route::post('store', [CategoriesController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CategoriesController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [CategoriesController::class, 'update'])->name('update');
            Route::get('delete/{id}', [CategoriesController::class, 'destroy'])->name('delete');
            Route::post('update-feature', [CategoriesController::class, 'updateFeature'])->name('update.feature');
        });
        //country
        Route::get('country-list', [CountryController::class, 'countryList'])->name('country.list');
        Route::get('country-edit/{id}', [CountryController::class, 'countryEdit'])->name('country.edit');
        Route::post('country-update/{id}', [CountryController::class, 'countryUpdate'])->name('country.update');
        //course
        Route::prefix('course')->name('course.')->group(function () {
            Route::get('/', [CourseController::class, 'index'])->name('index');
            Route::get('create', [CourseController::class, 'create'])->name('create');
            Route::post('store', [CourseController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CourseController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [CourseController::class, 'update'])->name('update');
            Route::get('delete/{id}', [CourseController::class, 'destroy'])->name('delete');
        });

        //Schedule
        Route::prefix('schedule')->name('schedule.')->group(function () {
            Route::get('/', [ScheduleController::class, 'index'])->name('index');
            Route::get('course/schedules/{id}', [ScheduleController::class, 'courseSchedules'])->name('course.schedules');
            Route::get('create/{id}', [ScheduleController::class, 'create'])->name('create');
            Route::post('store', [ScheduleController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ScheduleController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [ScheduleController::class, 'update'])->name('update');
            Route::get('delete/{id}', [ScheduleController::class, 'destroy'])->name('delete');
        });
        //Coupons
        Route::prefix('coupons')->name('coupons.')->group(function () {
            Route::get('/', [CouponController::class, 'index'])->name('index');
            Route::get('create', [CouponController::class, 'create'])->name('create');
            Route::post('store', [CouponController::class, 'store'])->name('store');
            Route::get('edit/{coupon}', [CouponController::class, 'edit'])->name('edit');
            Route::post('update/{coupon}', [CouponController::class, 'update'])->name('update');
            Route::get('delete/{coupon}', [CouponController::class, 'destroy'])->name('delete');
        });
        // General Settings Routes
        Route::get('general-settings', [GeneralsettingsController::class, 'generalsettingscreate'])->name('general.settings');
        Route::post('generalsettings_form', [GeneralsettingsController::class, 'generalsettingsstore'])->name('general.setting.update');

        Route::get('assign-permissions-to-role/{role_name}', [RoleAndPermissionController::class, 'assignPermissionForm'])->name('assign-permissions-to-role');
        Route::post('assign-permissions', [RoleAndPermissionController::class, 'assignPermissions'])->name('assign-permissions');
        //Spatie Protected Routes
        Route::middleware(['permission'])->group(function () {
        });
    });
});

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('login', [UserLogincontroller::class, 'login'])->name('login');
Route::post('login-details-submit', [UserLogincontroller::class, 'loginDetailsSubmit'])->name('login.details.submit');
Route::get('register', [UserLogincontroller::class, 'register'])->name('register');
Route::post('register-details-submit', [UserLogincontroller::class, 'registerDetailsSubmit'])->name('register.details.submit');
Route::get('get-countries', [UserLogincontroller::class, 'getCountries'])->name('get.countries');
Route::get('get-states', [UserLogincontroller::class, 'getStates'])->name('get.states');


Route::post('subscribe', [UserController::class, 'subscribe'])->name('subscribe');
Route::post('callback', [UserController::class, 'callback'])->name('request.callback');
Route::post('lead', [UserController::class, 'lead'])->name('lead');

Route::get('about', [UserController::class, 'about'])->name('about');

Route::get('blog', [UserController::class, 'userBlog'])->name('blog');
Route::get('blog-details/{slug}', [UserController::class, 'viewBlog'])->name('blog.view');

Route::get('contact', [UserController::class, 'contact'])->name('contact');
Route::post('contact', [UserController::class, 'storeContact'])->name('store.contact');

//CUSTOM PAYMENT PAGE
Route ::get('custom-payment-page',[UserOrderController::class, 'customPayment'])->name('custom.payment');
Route::get('get-courses', [UserOrderController::class, 'getCourses'])->name('get.courses');

Route::get('courses', [UserCourseController::class, 'courseList'])->name('course.list');
Route::get('course-details/{slug}', [UserCourseController::class, 'courseDetails'])->name('course.details');
Route::get('/{slug}', [UserController::class, 'showDynamicPage'])->name('dynamic_content');
Route::get('privacy-policy', [UserDashboardController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('refund-policy', [UserDashboardController::class, 'refundPolicy'])->name('course.policy');


Route::prefix('user')->name('user.')->group(function () {
    Route::get('login', [UserLogincontroller::class, 'login'])->name('login');
    Route::post('login-details-submit', [UserLogincontroller::class, 'loginDetailsSubmit'])->name('login.details.submit');
    Route::get('register', [UserLogincontroller::class, 'register'])->name('register');
    Route::post('register-details-submit', [UserLogincontroller::class, 'registerDetailsSubmit'])->name('register.details.submit');
    Route::get('get-countries', [UserLogincontroller::class, 'getCountries'])->name('get.countries');
    Route::get('get-states', [UserLogincontroller::class, 'getStates'])->name('get.states');
    // User Forgot Password Routes
    Route::get('forgot-password', [UserLogincontroller::class, 'forgotPasswordForm'])->name('forgot.password');
    Route::post('send-otp', [UserLogincontroller::class, 'sendOtp'])->name('send.otp');
    Route::post('otp-verification', [UserLogincontroller::class, 'otpVerification'])->name('otp.verification');
    Route::get('reset-password', [UserLogincontroller::class, 'resetPasswordForm'])->name('reset.password.form');
    Route::post('reset-password', [UserLogincontroller::class, 'resetPassword'])->name('reset.password');


    Route::post('subscribe', [UserController::class, 'subscribe'])->name('subscribe');
    Route::post('callback', [UserController::class, 'callback'])->name('request.callback');
    Route::post('lead', [UserController::class, 'lead'])->name('lead');

    Route::get('blog', [UserController::class, 'userBlog'])->name('blog');
    Route::get('blog-details/{slug}', [UserController::class, 'viewBlog'])->name('blog.view');

    Route::get('contact', [UserController::class, 'contact'])->name('contact');
    Route::post('contact', [UserController::class, 'storeContact'])->name('store.contact');

    Route::get('courses', [UserCourseController::class, 'courseList'])->name('course.list');
    Route::get('details/{slug}', [UserCourseController::class, 'courseDetails'])->name('course.details');
    Route::get('schedule/{slug}', [UserCourseController::class, 'courseSchedule'])->name('course.schedule');
    Route::post('/set-country', [UserCourseController::class, 'setCountry'])->name('set.country');

    Route::get('/search-courses', [UserCourseController::class, 'searchCourses'])->name('search.course');

    Route::get('order-summary/{id}', [UserOrderController::class, 'orderSummary'])->name('order.summary');

    Route::middleware(['auth:web'])->group(function () {
        //Protected Route start
        Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('view-order/{id}', [UserDashboardController::class, 'viewOrder'])->name('view.order');
        Route::get('order-invoice/{id}', [UserDashboardController::class, 'orderInvoice'])->name('order.invoice');
        Route::post('update-basic', [UserDashboardController::class, 'updateBasic'])->name('update.basic');
        Route::post('update-contact', [UserDashboardController::class, 'updateContact'])->name('update.contact');
        Route::post('update-password', [UserDashboardController::class, 'updatePassword'])->name('update.password');
        Route::post('add-review-ratings', [UserDashboardController::class, 'addReviewRatings'])->name('add.review.ratings');
        Route::get('logout', [UserController::class, 'logout'])->name('logout');
        //live search filter using ajax
        Route::get('/search-order', [UserDashboardController::class, 'searchOrder'])->name('search.order');
    });
});

Route::get('payment', [PaymentController::class, 'paymentForm'])->name('payment.form');
Route::post('/create-order', [PaymentController::class, 'createOrder'])->name('order.create');
Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession'])->name('checkout.session');
Route::get('/stripe/success', [PaymentController::class, 'success'])->name('stripe.success');
Route::get('/stripe/cancel', [PaymentController::class, 'cancel'])->name('stripe.cancel');
Route::post('/apply-coupon', [PaymentController::class, 'applyCoupon'])->name('apply.coupon');


// Route::post('payment-submit', [PaymentController::class, 'paymentSubmit'])->name('payment.submit');