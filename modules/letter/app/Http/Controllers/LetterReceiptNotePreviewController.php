<?php

namespace Venture\Letter\Http\Controllers;

use Venture\Letter\Models\LetterReceiptNote;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class LetterReceiptNotePreviewController extends Controller
{
    public function show(LetterReceiptNote $note): View
    {
        return view('letter::notes.preview_receipt_note', [
            'note' => $note,
        ]);
    }
}
