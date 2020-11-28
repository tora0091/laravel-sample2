<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index()
    {
        $pdf = \PDF::loadView('pdf.greeting', ['name' => '山田　健二', 'day' => '2020-10-10']);
        return $pdf->stream('hello.pdf');
    }
}
