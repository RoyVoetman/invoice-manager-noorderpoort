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

                        <div class="py-4">
                            <x-label value="Invoice lines"></x-label>

                            @for($i = 0; $i < 4; $i++)
                                <div class="flex flex-row">
                                    <div class="basis-2/3">
                                        <x-form-field
                                            field-name="description"
                                            value="{{ __('Description') }}"
                                            type="text"
                                        ></x-form-field>
                                    </div>
                                    <div class="basis-1/6">
                                        <x-form-field
                                            field-name="price"
                                            value="{{ __('Price') }}"
                                            type="text"
                                        ></x-form-field>
                                    </div>
                                    <div class="basis-1/6">
                                        <x-form-field
                                            field-name="VAT_percentage"
                                            value="{{ __('VAT percentage') }}"
                                            type="text"
                                        ></x-form-field>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <x-button class="mt-3">
                            {{ __('Submit') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
