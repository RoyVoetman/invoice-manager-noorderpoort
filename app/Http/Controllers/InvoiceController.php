<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Invoice;
use App\Models\InvoiceLine;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class InvoiceController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Invoice::class, 'invoice');
    }

    /**
     * @param Invoice $invoice
     * @return Response
     */
    public function show(Invoice $invoice): Response
    {
        $pdf = Pdf::loadView('pdfs.invoice', ['invoice' => $invoice]);

        return $pdf->stream();
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('invoices.create')
            ->with('debtors', User::getDebtorsDropdown())
            ->with('addresses', Address::getAddressesDropdown());
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
        $invoice->lines()->delete();
        $invoice->delete();

        return redirect()->route('dashboard');
    }

    /**
     * @param Invoice $invoice
     * @return Renderable
     */
    public function edit(Invoice $invoice): Renderable
    {
        return view('invoices.edit')
            ->with('invoice', $invoice)
            ->with('debtors', User::getDebtorsDropdown())
            ->with('addresses', Address::getAddressesDropdown());
    }

    /**
     * @param Invoice $invoice
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Invoice $invoice, Request $request): RedirectResponse
    {
        $formData = $request->all();

        $invoice->update([
            "attention_to" => $formData['attention_to'],
            "description" => $formData['description'],
            "invoice_date" => Carbon::createFromFormat("Y-m-d", $formData['invoice_date']),
            "expiration_date" => Carbon::createFromFormat("Y-m-d", $formData['expiration_date']),
            "debtor_id" => $formData['debtor_id'],
            "address_id" => $formData['address_id']
        ]);

        $invoice->lines()->delete();

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
}
