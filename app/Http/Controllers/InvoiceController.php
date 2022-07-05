<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Invoice;
use App\Models\InvoiceLine;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $formData = $request->all();

        $invoice = Invoice::create([
            "invoice_number" => Invoice::getNextInvoiceNumber(),
            "attention_to" => $formData['attention_to'],
            "description" => $formData['description'],
            "invoice_date" => Carbon::createFromFormat("Y-m-d", $formData['invoice_date']),
            "expiration_date" => Carbon::createFromFormat("Y-m-d", $formData['expiration_date']),
            "debtor_id" => $formData['debtor_id'],
            "address_id" => $formData['address_id']
        ]);

        for ($i = 0; $i < count($formData['invoice_line_description']); $i++) {
            InvoiceLine::create([
                "description" => $formData['invoice_line_description'][$i],
                "price_exclusive" => $formData['price'][$i],
                "VAT_percentage" => $formData['VAT_percentage'][$i],
                "invoice_id" => $invoice->id
            ]);
        }

        return redirect()->route('dashboard');
    }

    /**
     * @param Invoice $invoice
     * @return RedirectResponse
     */
    public function destroy(Invoice $invoice): RedirectResponse
    {
        $invoice->delete();

        return redirect()->route('dashboard');
    }
}
