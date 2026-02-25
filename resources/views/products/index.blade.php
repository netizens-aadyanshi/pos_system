<x-app-layout>
<x-slot name="header">
    Products
</x-slot>

<div class="p-4">
    <a href="{{ route('products.create') }}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded">
        Add Product
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
                    <th class="border border-gray-200 dark:border-gray-700 p-2 text-left text-gray-700 dark:text-gray-200">Category</th>
                    <th class="border border-gray-200 dark:border-gray-700 p-2 text-left text-gray-700 dark:text-gray-200">Price</th>
                    <th class="border border-gray-200 dark:border-gray-700 p-2 text-left text-gray-700 dark:text-gray-200">Stock</th>
                    <th class="border border-gray-200 dark:border-gray-700 p-2 text-left text-gray-700 dark:text-gray-200">Action</th>
                </tr>
            </thead>

            <tbody class="bg-white dark:bg-gray-800">
                @foreach($products as $product)
                    <tr class="text-gray-900 dark:text-gray-100">
                        <td class="border border-gray-200 dark:border-gray-700 p-2">{{ $product->id }}</td>
                        <td class="border border-gray-200 dark:border-gray-700 p-2">{{ $product->name }}</td>
                        <td class="border border-gray-200 dark:border-gray-700 p-2">
                            {{ $product->category->name ?? 'N/A' }}
                        </td>
                        <td class="border border-gray-200 dark:border-gray-700 p-2">{{ $product->price }}</td>
                        <td class="border border-gray-200 dark:border-gray-700 p-2">
                            {{ $product->stock }}

                            @if($product->stock < 10)
                                <span class="ml-2 bg-red-500 text-white text-xs px-2 py-1 rounded">
                                    Low Stock
                                </span>
                            @endif
                        </td>
                        <td class="border border-gray-200 dark:border-gray-700 p-2 space-x-2">
                            <a href="{{ route('products.edit',$product) }}" class="text-indigo-500 hover:underline">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy',$product) }}" method="POST" class="inline">
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
        {{ $products->links() }}
    </div>
</div>
</x-app-layout>