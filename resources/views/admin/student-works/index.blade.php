<x-LayoutAdmin>
    <div class="bg-[#0f172a]">
        <div class="w-full mx-auto">
            <div class="flex justify-between items-center mb-6">
                <p class="text-2xl font-bold text-white">Student Works Management</p>
                <a href="{{ route('admin.student-works.create') }}" 
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                    Add New Work
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-[#1e293b] rounded-xl shadow-sm border border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-700">
                        <thead class="bg-[#1e293b]">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Image</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Created By</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#1e293b] divide-y divide-gray-700">
                            @forelse($studentWorks as $work)
                                <tr class="hover:bg-[#334155] duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ Storage::url($work->image) }}" alt="{{ $work->name }}" 
                                             class="h-16 w-16 object-cover rounded-lg">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $work->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-400">{{ Str::limit($work->description, 50) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $work->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $work->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center justify-start space-x-2">
                                            <a href="{{ route('admin.student-works.show', $work) }}" 
                                               class="text-indigo-500 hover:text-indigo-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.student-works.edit', $work) }}" 
                                               class="text-yellow-500 hover:text-yellow-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.student-works.destroy', $work) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        onclick="return confirm('Are you sure you want to delete this work?')"
                                                        class="text-red-500 hover:text-red-400">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center w-full">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                            </svg>
                                            <h3 class="text-lg font-medium text-white mb-2">No student works found</h3>
                                            <p class="text-gray-400 mb-4">Try adding a new work or adjust your search.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 bg-[#1e293b] border-t border-gray-700">
                    {{ $studentWorks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-LayoutAdmin>
