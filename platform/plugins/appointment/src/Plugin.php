<?php

namespace Botble\Appointment;

use Illuminate\Support\Facades\Schema;
use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('appointments_translations');
    }
}
