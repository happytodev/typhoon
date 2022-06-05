<?php

namespace HappyToDev\FlatCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallFlatPackage extends Command
{
    protected $signature = 'flat-cms:install';

    protected $description = 'Install the Flat CMS';

    public function handle()
    {
        $this->info('Installing FlatCMS Package...');

        $this->info('Publishing configuration...');

        // Asking user if he wants to overwrite original user model
        if ($this->shouldOverwriteModels()) {
            $this->info('Overwriting User model file...');
            $this->publishModels($force = true);
            $this->info('User model updated...');
        } else {
            $this->info('Existing User model was not overwritten');
        }

        $this->creatingResources();

        $this->info('Installed Flat CMS');
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
            '--provider' => "HappyToDev\FlatCms\FlatCmsServiceProvider",
            '--tag' => "flatcms-models"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    // Installing resources needed to manage default models provided after
    // install in Flat-Cms
    public function creatingResources()
    {
        $this->info('Creating resources...');

        $params = [
            '--provider' => "HappyToDev\FlatCms\FlatCmsServiceProvider",
            '--tag' => "flatcms-filament-resources"
        ];

        $this->call('vendor:publish', $params);
    }
}
