<x-app-layout>
<x-slot name="header">
    Add Product
</x-slot>

<div class="p-4">
<form method="POST" action="{{ route('products.store') }}">
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

<!-- Category -->
<div class="mt-4">
    <x-input-label for="category_id" :value="__('Category')" />
    <select name="category_id"
        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
        required>
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                @selected(old('category_id') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
</div>

<!-- Price -->
<div class="mt-4">
    <x-input-label for="price" :value="__('Price')" />
    <x-text-input id="price"
        class="block mt-1 w-full"
        type="number"
        step="0.01"
        name="price"
        :value="old('price')"
        required />
    <x-input-error :messages="$errors->get('price')" class="mt-2" />
</div>

<!-- Stock Quantity -->
<div class="mt-4">
    <x-input-label for="stock" :value="__('Stock')" />
    <x-text-input id="stock"
        class="block mt-1 w-full"
        type="number"
        name="stock"
        :value="old('stock')"
        required />
    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
</div>

<button class="mt-4 bg-green-500 text-white px-3 py-1 rounded">
    Save
</button>

</form>
</div>
</x-app-layout>