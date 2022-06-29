<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="border-collapse table-fixed w-full text-sm">
                        <thead>
                        <tr>
                            <th class="border-b text-left">#</th>
                            <th class="border-b text-left">Debtor</th>
                            <th class="border-b text-left">Invoice date</th>
                            <th class="border-b text-left">Expiration date</th>
                            <th class="border-b text-left">Created at</th>
                            <th class="border-b text-left"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr class="border-b border-slate-100 text-left">
                                    <td class="py-4">{{ $invoice->invoice_number }}</td>
                                    <td class="py-4">{{ $invoice->debtor->name }}</td>
                                    <td class="py-4">{{ $invoice->invoice_date->format('d-m-Y') }}</td>
                                    <td class="py-4">{{ $invoice->expiration_date->format('d-m-Y') }}</td>
                                    <td class="py-4">{{ $invoice->created_at->format('d-m-Y') }}</td>
                                    <td class="py-4">
                                        <x-link href="#">
                                            Edit
                                        </x-link>
                                        <x-link href="#">
                                            Delete
                                        </x-link>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $invoices->links() }}
        </div>
    </div>
</x-app-layout>
