<x-form-field
    field-name="attention_to"
    label="{{ __('Attention to') }}"
    value="{{ $invoice->attention_to ?? '' }}"
    placeholder="{{ __('Mr. Voetman') }}"
    type="text"
></x-form-field>

<x-form-field
    field-name="description"
    label="{{ __('Description') }}"
    value="{{ $invoice->description ?? '' }}"
    type="text"
></x-form-field>

<x-form-field
    field-name="invoice_date"
    label="{{ __('Invoice date') }}"
    value="{{ isset($invoice) ? $invoice->invoice_date->format('Y-m-d') : '' }}"
    type="date"
></x-form-field>

<x-form-field
    field-name="expiration_date"
    label="{{ __('Expiration date') }}"
    value="{{ isset($invoice) ? $invoice->expiration_date->format('Y-m-d') : '' }}"
    type="date"
></x-form-field>

<x-form-select
    field-name="debtor_id"
    label="Debtors"
    selected="{{ $invoice->debtor_id ?? '' }}"
    :options="$debtors"
>
</x-form-select>

<x-form-select
    field-name="address_id"
    label="Addresses"
    selected="{{ $invoice->address_id ?? '' }}"
    :options="$addresses"
>
</x-form-select>

<div class="py-4">
    <x-label value="Invoice lines"></x-label>

    @for($i = 0; $i < 4; $i++)
        <div class="flex flex-row">
            <div class="basis-2/3">
                <x-form-field
                    field-name="invoice_line_description[{{ $i }}]"
                    label="{{ __('Description') }}"
                    value="{{ $invoice->lines[$i]->description ?? '' }}"
                    type="text"
                ></x-form-field>
            </div>
            <div class="basis-1/6">
                <x-form-field
                    field-name="price[{{ $i }}]"
                    label="{{ __('Price') }}"
                    value="{{ $invoice->lines[$i]->price_exclusive ?? '' }}"
                    type="text"
                ></x-form-field>
            </div>
            <div class="basis-1/6">
                <x-form-field
                    field-name="VAT_percentage[{{ $i }}]"
                    label="{{ __('VAT percentage') }}"
                    value="{{ $invoice->lines[$i]->VAT_percentage ?? '' }}"
                    type="text"
                ></x-form-field>
            </div>
        </div>
    @endfor
</div>

<x-button class="mt-3">
    {{ __('Submit') }}
</x-button>
