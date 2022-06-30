<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        $debtors = User::query()
            ->where('role_id', Role::DEBTOR)
            ->pluck('name', 'id')
            ->toArray();

        $addresses = Address::query()
            ->get()
            ->pluck('address', 'id')
            ->toArray();

        return view('invoices.create')
            ->with('debtors', $debtors)
            ->with('addresses', $addresses);
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
