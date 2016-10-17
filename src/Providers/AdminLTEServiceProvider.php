<?php

namespace Edujugon\AdminLTE\Providers;

use Illuminate\Support\ServiceProvider;

class PushNotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishDependencies();
        $this->publishViews();
        $this->publishLanguages();
        $this->publishCompanyDetails();

    }

    /**
     *Publish AdminLTE Dependencies
     */
    public function publishDependencies()
    {

        $base = base_path('/vendor/almasaeed2010/adminlte/');

        $bootstrap = 'bootstrap';
        $dist = 'dist';
        $plugins = 'plugins';

        $this->publishes([
            $base.$bootstrap => public_path('adminLTE/'.$bootstrap),
            $base.$dist => public_path('adminLTE/'.$dist),
            $base.$plugins => public_path('adminLTE/'.$plugins),
        ], 'adminLTE_dependencies');


    }

    /**
     *Publish AdminLTE Views
     */
    public function publishViews()
    {
        $base = __DIR__.'/../views/';

        $this->publishes([
            $base => resource_path('views'),
        ],'adminLTE_views');
    }

    /**
     *Publish AdminLTE Languages
     * Language files and Controller
     */
    public function publishLanguages()
    {
        $baseLang = __DIR__.'/../lang/';
        $baseControllers = __DIR__.'/../Controllers/';

        $en = 'en/custom.php';
        $es = 'es';
        $languageController = 'LanguageController.php';

        $this->publishes([
           $baseLang . $en =>  resource_path('lang/'.$en),
           $baseLang . $es =>  resource_path('lang/es'),
           $baseControllers . $languageController =>  app_path('Http/Controllers/'.$languageController),
        ],'adminLTE_languages');
    }

    /**
     *Publish AdminLTE Company file
     * All company data in one place.
     */
    public function publishCompanyDetails()
    {

        $base = __DIR__ . '/../Config/';
        $company = 'company.php';

        $this->publishes([
           $base . $company => config_path($company)
        ],'adminLTE_config');
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}