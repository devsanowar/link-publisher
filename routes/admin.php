<?php

use App\Models\LinkBuildingPackage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CtaController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FounderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\OurStoryController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\BlocklistController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\NewslatterController;
use App\Http\Controllers\Admin\SeoServiceController;
use App\Http\Controllers\Admin\SocialIconController;
use App\Http\Controllers\Admin\VisitorLogController;
use App\Http\Controllers\Admin\WhyChoseUsController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\PromobannerController;
use App\Http\Controllers\Admin\AboutPageCtaController;
use App\Http\Controllers\Admin\LinkBuildingController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\ReturnrefundController;
use App\Http\Controllers\Admin\WebsiteColorController;
use App\Http\Controllers\Admin\BuildBacklinkController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\PrivacypolicyController;
use App\Http\Controllers\Admin\AboutPageAboutController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\AboutLinkBuilderController;
use App\Http\Controllers\Admin\TermsAdnCondiotnController;
use App\Http\Controllers\Admin\LinkBuildingReasonController;
use App\Http\Controllers\Admin\LinkBuildingPackageController;
use App\Http\Controllers\Admin\LinkBuildingProcessController;
use App\Http\Controllers\Admin\LinkBuildingSolutionController;
use App\Http\Controllers\Admin\WhyChoseusLinkBuilderController;

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        // Dashboard
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard/data', [AdminController::class, 'filterDashboardData'])->name('admin.dashboard.filter');

    // User Management
    Route::prefix('user')->group(function () {
        Route::get('create', [UserController::class, 'userCreate'])->name('user.create');
        Route::post('store', [UserController::class, 'storeUser'])->name('user.store');
        Route::get('{id}/edit', [UserController::class, 'edit'])->name('edit.user');
        Route::post('{id}/update', [UserController::class, 'updateUser'])->name('update.user');
        Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
        Route::post('profile/{id}/image', [UserController::class, 'profileImageUpdate'])->name('update.profile.image');
        Route::post('password/{id}/change', [UserController::class, 'passwordUpdate'])->name('update.password');
        Route::delete('delete/{id}', [UserController::class, 'destroyUser'])->name('user.destroy');

        Route::get('/customer-list/', [UserController::class, 'customerList'])->name('customerList');
    });

    // Website Settings
    Route::prefix('website')->group(function () {
        Route::get('setting', [WebsiteSettingController::class, 'websiteSetting'])->name('website_setting');

        Route::post('setting/update', [WebsiteSettingController::class, 'websiteSettingUpdate'])->name('website_setting.update');

        Route::post('bredcrumb/update', [WebsiteSettingController::class, 'bredcrumbUpdate'])->name('bredcrumb.update');

        Route::post('google-map/update', [WebsiteSettingController::class, 'googleMapUpdate'])->name('googlemap.update');

        Route::post('footer-info/update', [WebsiteSettingController::class, 'footerInfoSettingUpdate'])->name('website_footer_info.update');

        Route::get('social-icon', [SocialIconController::class, 'socialIcon'])->name('website_social_icon.index');
        Route::post('social-icon/update', [SocialIconController::class, 'socialIconUpdate'])->name('website_social_icon.update');
    });

    // Admin Panel Settings
    Route::prefix('admin-panel')->group(function () {
        Route::get('setting', [AdminPanelController::class, 'adminPanelSetting'])->name('admin_panel_setting');
        Route::post('setting/update', [AdminPanelController::class, 'adminPanelSettingUpdate'])->name('admin_panel_setting.update');
    });

    // Home Page Sections
    Route::prefix('home-page')->group(function () {
        // Sliders
        Route::prefix('slider')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('slider.index');
            Route::get('create', [SliderController::class, 'create'])->name('slider.create');
            Route::post('store', [SliderController::class, 'store'])->name('slider.store');
            Route::get('edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
            Route::put('update/{id}', [SliderController::class, 'update'])->name('slider.update');
            Route::delete('destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
        });

        // Brand
        Route::resource('brand', BrandController::class);
        Route::post('/brand/status-change', [BrandController::class, 'brandChangeStatus'])->name('brand.status');

        // About
        Route::get('about', [AboutController::class, 'index'])->name('about.index');
        Route::post('about/update', [AboutController::class, 'update'])->name('about.update');

        // Why chose us

        Route::get('why-to-chose-link-publisher', [WhyChoseUsController::class, 'index'])->name('whychoseus.index');
        Route::post('why-to-chose-link-publisher/update', [WhyChoseUsController::class, 'update'])->name('whychoseus.update');

        // Services
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
        Route::post('/services/update/{id}', [ServiceController::class, 'update'])->name('services.update');
        Route::post('/services/delete/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

        // Achievement
        Route::resource('achievement', AchievementController::class);

        // Reviews
        Route::resource('review', ReviewController::class);

        // FAQs
        Route::resource('faq', FaqController::class);

        //Banner
        Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
        Route::post('banner/update', [BannerController::class, 'update'])->name('banner.update');

        //Promo banner
        Route::get('/promobanner', [PromobannerController::class, 'index'])->name('promobanner.index');
        Route::post('/promobanner/store', [PromobannerController::class, 'store'])->name('promobanner.store');
        Route::put('/promobanner/update', [PromobannerController::class, 'update'])->name('promobanner.update');
        Route::delete('/promobanner/delete/{id}', [PromobannerController::class, 'destroy'])->name('promobanner.destroy');
        Route::post('/promobanner/status-change', [PromobannerController::class, 'PromoBannerChangeStatus'])->name('promobanner.status');

        // Cta routes here
        Route::resource('cta', CtaController::class);
        Route::post('/cta/status-change', [CtaController::class, 'ctaChangeStatus'])->name('cta.status');
    });

    // About Page
    Route::prefix('about-page')->group(function () {
        Route::get('/', [AboutPageController::class, 'index'])->name('about_page.page');
        Route::post('/about/company/update', [AboutPageAboutController::class, 'update'])->name('about.company.update');
        Route::get('/company/story', [OurStoryController::class, 'index'])->name('company.story.index');
        Route::post('/company-story/update-section-one', [OurStoryController::class, 'updateSectionOne'])->name('company.story.updateOne');
        Route::post('/company-story/update-section-two', [OurStoryController::class, 'updateSectionTwo'])->name('company.story.updateTwo');
        Route::post('/company-story/update-section-three', [OurStoryController::class, 'updateSectionThree'])->name('company.story.updateThree');

        Route::get('cta', [AboutPageCtaController::class, 'index'])->name('about_page.cta.index');
        Route::post('cta/update', [AboutPageCtaController::class, 'update'])->name('about_page.cta.update');

        

        route::prefix('founder')->group(function(){
            Route::get('/', [FounderController::class, 'index'])->name('founder.index');
            Route::get('/create', [FounderController::class, 'create'])->name('founder.create');
            Route::post('/store', [FounderController::class, 'store'])->name('founder.store');
            Route::get('/edit/{id}', [FounderController::class, 'edit'])->name('founder.edit');
            Route::post('/update', [FounderController::class, 'update'])->name('founder.update');
            Route::delete('/destroy', [FounderController::class, 'destroy'])->name('founder.destroy');
        });

        route::prefix('team')->group(function(){
            route::get('/', [TeamController::class, 'index'])->name('team.index');
            route::get('/create', [TeamController::class, 'create'])->name('team.create');
            route::post('/store', [TeamController::class, 'store'])->name('team.store');
            route::get('/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
            route::post('/update', [TeamController::class, 'update'])->name('team.update');
            Route::delete('/destroy', [TeamController::class, 'destroy'])->name('team.destroy');
            Route::post('/status-change', [TeamController::class, 'teamChangeStatus'])->name('team.status');
        });

        
        Route::post('/chairman/mission/update', [AboutPageController::class, 'missionUpdate'])->name('mission.update');
        Route::post('/chairman/vision/update', [AboutPageController::class, 'visionUpdate'])->name('vision.update');
    });


    Route::prefix('services')->group(function () {

        Route::prefix('link-building')->group(function () {
            Route::get('/', [LinkBuildingController::class, 'index'])->name('link_building.index');
            
            Route::prefix('about-link-building')->group(function () {
                Route::post('/update', [AboutLinkBuilderController::class, 'update'])->name('link_building.update');
            });

            Route::prefix('link-building-packages')->group(function () {
                Route::get('/', [LinkBuildingPackageController::class, 'index'])->name('link_building.packages.index');
                Route::get('/create', [LinkBuildingPackageController::class, 'create'])->name('link_building.packages.create');
                Route::post('/store', [LinkBuildingPackageController::class, 'store'])->name('link_building.packages.store');
                Route::get('/edit/{id}', [LinkBuildingPackageController::class, 'edit'])->name('link_building.packages.edit');
                Route::post('/update', [LinkBuildingPackageController::class, 'update'])->name('link_building.packages.update');
                Route::delete('/destroy', [LinkBuildingPackageController::class, 'destroy'])->name('link_building.packages.destroy');
                Route::post('/status-change', [LinkBuildingPackageController::class, 'packageChangeStatus'])->name('package.status');
            });

            Route::prefix('why-chose-link-building-agency')->group(function () {
                Route::get('/', [WhyChoseusLinkBuilderController::class, 'index'])->name('whychose.link_builder.index');
                Route::get('/create', [WhyChoseusLinkBuilderController::class, 'create'])->name('whychose.link_builder.create');
                Route::post('/store', [WhyChoseusLinkBuilderController::class, 'store'])->name('whychose.link_builder.store');
                Route::get('/edit/{id}', [WhyChoseusLinkBuilderController::class, 'edit'])->name('whychose.link_builder.edit');
                Route::post('/update', [WhyChoseusLinkBuilderController::class, 'update'])->name('whychose.link_builder.update');
                Route::delete('/destroy', [WhyChoseusLinkBuilderController::class, 'destroy'])->name('whychose.link_builder.destroy');
                Route::post('/status-change', [WhyChoseusLinkBuilderController::class, 'whyChosaeLinkBuildingStatus'])->name('whychose.link_builder.status');
            });

            Route::prefix('build-backlinks')->group(function () {
                Route::get('/', [BuildBacklinkController::class, 'index'])->name('build.backlink.index');
                Route::post('/update', [BuildBacklinkController::class, 'update'])->name('build.backlink.update');
            });

            Route::prefix('link-building-process')->group(function(){
                Route::get('/', [LinkBuildingProcessController::class, 'index'])->name('link.building.process.index');
                Route::get('/create', [LinkBuildingProcessController::class, 'create'])->name('link.building.process.create');
                Route::post('/store', [LinkBuildingProcessController::class, 'store'])->name('link.building.process.store');
                Route::get('/edit/{id}', [LinkBuildingProcessController::class, 'edit'])->name('link.building.process.edit');
                Route::post('/update', [LinkBuildingProcessController::class, 'update'])->name('link.building.process.update');
                Route::delete('/destroy', [LinkBuildingProcessController::class, 'destroy'])->name('link.building.process.destroy');
                Route::post('/status-change', [LinkBuildingProcessController::class, 'linkProcessChangeStatus'])->name('link.building.process.status');
            });

            Route::prefix('link-building-solution')->group(function(){
                Route::get('/', [LinkBuildingSolutionController::class, 'index'])->name('link.building.solution.index');
                Route::post('/update', [LinkBuildingSolutionController::class, 'update'])->name('link.building.solution.update');
            });

            Route::prefix('link-building-reason')->group(function(){
                Route::get('/', [LinkBuildingReasonController::class, 'index'])->name('link.building.reason.index');
                route::post('/update', [LinkBuildingReasonController::class, 'update'])->name('link.building.reason.update');

                // Link building reason feature
                Route::post('/reatures/store', [LinkBuildingReasonController::class, 'featureStore'])->name('link.building.reason.features.store');

                Route::get('/feature/{id}', [LinkBuildingReasonController::class, 'edit'])->name('link-building-reason.edit');
                Route::put('/feature/{id}/update', [LinkBuildingReasonController::class, 'updateReason'])->name('link-building-reason.update');

                Route::delete('feature/destroy/', [LinkBuildingReasonController::class, 'destroy'])->name('link-building-reason.destroy');

            });

        });

    });

    // Order routes Here
    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    Route::get('orders-show/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::delete('orders-destroy/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/admin/filter-order', [OrderController::class, 'orderFilter'])->name('filter.orders');
    Route::post('/order/change-status/{id}', [OrderController::class, 'orderChangeStatus'])->name('orderChangeStatus');

    Route::get('trashed-order', [OrderController::class, 'trashedData'])->name('trashed_order.index');
    Route::get('restore-order/{id}', [OrderController::class, 'restoreData'])->name('order.restore');
    Route::delete('order/force-delete/{id}', [OrderController::class, 'forceDeleteData'])->name('order.forceDelete');

    // payment method routes here
    Route::get('payment_method', [PaymentMethodController::class, 'index'])->name('payment_method.index');
    Route::get('payment-method/create', [PaymentMethodController::class, 'create'])->name('payment_method.create');
    Route::post('payment-method/create', [PaymentMethodController::class, 'store'])->name('payment_method.store');
    Route::get('payment-method/edit/{id}', [PaymentMethodController::class, 'edit'])->name('payment_method.edit');
    Route::put('payment-method/update/{id}', [PaymentMethodController::class, 'update'])->name('payment_method.update');
    Route::delete('payment-method/delete/{id}', [PaymentMethodController::class, 'destroy'])->name('payment_method.destroy');
    Route::post('/payment-method/status-change', [PaymentMethodController::class, 'paymentMethodChangeStatus'])->name('payment_method.status');

    // Post Category
    Route::get('/post-category/', [PostCategoryController::class, 'index'])->name('post_category.index');
    Route::post('/post-category/store', [PostCategoryController::class, 'store'])->name('post_category.store');
    Route::post('/post-category/update', [PostCategoryController::class, 'update'])->name('post_category.update');
    Route::delete('/post-category/delete/{id}', [PostCategoryController::class, 'destroy'])->name('post_category.destroy');
    Route::post('/post-category/status-change/', [PostCategoryController::class, 'statusChange'])->name('post_category.status');
    Route::post('/post-category/status-change', [PostCategoryController::class, 'changeStatus'])->name('post_category.status');

    // Posts
    Route::resource('post', PostController::class);
    Route::post('/post/status-change', [PostController::class, 'postChangeStatus'])->name('post.status');

    // Contact form message route
    Route::get('message', [InboxController::class, 'index'])->name('inboxed_message');
    Route::get('message-show/{id}', [InboxController::class, 'show'])->name('message.show');
    Route::delete('message/delete/{id}', [InboxController::class, 'destroy'])->name('message.destroy');

    // Newsletter
    Route::get('Newslatter', [NewslatterController::class, 'index'])->name('newslatter');
    Route::get('Newslatter/destroy/{id}', [NewslatterController::class, 'destroy'])->name('newslatter.destroy');

    // block list routes
    Route::get('block-list', [BlocklistController::class, 'index'])->name('block.list');
    Route::post('store-blocklist', [BlocklistController::class, 'store'])->name('block.number');
    Route::delete('/unblock/{id}', [BlocklistController::class, 'unblock'])->name('unblock.number');

    // Privacy policy route
    Route::get('privacy-policy', [PrivacypolicyController::class, 'privacyPolicy'])->name('privacy_policy');
    Route::put('/privacy-policy/{id}', [PrivacypolicyController::class, 'update'])->name('privacy_policy.update');

    //Return and refund
    Route::get('return-refund', [ReturnrefundController::class, 'returnRefund'])->name('return_refund');
    Route::put('/return-refund/update/{id}', [ReturnrefundController::class, 'update'])->name('return_refund.update');

    // Terms And Condition
    Route::get('/terms-and-condition', [TermsAdnCondiotnController::class, 'termsAndCondition'])->name('terms_and_condtion');
    Route::put('/terms-and-condition/update/{id}', [TermsAdnCondiotnController::class, 'update'])->name('terms_and_conditon.update');

    // Website Color routes
    Route::get('website-color', [WebsiteColorController::class, 'edit'])->name('website_color.edit');
    Route::put('/website-color/update/{id}', [WebsiteColorController::class, 'update'])->name('website_color.update');

    // Seo Service routes
    Route::prefix('seo-service')->group(function(){
        Route::get('/', [SeoServiceController::class, 'index'])->name('seo_service.index');
        Route::get('/create', [SeoServiceController::class, 'create'])->name('seo_service.create');
        Route::post('/store', [SeoServiceController::class, 'store'])->name('seo_service.store');
        Route::get('/edit/{id}', [SeoServiceController::class, 'edit'])->name('seo_service.edit');
        Route::post('/update', [SeoServiceController::class, 'update'])->name('seo_service.update');
        Route::delete('/destroy/', [SeoServiceController::class, 'destroy'])->name('seo_service.destroy');
    });

});

Route::middleware(['visitorlogger'])->group(function () {
    Route::get('/visitor-logs', [VisitorLogController::class, 'index'])->name('visitors.index');
});
