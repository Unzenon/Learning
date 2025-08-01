<?php

namespace Venture\Letter\Http\Controllers;

use Venture\Letter\Models\LetterReceipt;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class LetterReceiptPreviewController extends Controller
{
    public function show(LetterReceipt $receipt): View
    {
        return view('letter::receipts.preview_receipt', [
            'receipt' => $receipt,
        ]);
    }
}
