<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('invoices.store') }}" method="POST">
                        @csrf

                        <x-form-field
                            field-name="attention_to"
                            value="{{ __('Attention to') }}"
                            placeholder="{{ __('Mr. Voetman') }}"
                            type="text"
                        ></x-form-field>

                        <x-form-field
                            field-name="description"
                            value="{{ __('Description') }}"
                            type="text"
                        ></x-form-field>

                        <x-form-field
                            field-name="invoice_date"
                            value="{{ __('Invoice date') }}"
                            type="date"
                        ></x-form-field>

                        <x-form-field
                            field-name="expiration_date"
                            value="{{ __('Expiration date') }}"
                            type="date"
                        ></x-form-field>

                        <x-form-select
                            field-name="debtor_id"
                            value="Debtors"
                            :options="$debtors"
                        >
                        </x-form-select>

                        <x-form-select
                            field-name="address_id"
                            value="Addresses"
                            :options="$addresses"
                        >
                        </x-form-select>

                        <x-button class="mt-3">
                            {{ __('Submit') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
