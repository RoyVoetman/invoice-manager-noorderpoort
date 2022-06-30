<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    /**
     * @return Renderable
     */
    public function view(): Renderable
    {
        $invoices = Invoice::query()
            ->orderBy('invoice_number')
            ->paginate(10);

        return view('dashboard')
            ->with('invoices', $invoices);
    }
}
