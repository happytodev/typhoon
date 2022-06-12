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

        // Create first user
        $this->info('>>> Creating first user...');
        $this->createFirstUser();

        // Write CSS
        $this->info('>>> Writing CSS...');
        $this->writeCss();

        // Installation done with success
        $this->info('TyphoonCMS Package installed successfully.');
        $this->info('You can now edit `content/users/1.md`');
        $this->info('And change `is_admin: 0` to `is_admin: 1`');
        $this->info('to be authorized to access the admin panel.');
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

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "JohnDoe\BlogPackage\BlogPackageServiceProvider",
            '--tag' => "config"
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
}
