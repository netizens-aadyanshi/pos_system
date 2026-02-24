<x-app-layout>
<x-slot name="header">Edit Category</x-slot>

<div class="p-4">
<form method="POST" action="{{ route('categories.update',$category) }}">
@csrf
@method('PUT')

<!-- Name -->
<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name"
        class="block mt-1 w-full"
        type="text"
        name="name"
        :value="old('name', $category->name)"
        required />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Description -->
<div class="mt-4">
    <x-input-label for="description" :value="__('Description')" />
    <textarea name="description"
        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        {{ old('description', $category->description) }}
    </textarea>
</div>

<button class="mt-4 bg-blue-500 text-white px-3 py-1 rounded">
    Update
</button>

</form>
</div>
</x-app-layout>