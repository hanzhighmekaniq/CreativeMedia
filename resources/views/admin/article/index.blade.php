<x-LayoutAdmin>
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Articles Management</h1>
            <a href="{{ route('admin.articles.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg duration-200">
                Add New Article
            </a>
        </div>

        <!-- Filters -->
        <div class="bg-[#1e293b] rounded-lg p-4 mb-6">
            <form action="{{ route('admin.articles.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-300 mb-1">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="w-full bg-[#0f172a] border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                        placeholder="Search by title...">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                    <select name="status" id="status"
                        class="w-full bg-[#0f172a] border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500">
                        <option value="">All Status</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
                <div>
                    <label for="subcategory" class="block text-sm font-medium text-gray-300 mb-1">Sub Category</label>
                    <select name="subcategory" id="subcategory"
                        class="w-full bg-[#0f172a] border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500">
                        <option value="">All Sub Categories</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                {{ request('subcategory') == $subcategory->id ? 'selected' : '' }}>
                                {{ $subcategory->category->title }} / {{ $subcategory->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <!-- Articles Table -->
        <div class="bg-[#1e293b] rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-[#0f172a]">
                    <tr class="bg-[#1e293b]">
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Category
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Author
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Created At
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($articles as $article)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if ($article->thumbnail)
                                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                                            class="w-10 h-10 rounded-lg object-cover mr-3">
                                    @endif
                                    <div class="text-sm font-medium text-white">
                                        {{ $article->title }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-300">
                                    {{ $article->subCategory->category->title }}
                                    @if ($article->subCategory)
                                        <span class="text-gray-500">/ {{ $article->subCategory->title }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $article->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($article->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $article->user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $article->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-3">
                                    <a href="{{ route('admin.articles.edit', $article) }}"
                                        class="text-blue-500 hover:text-blue-400" title="Edit Article">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button onclick="openDeleteModal('{{ route('admin.articles.destroy', $article) }}')"
                                        class="text-red-500 hover:text-red-400" title="Delete Article">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 11v6m4-6v6M4 7h16M9 4h6a1 1 0 011 1v2H8V5a1 1 0 011-1z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-300">
                                No articles found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-[#1e293b] rounded-lg p-6 max-w-sm mx-4 w-full">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-white">Delete Article</h3>
                </div>
            </div>
            <p class="text-sm text-gray-400 mb-4">Are you sure you want to delete this article? This action cannot be
                undone.</p>
            <div class="flex justify-end space-x-3">
                <button onclick="closeDeleteModal()"
                    class="px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 rounded-lg duration-200">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg duration-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Delete Modal Functions
        function openDeleteModal(url) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
            document.getElementById('deleteForm').action = url;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }

        // Auto Submit Form
        document.getElementById('search').addEventListener('input', function() {
            setTimeout(() => {
                this.form.submit();
            }, 500);
        });

        document.getElementById('status').addEventListener('change', function() {
            this.form.submit();
        });

        document.getElementById('subcategory').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
</x-LayoutAdmin>
