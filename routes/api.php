<?php

if(config('tomato-support.features.api')) {

if(config('tomato-support.features.tickets')) {
    Route::middleware(['auth:sanctum'])->prefix('api/tickets')->name('api.tickets.')->group(function () {
        Route::get('/', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'index'])->name('index');
        Route::post('/', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'store'])->name('store');
        Route::get('/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'show'])->name('show');
        Route::post('/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'send'])->name('send');
    });
}

if(config('tomato-support.features.faq')) {
    Route::middleware(['auth:sanctum'])->prefix('api/faq')->name('api.faq.')->group(function () {
        Route::get('/', [\TomatoPHP\TomatoSupport\Http\Controllers\QuestionController::class, 'index'])->name('index');
    });
}

if(config('tomato-support.features.pages')) {
    Route::middleware(['auth:sanctum'])->prefix('api/pages')->name('api.pages.')->group(function () {
        Route::get('/', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'index'])->name('index');
        Route::get('/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'show'])->name('show');
    });
}

}
