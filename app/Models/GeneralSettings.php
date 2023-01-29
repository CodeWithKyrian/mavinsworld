<?php

namespace App\Models;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $phone;
    public string $email;
    public float $usd_price;

    public static function group(): string
    {
        return 'general';
    }
}
