<?php

namespace HappyToDev\Typhoon\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallTyphoonPackage extends Command
{
    protected $signature = 'typhoon:install';

    protected $description = 'Install the Typhoon CMS';

    public function handle()
    {
        $this->info('Installing TyphoonCMS Package...');

        $this->info('>>> Publishing configuration...');

        // Asking user if he wants to overwrite original user model
        if ($this->shouldOverwriteModels()) {
            $this->info('>>> Overwriting User model file...');
            $this->publishModels($force = true);
            $this->info('>>> User model updated...');
        } else {
            $this->info('Existing User model was not overwritten');
        }

        $this->creatingResources();

        // Deploying Typhoon Components
        $this->info('>>> Publishing components...');
        $this->publishComponents();

        // Create first user
        $this->info('>>> Creating first user...');
        $this->createFirstUser();

        // Write CSS
        $this->info('>>> Writing CSS...');
        $this->writeCss();

        // Write JS
        $this->info('>>> Writing Js...');
        $this->writeJs();

        //Update config file
        $this->info('>>> Updating config file...');
        $this->updateConfigFile();
        $this->updateConfigFileMarkdown(true);

        // publish configuration file
        $this->info('>>> Publishing configuration file...');
        $this->publishConfiguration(true);
        $this->info('>>> Publishing configuration : done');

        // publish interface files
        $this->info('>>> Publishing interfaces files...');
        $this->publishInterfaces(true);
        $this->info('>>> Publishing interfaces : done');

        // publish repositories files
        $this->info('>>> Publishing repositories files...');
        $this->publishRepositories(true);
        $this->info('>>> Publishing repositories : done');

        // publish RepositoryServiceProvider.php file
        $this->info('>>> Publishing RepositoryServiceProvider.php files...');
        $this->publishRepositoryServiceProvider(true);
        $this->info('>>> Publishing RepositoryServiceProvider.php : done');

        // publish Langs files
        $this->info('>>> Publishing Langs files...');
        $this->publishLangs(true);
        $this->info('>>> Publishing Langs : done');


        // Launch optimize and link
        $this->info('>>> Optimizing and linking ...');
        $this->optimizeAndLink();
        $this->info('>>> Optimizing and linking  : done');

        // Installation of filament-comments package
        $this->info('>>> Installing filament-comments package...');
        $this->installFilamentComments();
        $this->info('>>> Installing filament-comments : done');

        // FilamentSocialNetworks with Orbit
        $this->info('>>> Configure filament-social-networks with Orbit...');
        $this->filamentSocialNetworksOrbit();
        $this->info('>>> Configure filament-social-networks with Orbit : done');

        // FilamentSocialNetworks Assets
        $this->info('>>> Publishing filament-social-networks assets...');
        $this->filamentSocialNetworksAssets();
        $this->info('>>> Publishing filament-social-networks assets : done');

        // Filament Navigation Assets
        $this->info('>>> Publishing filament-navigation assets...');
        $this->publishFilamentNavigationAssets(true);
        $this->info('>>> Publishing filament-navigation assets : done');

        // Filament Akaunting FilamentSetting config file
        $this->publishAkauntingFilamentSettingConfigFile();

        // Replace initial laravel routes/web.php
        $this->info('>>> Replacing initial Laravel routes/web.php...');
        $this->replaceInitialRouteWeb(true);
        $this->info('>>> Replacing initial Laravel routes/web.php : done');
        
        // Install plugins
        $this->info('>>> Deploying Tailwind color picker view...');
        $this->installPluginTailwindColorPicker();
        $this->info('>>> Deploying Tailwind color picker view : done');

        // Install demo
        $this->info('>>> Install demo datas...');
        $this->installDemoDatas(true);
        $this->info('>>> Install demo datas : done');

        // Remove orbit cache
        $this->info('>>> Remove orbit cache...');
        $this->removeOrbitCache();

        // Installation done with success
        $this->info('TyphoonCMS Package installed successfully. 🚀');
        $this->askForSomeLove();
        $this->info('You can now edit `content/users/1.md`');
        $this->info('And change `is_admin: 0` to `is_admin: 1`');
        $this->info('to be authorized to access the admin panel.');

        $this->info('You can now connect to your {site url}/admin and use credentials set during installation');
    }

    private function installDemoDatas($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-install-demo"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function installPluginTailwindColorPicker()
    {
        $params = [
            '--tag' => "filament-tailwind-color-picker-views",
            '--force' => true
        ];

        $this->call('vendor:publish', $params);
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

    private function updateConfigFileMarkdown($forcePublish = false)
    {
        $params = [
            '--provider' => "HappyToDev\Typhoon\TyphoonServiceProvider",
            '--tag' => "typhoon-markdown-config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function createFirstUser()
    {
        $this->call('make:filament-user');
        $this->info('First user created successfully.');
    }

    private function removeOrbitCache()
    {
        $result = $this->call('orbit:clear');
        if ($result) {
            $this->info('Orbit cache cleared successfully.');
        }
        $this->info('Orbit cache was not cleared.');
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
            '--tag' => "typhoon-filament-resources"
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

    private function publishAkauntingFilamentSettingConfigFile()
    {
        $this->info('Publishing Akaunting FilamentSetting config file...');

        $params = [
            '--tag' => "setting",
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
