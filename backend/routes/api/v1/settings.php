<?php

use App\Enums\AbilityEnum;
use App\Http\Controllers\Api\V1\SettingController;
use Illuminate\Support\Facades\Route;

Route::get(
    uri: 'settings',
    action: [SettingController::class, 'index']
)->name('index')->middleware(sprintf(
    'ability:%s',
    AbilityEnum::GetAllSettings->slugify()
));

Route::patch(
    uri: 'settings',
    action: [SettingController::class, 'update']
)->name('update')->middleware(sprintf(
    'ability:%s',
    AbilityEnum::SetSettings->slugify()
));
