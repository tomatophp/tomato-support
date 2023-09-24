<?php


Route::get('pages/{slug}', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'html'])->name('admin.pages.html');



Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/questions', [\TomatoPHP\TomatoSupport\Http\Controllers\QuestionController::class, 'index'])->name('questions.index');
    Route::get('admin/questions/api', [\TomatoPHP\TomatoSupport\Http\Controllers\QuestionController::class, 'api'])->name('questions.api');
    Route::get('admin/questions/create', [\TomatoPHP\TomatoSupport\Http\Controllers\QuestionController::class, 'create'])->name('questions.create');
    Route::post('admin/questions', [\TomatoPHP\TomatoSupport\Http\Controllers\QuestionController::class, 'store'])->name('questions.store');
    Route::get('admin/questions/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\QuestionController::class, 'show'])->name('questions.show');
    Route::get('admin/questions/{model}/edit', [\TomatoPHP\TomatoSupport\Http\Controllers\QuestionController::class, 'edit'])->name('questions.edit');
    Route::post('admin/questions/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\QuestionController::class, 'update'])->name('questions.update');
    Route::delete('admin/questions/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\QuestionController::class, 'destroy'])->name('questions.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/pages', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'index'])->name('pages.index');
    Route::get('admin/pages/api', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'api'])->name('pages.api');
    Route::get('admin/pages/create', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'create'])->name('pages.create');
    Route::post('admin/pages', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'store'])->name('pages.store');
    Route::get('admin/pages/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'show'])->name('pages.show');
    Route::get('admin/pages/{model}/edit', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'edit'])->name('pages.edit');
    Route::post('admin/pages/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'update'])->name('pages.update');
    Route::delete('admin/pages/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\PageController::class, 'destroy'])->name('pages.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/tickets', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');
    Route::get('admin/tickets/api', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'api'])->name('tickets.api');
    Route::get('admin/tickets/create', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'create'])->name('tickets.create');
    Route::post('admin/tickets', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'store'])->name('tickets.store');
    Route::get('admin/tickets/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'show'])->name('tickets.show');
    Route::get('admin/tickets/{model}/comments', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'comments'])->name('tickets.comments');
    Route::post('admin/tickets/{model}/comments', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'send'])->name('tickets.send');
    Route::get('admin/tickets/{model}/edit', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'edit'])->name('tickets.edit');
    Route::post('admin/tickets/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'update'])->name('tickets.update');
    Route::delete('admin/tickets/{model}', [\TomatoPHP\TomatoSupport\Http\Controllers\TicketController::class, 'destroy'])->name('tickets.destroy');
});
