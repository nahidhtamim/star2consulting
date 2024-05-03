<?php

use App\Http\Controllers\Admin\BlogControlController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\FontSizeController;
use App\Http\Controllers\Admin\GiveawayController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\ProductControlController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SliderControlController;
use App\Http\Controllers\Admin\TestimonialControlController;
use App\Http\Controllers\Admin\TextControlController;
use App\Http\Controllers\Admin\UserControlController;
use App\Http\Controllers\Admin\WebContentControlController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index'])->name('welcome');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/mission', [FrontendController::class, 'mission'])->name('mission');
Route::get('/vision', [FrontendController::class, 'vision'])->name('vision');
Route::get('/csr', [FrontendController::class, 'csr'])->name('csr');
Route::get('/powerskills', [FrontendController::class, 'powerskills'])->name('powerskills');
Route::get('/corporate-giveaways', [FrontendController::class, 'corporateGiveaways'])->name('corporate.giveaways');
Route::get('/faculties', [FrontendController::class, 'faculties'])->name('faculties');
Route::get('/testimonials', [FrontendController::class, 'testimonials'])->name('testimonials');
Route::get('/solutions', [FrontendController::class, 'solutions'])->name('solutions');
Route::get('/solution-details/{slug}', [FrontendController::class, 'solutionDetails'])->name('solution.details');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/career', [FrontendController::class, 'career'])->name('career');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/submit-application', [FrontendController::class, 'submitApplication']);
Route::post('/send-email', [MailController::class, 'contactMail'])->name('contact.send');

// Route::get('/',[HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes(['login' => false, 'register' => false]);
Route::get('admin-do-create', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
Route::post('admin-do-create', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');

Route::get('admin-do-login', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::post('admin-do-login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::group(['middleware' => ['auth','is_admin']], function () {

    Route::get('/admin/dashboard',[HomeController::class, 'adminIndex'])->name('admin.dashboard');
    Route::post('/update-password', [UserControlController::class, 'updatePassword'])->name('update.password');
    
    Route::post('/admin/add-font',[FontSizeController::class, 'saveFont'])->name('save.font');
    Route::get('/admin/edit-font/{id}',[FontSizeController::class, 'editFont'])->name('edit.font');
    Route::post('/admin/update-font/{id}',[FontSizeController::class, 'updateFont'])->name('update.font');

    //======================= Slider Routes =======================//
    Route::get('/admin/view-sliders',[SliderControlController::class, 'viewSliders'])->name('admin.sliders');
    Route::post('/admin/add-slider',[SliderControlController::class, 'saveSlider'])->name('save.slider');
    Route::get('/admin/edit-slider/{id}',[SliderControlController::class, 'editSlider'])->name('edit.slider');
    Route::post('/admin/update-slider/{id}',[SliderControlController::class, 'updateSlider'])->name('update.slider');
    Route::get('/admin/delete-slider/{id}',[SliderControlController::class, 'deleteSlider'])->name('delete.slider');
    Route::get('/admin/make-slider-active/{id}', [SliderControlController::class, 'activeSlider'])->name('active.slider');
    Route::get('/admin/make-slider-deactive/{id}', [SliderControlController::class, 'deactiveSlider'])->name('deactive.slider');

    //======================= Product Routes =======================//
    Route::get('/admin/view-products',[ProductControlController::class, 'viewProducts'])->name('admin.products');
    Route::post('/admin/add-product',[ProductControlController::class, 'saveProduct'])->name('save.product');
    Route::get('/admin/edit-product/{id}',[ProductControlController::class, 'editProduct'])->name('edit.product');
    Route::post('/admin/update-product/{id}',[ProductControlController::class, 'updateProduct'])->name('update.product');
    Route::get('/admin/delete-product/{id}',[ProductControlController::class, 'deleteProduct'])->name('delete.product');
    Route::get('/admin/make-product-active/{id}', [ProductControlController::class, 'activeProduct'])->name('active.product');
    Route::get('/admin/make-product-deactive/{id}', [ProductControlController::class, 'deactiveProduct'])->name('deactive.product');
    
    //======================= Job Routes =======================//
    Route::get('/admin/view-jobs',[JobsController::class, 'viewJobs'])->name('admin.jobs');
    Route::post('/admin/add-job',[JobsController::class, 'saveJob'])->name('save.job');
    Route::get('/admin/edit-job/{id}',[JobsController::class, 'editJob'])->name('edit.job');
    Route::post('/admin/update-job/{id}',[JobsController::class, 'updateJob'])->name('update.job');
    Route::get('/admin/delete-job/{id}',[JobsController::class, 'deleteJob'])->name('delete.job');
    Route::get('/admin/make-job-active/{id}', [JobsController::class, 'activeJob'])->name('active.job');
    Route::get('/admin/make-job-deactive/{id}', [JobsController::class, 'deactiveJob'])->name('deactive.job');

    //======================= Text Routes =======================//
    Route::get('/admin/view-texts',[TextControlController::class, 'viewTexts'])->name('admin.texts');
    Route::post('/admin/add-text',[TextControlController::class, 'saveText'])->name('save.text');
    Route::get('/admin/edit-text/{id}',[TextControlController::class, 'editText'])->name('edit.text');
    Route::post('/admin/update-text/{id}',[TextControlController::class, 'updateText'])->name('update.text');
    Route::get('/admin/delete-text/{id}',[TextControlController::class, 'deleteText'])->name('delete.text');
    Route::get('/admin/make-text-active/{id}', [TextControlController::class, 'activeText'])->name('active.text');
    Route::get('/admin/make-text-deactive/{id}', [TextControlController::class, 'deactiveText'])->name('deactive.text');
    
    //======================= Skill Routes =======================//
    Route::get('/admin/view-skills',[SkillController::class, 'viewSkills'])->name('admin.skills');
    Route::post('/admin/add-skill',[SkillController::class, 'saveSkill'])->name('save.skill');
    Route::get('/admin/edit-skill/{id}',[SkillController::class, 'editSkill'])->name('edit.skill');
    Route::post('/admin/update-skill/{id}',[SkillController::class, 'updateSkill'])->name('update.skill');
    Route::get('/admin/delete-skill/{id}',[SkillController::class, 'deleteSkill'])->name('delete.skill');
    Route::get('/admin/make-skill-active/{id}', [SkillController::class, 'activeSkill'])->name('active.skill');
    Route::get('/admin/make-skill-deactive/{id}', [SkillController::class, 'deactiveSkill'])->name('deactive.skill');
    
    //================= Web Content Routes ==================//
    Route::get('/admin/view-web-contents',[WebContentControlController::class, 'viewWebContents'])->name('admin.web.contents');
    Route::post('/admin/add-web-content',[WebContentControlController::class, 'saveWebContent'])->name('save.web.content');
    Route::get('/admin/edit-web-content/{id}',[WebContentControlController::class, 'editWebContent'])->name('edit.web.content');
    Route::post('/admin/update-web-content/{id}',[WebContentControlController::class, 'updateWebContent'])->name('update.web.content');
    Route::get('/admin/make-web-content-active/{id}', [WebContentControlController::class, 'activeWebContent'])->name('active.web.content');
    Route::get('/admin/make-web-content-deactive/{id}', [WebContentControlController::class, 'deactiveWebContent'])->name('deactive.web.content');

    //================= Tuto Vlog Routes ==================//
    Route::get('/admin/view-blogs',[BlogControlController::class, 'viewBlogs'])->name('admin.blogs');
    Route::post('/admin/add-blog',[BlogControlController::class, 'saveBlog'])->name('save.blog');
    Route::get('/admin/edit-blog/{id}',[BlogControlController::class, 'editBlog'])->name('edit.blog');
    Route::post('/admin/update-blog/{id}',[BlogControlController::class, 'updateBlog'])->name('update.blog');
    Route::get('/admin/delete-blog/{id}',[BlogControlController::class, 'deleteBlog'])->name('delete.blog');
    Route::get('/admin/make-blog-active/{id}', [BlogControlController::class, 'activeBlog'])->name('active.blog');
    Route::get('/admin/make-blog-deactive/{id}', [BlogControlController::class, 'deactiveBlog'])->name('deactive.blog');
    
    //================= Testimonial Routes ==================//
    Route::get('/admin/view-testimonials',[TestimonialControlController::class, 'viewTestimonials'])->name('admin.testimonials');
    Route::post('/admin/add-testimonial',[TestimonialControlController::class, 'saveTestimonial'])->name('save.testimonial');
    Route::get('/admin/edit-testimonial/{id}',[TestimonialControlController::class, 'editTestimonial'])->name('edit.testimonial');
    Route::post('/admin/update-testimonial/{id}',[TestimonialControlController::class, 'updateTestimonial'])->name('update.testimonial');
    Route::get('/admin/delete-testimonial/{id}',[TestimonialControlController::class, 'deleteTestimonial'])->name('delete.testimonial');
    Route::get('/admin/make-testimonial-active/{id}', [TestimonialControlController::class, 'activeTestimonial'])->name('active.testimonial');
    Route::get('/admin/make-testimonial-deactive/{id}', [TestimonialControlController::class, 'deactiveTestimonial'])->name('deactive.testimonial');


    //================= Faculty Routes ==================//
    Route::get('/admin/view-faculties',[FacultyController::class, 'viewFaculties'])->name('admin.faculties');
    Route::post('/admin/add-faculty',[FacultyController::class, 'saveFaculty'])->name('save.faculty');
    Route::get('/admin/delete-faculty/{id}',[FacultyController::class, 'deleteFaculty'])->name('delete.faculty');
    
    //================= Giveaway Routes ==================//
    Route::get('/admin/view-giveaways',[GiveawayController::class, 'viewGiveaways'])->name('admin.giveaways');
    Route::post('/admin/add-giveaway',[GiveawayController::class, 'saveGiveaway'])->name('save.giveaway');
    Route::get('/admin/delete-giveaway/{id}',[GiveawayController::class, 'deleteGiveaway'])->name('delete.giveaway');
});

 Route::get('/license',[FrontendController::class, 'license']);
 Route::get('/terms-condition',[FrontendController::class, 'terms'])->name('terms');
 Route::get('/privacy-policy',[FrontendController::class, 'privacy'])->name('privacy');

// Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.dashboard')->middleware('is_admin');