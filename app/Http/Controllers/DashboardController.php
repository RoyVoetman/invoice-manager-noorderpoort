<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * @return Renderable
     */
    public function view(): Renderable
    {
        $invoices = Invoice::query()
            ->when(Auth::user()->role_id !== Role::OWNER, function ($query) {
                $query->where('debtor_id', Auth::id());
            })
            ->orderBy('invoice_number')
            ->paginate(10);

        return view('dashboard')
            ->with('invoices', $invoices);
    }
}
