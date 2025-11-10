<?php
use App\Models\Sitesetting;
 
function setting($field = null, $default = null)
{
    $setting = SiteSetting::first();

    if (!$setting) {
        return $default;
    }

    if (is_null($field)) {
        return $setting->toArray();
    }

    return $setting->$field ?? $default;
}