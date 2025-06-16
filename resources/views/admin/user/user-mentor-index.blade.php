<x-LayoutAdmin>
    <div class=" bg-[#0f172a]">
        <div class="w-full mx-auto ">
            <p class="text-2xl font-bold text-white pb-2">Mentor</p>

            <a href="{{ route('admin.mentors.create') }}"
                class="w-full flex justify-center mb-4 bg-[#1e293b] rounded-md  items-center px-4 py-3  text-white text-sm font-medium  duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add New User
            </a>

            <!-- Filters Section -->
            <div class="bg-[#1e293b] rounded-xl mb-4">
                <div class="p-6">
                    <form method="GET" action="{{ route('admin.mentors.index') }}" class="space-y-4" id="filterForm">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-white">
                            <!-- Search Input -->
                            <div class="lg:col-span-2">
                                <label for="search" class="block text-sm font-medium mb-2 text-white">
                                    Search Users
                                </label>
                                <div class="relative">
                                    <input type="text" name="search" id="search"
                                        placeholder="Search by name, email..." value="{{ request('search') }}"
                                        class="block w-full pl-3 pr-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg
                            text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500
                            focus:border-gray-500 duration-200">
                                </div>
                            </div>

                            <!-- Skill Filter -->
                            <div>
                                <label for="skill" class="block text-sm font-medium mb-2 text-white">
                                    Filter by Skill
                                </label>
                                <select name="skill" id="skill" onchange="this.form.submit()"
                                    class="block w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg
        text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500
        duration-200">
                                    <option value="">All Skills</option>
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}"
                                            {{ request('skill') == $skill->id ? 'selected' : '' }}>
                                            {{ $skill->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <!-- Tombol Submit (opsional jika tanpa onchange) -->
                        {{-- <div class="mt-4">
                <button type="submit"
                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600">
                    Filter
                </button>
            </div> --}}
                    </form>
                </div>
            </div>

            <script>
                // Auto-submit form when search input changes (with debounce)
                let searchTimeout;
                document.getElementById('search').addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        document.getElementById('filterForm').submit();
                    }, 500); // 500ms delay
                });
            </script>

            {{-- <!-- Results Summary -->
            <div class="flex items-center justify-between mb-6">
                <div class="text-sm text-gray-600">

                </div>
                <div class="flex items-center space-x-2">
                    <label for="per_page" class="text-sm text-gray-600">Show:</label>
                    <select name="per_page" id="per_page" onchange="updatePerPage(this.value)"
                        class="text-sm border border-gray-300 rounded px-2 py-1 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </div> --}}

            <!-- Users Table -->
            <div class="bg-[#1e293b] rounded-xl shadow-sm border border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-700">
                        <thead class="bg-[#1e293b]">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <span>User</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Skills
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Description
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Joined Date
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Last Active
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#1e293b] divide-y divide-gray-700">
                            @forelse ($mentors as $user)
                                <tr class="hover:bg-[#334155] duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-start">
                                            <div class="flex-shrink-0 h-12 w-12">
                                                <img class="h-12 w-12 rounded-full object-cover"
                                                    src="{{ asset('storage/users/' . $user->img) }}"
                                                    alt="{{ $user->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">{{ $user->name }}</div>
                                                <div class="text-sm text-gray-400">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="relative group">
                                            <button type="button" 
                                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-blue-400 bg-blue-900/20 rounded-lg hover:bg-blue-900/30 focus:outline-none">
                                                <span>{{ count($user->skills) }} Skills</span>
                                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </button>
                                            <div class="absolute left-0 z-10 hidden w-48 mt-2 origin-top-left bg-[#1e293b] rounded-lg shadow-lg group-hover:block">
                                                <div class="py-2">
                                                    @forelse($user->skills as $skill)
                                                        <div class="px-4 py-2 text-sm text-gray-300 hover:bg-[#334155]">
                                                            {{ $skill->name }}
                                                        </div>
                                                    @empty
                                                        <div class="px-4 py-2 text-sm text-gray-400">
                                                            No skills
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-400 max-w-xs truncate">
                                            {{ $user->description }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        {{ $user->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        {{ $user->updated_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                        <div class="flex items-center justify-start space-x-2">
                                            <!-- Edit User -->
                                            <a href="{{ route('admin.mentors.edit', $user->id) }}"
                                                class="text-indigo-500 hover:text-indigo-400" title="Edit User">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px"
                                                    viewBox="0 -960 960 960" width="20px" fill="#999999">
                                                    <path
                                                        d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                                </svg>
                                            </a>

                                            <!-- Delete User -->
                                            <button onclick="openDeleteModal('{{ route('admin.mentors.destroy', $user->id) }}')"
                                                class="text-red-500 hover:text-red-400" title="Delete User">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
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
                                <!-- Empty State -->
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-gray-500 mb-4" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <h3 class="text-lg font-medium text-white mb-2">No mentors found</h3>
                                            <p class="text-gray-400 mb-4">Try adjusting your search or filter criteria.</p>
                                            <a href="{{ route('admin.mentors.create') }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg duration-200">
                                                Add First Mentor
                                            </a>
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
                    <h3 class="text-lg font-medium text-white">Delete Mentor</h3>
                </div>
            </div>
            <p class="text-sm text-gray-400 mb-4">Are you sure you want to delete this mentor? This action cannot be
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
    </script>

</x-LayoutAdmin>
