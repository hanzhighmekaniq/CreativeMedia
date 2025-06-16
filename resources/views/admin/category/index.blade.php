<x-LayoutAdmin>
    <div class="bg-[#0f172a]">
        <div class="w-full mx-auto">
            <div class="flex justify-between items-center mb-6">
                <p class="text-2xl font-bold text-white">Categories Management</p>
                <button onclick="openCreateModal()"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                    Add New Category
                </button>
            </div>

            <!-- Filters Section -->
            <div class="bg-[#1e293b] rounded-xl mb-4">
                <div class="p-6">
                    <form method="GET" action="{{ route('admin.categories.index') }}" class="space-y-4" id="searchForm">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-white">
                            <!-- Search Input -->
                            <div class="lg:col-span-4">
                                <label for="search" class="block text-sm font-medium mb-2 text-white">
                                    Search Categories
                                </label>
                                <div class="relative">
                                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                                        placeholder="Search by name..."
                                        class="block w-full pl-10 pr-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg
                                   text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500
                                   focus:border-gray-500  duration-200">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Categories Table -->
            <div class="bg-[#1e293b] rounded-xl shadow-sm border border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-700">
                        <thead class="bg-[#1e293b]">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Category Title
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Created At
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#1e293b] divide-y divide-gray-700">
                            @forelse($categories as $category)
                                <tr class="hover:bg-[#334155] duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-white">{{ $category->title }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $category->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($category->status) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        {{ $category->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                        <div class="flex items-center justify-start space-x-2">
                                            <!-- Edit Category -->
                                            <button onclick="openEditModal('{{ $category->id }}', '{{ $category->title }}', '{{ $category->status }}')"
                                                class="text-indigo-500 hover:text-indigo-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px"
                                                    viewBox="0 -960 960 960" width="20px" fill="#999999">
                                                    <path
                                                        d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                                </svg>
                                            </button>

                                            <!-- Delete Category -->
                                            <button onclick="openDeleteModal('{{ route('admin.categories.destroy', $category->id) }}')"
                                                class="text-red-500 hover:text-red-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M10 11v6m4-6v6M4 7h16M9 4h6a1 1 0 011 1v2H8V5a1 1 0 011-1z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center w-full">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-500 mb-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                            </svg>
                                            <h3 class="text-lg font-medium text-white mb-2">No categories found</h3>
                                            <p class="text-gray-400 mb-4">Try adding a new category or adjust your search.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div id="createModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-[#1e293b] rounded-lg p-6 max-w-sm mx-4 w-full">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-white">Add New Category</h3>
                <button onclick="closeCreateModal()" class="text-gray-400 hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-white mb-2">Category Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="block w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg text-white
                            placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500
                            duration-200 @error('title') border-red-500 @enderror">
                        @error('title')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-white mb-2">Status</label>
                        <select name="status" id="status"
                            class="block w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg text-white
                            focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500
                            duration-200 @error('status') border-red-500 @enderror">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeCreateModal()"
                            class="px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 rounded-lg duration-200">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg duration-200">
                            Create Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-[#1e293b] rounded-lg p-6 max-w-sm mx-4 w-full">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-white">Edit Category</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="edit_title" class="block text-sm font-medium text-white mb-2">Category Title</label>
                        <input type="text" name="title" id="edit_title"
                            class="block w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg text-white
                            placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500
                            duration-200 @error('title') border-red-500 @enderror">
                        @error('title')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="edit_status" class="block text-sm font-medium text-white mb-2">Status</label>
                        <select name="status" id="edit_status"
                            class="block w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg text-white
                            focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500
                            duration-200 @error('status') border-red-500 @enderror">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()"
                            class="px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 rounded-lg duration-200">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg duration-200">
                            Update Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-[#1e293b] rounded-lg p-6 max-w-sm mx-4">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-white">Delete Category</h3>
                </div>
            </div>
            <p class="text-sm text-gray-400 mb-4">Are you sure you want to delete this category? This action cannot be
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
        // Create Modal Functions
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
            document.getElementById('createModal').classList.add('flex');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
            document.getElementById('createModal').classList.remove('flex');
        }

        // Edit Modal Functions
        function openEditModal(id, title, status) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
            document.getElementById('editForm').action = `/admin/categories/${id}`;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_status').value = status;
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }

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

        // Search Function
        let searchTimeout;
        document.getElementById('search').addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                document.getElementById('searchForm').submit();
            }, 500); // Delay 500ms after user stops typing
        });
    </script>
</x-LayoutAdmin>
