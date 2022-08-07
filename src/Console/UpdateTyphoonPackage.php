<?php

namespace HappyToDev\Typhoon\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UpdateTyphoonPackage extends Command
{
    protected $signature = 'typhoon:update';

    protected $description = 'Update the Typhoon CMS';

    public function handle()
    {
        $this->info('Updating TyphoonCMS Package...');

        $typhoonVersionNumber = $this->askActualTyphoonVersionNumber();
        $this->info('Your previous Typhoon version number was ' . $typhoonVersionNumber);

        // Deploying Typhoon Components
        $this->info('>>> Publishing components...');
        $this->publishComponents();

        // Write CSS
        $this->info('>>> Writing CSS...');
        $this->writeCss();

        // Write JS
        $this->info('>>> Writing Js...');
        $this->writeJs();

        // publish configuration file
        // $this->info('>>> Publishing configuration file...');
        // $this->publishConfiguration(true);
        // $this->info('>>> Publishing configuration : done');

        // // publish interface files
        // $this->info('>>> Publishing interfaces files...');
        // $this->publishInterfaces(true);
        // $this->info('>>> Publishing interfaces : done');

        // // publish repositories files
        // $this->info('>>> Publishing repositories files...');
        // $this->publishRepositories(true);
        // $this->info('>>> Publishing repositories : done');

        // // publish RepositoryServiceProvider.php file
        // $this->info('>>> Publishing RepositoryServiceProvider.php files...');
        // $this->publishRepositoryServiceProvider(true);
        // $this->info('>>> Publishing RepositoryServiceProvider.php : done');

        // publish Langs files
        $this->info('>>> Publishing Langs files...');
        $this->publishLangs(true);
        $this->info('>>> Publishing Langs : done');


        // Launch optimize and link
        $this->info('>>> Optimizing and linking ...');
        $this->optimizeAndLink();
        $this->info('>>> Optimizing and linking  : done');

        // // Installation of filament-comments package
        // $this->info('>>> Installing filament-comments package...');
        // $this->installFilamentComments();
        // $this->info('>>> Installing filament-comments : done');

        // // FilamentSocialNetworks with Orbit
        // $this->info('>>> Configure filament-social-networks with Orbit...');
        // $this->filamentSocialNetworksOrbit();
        // $this->info('>>> Configure filament-social-networks with Orbit : done');

        // // FilamentSocialNetworks Assets
        // $this->info('>>> Publishing filament-social-networks assets...');
        // $this->filamentSocialNetworksAssets();
        // $this->info('>>> Publishing filament-social-networks assets : done');

        // // Filament Navigation Assets
        // $this->info('>>> Publishing filament-navigation assets...');
        // $this->publishFilamentNavigationAssets(true);
        // $this->info('>>> Publishing filament-navigation assets : done');

        // // Replace initial laravel routes/web.php
        // $this->info('>>> Replacing initial Laravel routes/web.php...');
        // $this->replaceInitialRouteWeb(true);
        // $this->info('>>> Replacing initial Laravel routes/web.php : done');

        // // Install demo
        // $this->info('>>> Install demo datas...');
        // $this->installDemoDatas(true);
        // $this->info('>>> Install demo datas : done');

        // Installation done with success

        // from v0.2.3
        if ($typhoonVersionNumber == '0.2.3')
        {
            $this->info('Update from TyphoonCMS v0.2.3 needs to remove following elements :');
            $this->info('- directory app/Filament/Resources/ConfigurationResource');
            $this->info('- file app/Filament/Resources/ConfigurationResource.php');
            $this->info('- directory content/configurations');
            if ($this->confirm('Do you wish to continue?')) {
                //
                $this->removeConfigurationFiles();
            } else {
                $this->info('Configurations elements still on your installation');

            }


            $this->v023Tov030AddSettingModel();

            $this->v023To030InstallDemoForSettingModel();

            $this->creatingResources();
        }
        $this->info('TyphoonCMS Package updated. 🚀');
        $this->askForSomeLove();
    }

    private function v023Tov030AddSettingModel()
    {
        $this->info('Adding Setting model...');

        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-models-setting",
            '--force' => true
        ];

        $this->call('vendor:publish', $params);
    }

    private function v023To030InstallDemoForSettingModel()
    {
        $this->info('Adding Setting model...');

        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-install-demo-for-setting-model",
            '--force' => true
        ];

        $this->call('vendor:publish', $params);
    }

    /**
     * Remove configuration files
     * 
     * Configuration has be replaced by setting, so it's necessary to remove
     * - configuration files in resources folder
     * - model for resources
     * 
     * Utils for updating from 0.2.3 only
     *
     * @return void
     */
    private function removeConfigurationFiles()
    {
        /**
         * @todo dissociates if a file or directory exists or not to the fact
         *       it is not possible to delete it. Return message may be 
         *       confusing
         */        
        $this->info('Starting remove file Filament/Resources/ConfigurationResource.php');
        if (File::exists(app_path('Filament/Resources/ConfigurationResource.php')) && unlink(app_path('Filament/Resources/ConfigurationResource.php'))) {
            $this->info('File Filament/Resources/ConfigurationResource.php removed successfully');
        } else {
            $this->info('File Filament/Resources/ConfigurationResource.php NOT removed successfully. Please check manually');
        }

        $this->info('Starting remove directory Filament/Resources/ConfigurationResource');
        if (File::exists(app_path('Filament/Resources/ConfigurationResource')) && $this->delTree(app_path('Filament/Resources/ConfigurationResource'))) {
            $this->info('Directory Filament/Resources/ConfigurationResource removed successfully');
        } else {
            $this->info('Directory Filament/Resources/ConfigurationResource NOT removed successfully. Please check manually');
        }

        $this->info('Starting remove directory content/configurations');
        if (File::exists(base_path('content/configurations')) && $this->delTree(base_path('content/configurations'))) {
            $this->info('Directory content/configurations removed successfully');
        } else {
            $this->info('Directory content/configurations NOT removed successfully. Please check manually');
        }

    }

    /**
     * 
     * provided by https://stackoverflow.com/questions/3349753/delete-directory-with-files-in-it
     *
     * @param [type] $dir
     * @return void
     */
    private function delTree($dir)
    { 
        $files = array_diff(scandir($dir), array('.', '..')); 

        foreach ($files as $file) { 
            (is_dir("$dir/$file")) ? $this->delTree("$dir/$file") : unlink("$dir/$file"); 
        }

        return rmdir($dir); 
    }
 
    private function askActualTyphoonVersionNumber()
    {
        return $this->choice(
            'Which version did you previously installed ?',
            [
                '0.2.0',
                '0.2.1',
                '0.2.2',
                '0.2.3'
            ]
        );
    }



    private function publishFilamentNavigationAssets($forcePublish = false)
    {
        $params = [
            '--tag' => "filament-navigation-assets"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function replaceInitialRouteWeb($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-routes"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function publishComponents()
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-components"
        ];

        $this->call('vendor:publish', $params);
    }

    private function filamentSocialNetworksOrbit()
    {
        $params = [
            // '--provider' => "HappyToDev\FilamentSocialNetworks\FilamentSocialNetworksProvider",
            '--tag' => "filament-social-networks-model-with-orbit"
        ];

        $this->call('vendor:publish', $params);
    }

    private function filamentSocialNetworksAssets()
    {
        $params = [
            // '--provider' => "HappyToDev\FilamentSocialNetworks\FilamentSocialNetworksProvider",
            '--tag' => "filament-social-networks-assets"
        ];

        $this->call('vendor:publish', $params);
    }

    private function optimizeAndLink()
    {
        $this->call('optimize:clear');
        $this->call('storage:link');
    }

    private function updateConfigFile()
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-filament-config"
        ];

        $this->call('vendor:publish', $params);
    }

    private function createFirstUser()
    {
        $this->call('make:filament-user');
        $this->info('First user created successfully.');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    // Ask if the user wants to overwrite the User model
    private function shouldOverwriteModels()
    {
        return $this->confirm(
            'User model file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishLangs($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-langs"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function publishRepositories($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-repositories"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function publishRepositoryServiceProvider($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-repository-service-provider"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function publishInterfaces($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-interfaces"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    // Publish needed models during the installation process
    private function publishModels($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-models"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    // Installing resources needed to manage default models provided after
    // install in typhoon
    public function creatingResources()
    {
        $this->info('Creating resources...');

        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-filament-resources",
            '--force' => true
        ];

        $this->call('vendor:publish', $params);
    }

    private function writeCss()
    {
        $this->info('Writing CSS...');

        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-css",
            '--force' => true
        ];

        $this->call('vendor:publish', $params);
    }

    private function writeJs()
    {
        $this->info('Writing JS...');

        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-js",
            '--force' => true
        ];

        $this->call('vendor:publish', $params);
    }

    /**
     * Launch installation of filament-comments package
     */
    private function installFilamentComments()
    {
        $this->call('filament-comments:install');
    }

    protected function askForSomeLove(): void
    {
 
        if ($this->confirm('Would you like to show some love to Typhoon by starring the repo 🙏 ?', true)) {
            if (PHP_OS_FAMILY === 'Darwin') {
                exec('open https://github.com/happytodev/typhoon');
            }
            if (PHP_OS_FAMILY === 'Linux') {
                exec('xdg-open https://github.com/happytodev/typhoon');
            }
            if (PHP_OS_FAMILY === 'Windows') {
                exec('start https://github.com/happytodev/typhoon');
            }

            $this->line('Thank you!');
        }
    }
}
