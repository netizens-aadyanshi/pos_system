<x-app-layout>
<x-slot name="header">
    Categories
</x-slot>

<div class="p-4">
    <a href="{{ route('categories.create') }}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded">
        Add Category
    </a>

    @if(session('success'))
        <div class="text-green-500 mt-2">{{ session('success') }}</div>
    @endif

    <div class="mt-4 overflow-x-auto">
        <table class="w-full border border-gray-200 dark:border-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border border-gray-200 dark:border-gray-700 p-2 text-left text-gray-700 dark:text-gray-200">ID</th>
                    <th class="border border-gray-200 dark:border-gray-700 p-2 text-left text-gray-700 dark:text-gray-200">Name</th>
                    <th class="border border-gray-200 dark:border-gray-700 p-2 text-left text-gray-700 dark:text-gray-200">Description</th>
                    <th class="border border-gray-200 dark:border-gray-700 p-2 text-left text-gray-700 dark:text-gray-200">Action</th>
                </tr>
            </thead>

            <tbody class="bg-white dark:bg-gray-800">
                @foreach($categories as $category)
                    <tr class="text-gray-900 dark:text-gray-100">
                        <td class="border border-gray-200 dark:border-gray-700 p-2">{{ $category->id }}</td>
                        <td class="border border-gray-200 dark:border-gray-700 p-2">{{ $category->name }}</td>
                        <td class="border border-gray-200 dark:border-gray-700 p-2">{{ $category->description }}</td>
                        <td class="border border-gray-200 dark:border-gray-700 p-2 space-x-2">
                            <a href="{{ route('categories.edit',$category) }}" class="text-indigo-500 hover:underline">
                                Edit
                            </a>

                            <form action="{{ route('categories.destroy',$category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete?')" class="text-red-500 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
</x-app-layout>