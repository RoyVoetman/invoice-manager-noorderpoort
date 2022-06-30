<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('invoices.create');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        dd($request->all());
    }
}
