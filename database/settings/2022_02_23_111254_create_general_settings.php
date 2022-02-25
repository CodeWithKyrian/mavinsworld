<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Marvins World');
        $this->migrator->add('general.phone', '09067463437');
        $this->migrator->add('general.email', 'contact@marvinsworld.com.ng');
    }
}
