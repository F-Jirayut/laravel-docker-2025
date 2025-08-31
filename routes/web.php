<?php

use App\Jobs\ProcessPodcast;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    ProcessPodcast::dispatch();
    return view('welcome');
});
