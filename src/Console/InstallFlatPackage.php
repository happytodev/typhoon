<?php

namespace happytodev\FlatCms\Console;

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

        if ($this->shouldOverwriteModels()) {
            $this->info('Overwriting User model file...');
            $this->publishModels($force = true);
            $this->info('User model updated...');
        } else {
            $this->info('Existing User model was not overwritten');
        }
        // $this->info('Publishing configuration...');

        // if (! $this->configExists('blogpackage.php')) {
        //     $this->publishConfiguration();
        //     $this->info('Published configuration');
        // } else {
        //     if ($this->shouldOverwriteConfig()) {
        //         $this->info('Overwriting configuration file...');
        //         $this->publishConfiguration($force = true);
        //     } else {
        //         $this->info('Existing configuration was not overwritten');
        //     }
        // }

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
            '--provider' => "happytodev\FlatCms\FlatCmsServiceProvider",
            '--tag' => "models"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
