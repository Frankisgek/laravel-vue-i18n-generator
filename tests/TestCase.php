<?php

namespace TestMonitor\VueI18nGenerator\Tests;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Application;
use TestMonitor\VueI18nGenerator\VueI18nGeneratorServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Define environment setup.
     *
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        tap($app->make('config'), function (Repository $config) {
            $config->set('vue-i18n-generator.outputFile', __DIR__ . '/data/output.js');
        });

        $app->useLangPath(__DIR__ . '/data/lang');
    }

    protected function getPackageProviders($app)
    {
        return [
            VueI18nGeneratorServiceProvider::class,
        ];
    }
}
