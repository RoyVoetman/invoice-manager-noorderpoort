<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return Renderable
     */
    public function view(): Renderable
    {
        return view('dashboard')
            ->with('invoices', Invoice::all());
    }
}
