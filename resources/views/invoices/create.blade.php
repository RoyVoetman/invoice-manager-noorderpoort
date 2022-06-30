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

                        <x-label for="attention_to" :value="__('Attention to')"></x-label>

                        <x-input id="attention_to" class="block mt-1 w-full"
                                 type="text"
                                 name="attention_to"
                                 placeholder="{{ __('Mr. Voetman') }}"
                                 required></x-input>

                        <x-button class="mt-3">
                            {{ __('Submit') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
