<x-app-layout>
<x-slot name="header">
    Add Customer
</x-slot>

<div class="p-4">
<form method="POST" action="{{ route('customers.store') }}">
@csrf

<!-- Name -->
<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name"
        class="block mt-1 w-full"
        type="text"
        name="name"
        :value="old('name')"
        required />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Email -->
<div class="mt-4">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email"
        class="block mt-1 w-full"
        type="email"
        name="email"
        :value="old('email')" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Phone -->
<div class="mt-4">
    <x-input-label for="phone" :value="__('Phone')" />
    <x-text-input id="phone"
        class="block mt-1 w-full"
        type="text"
        name="phone"
        :value="old('phone')" />
    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
</div>

<!-- Address -->
<div class="mt-4">
    <x-input-label for="address" :value="__('Address')" />
    <textarea name="address"
        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('address') }}</textarea>
    <x-input-error :messages="$errors->get('address')" class="mt-2" />
</div>

<button class="mt-4 bg-green-500 text-white px-3 py-1 rounded">
    Save
</button>

</form>
</div>
</x-app-layout>