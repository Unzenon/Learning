<?php

use Illuminate\Support\Facades\Route;
use Venture\Letter\Http\Controllers\LetterReceiptPreviewController;
use Venture\Letter\Http\Controllers\LetterReceiptNotePreviewController;



Route::group([
    'middleware' => ['auth'],
], function (): void {
    Route::group([
        'middleware' => ['verified'],
    ], function (): void {
        //
    });
});

Route::group([
    'middleware' => ['guest'],
], function (): void {
    //
});


// Route::get('/letter/receipts/{receipt}/preview', [LetterReceiptPreviewController::class, 'show'])
//     ->name('letter.receipts.preview');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/receipts/{receipt}/preview', [LetterReceiptPreviewController::class, 'show'])
        ->name('letter.receipts.preview_receipt'); // full name = @letter.receipts.preview (lihat RouteServiceProvider)
});

Route::get('/notes/{note}/preview', [LetterReceiptNotePreviewController::class, 'show'])
    ->name('letter.notes.preview_receipt_note');
