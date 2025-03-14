<?php

use Botble\Page\Repositories\Interfaces\PageInterface;
Route::get('/test-view', function () {
    return view('homolog-new::index');
});

Route::get('/', function () {
    return Theme::scope('index')->render();
});

