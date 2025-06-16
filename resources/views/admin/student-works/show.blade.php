<x-LayoutAdmin>
    <div class="bg-[#0f172a]">
        <div class="w-full mx-auto">
            <div class="flex items-center justify-between mb-6">
                <p class="text-2xl font-bold text-white">Student Work Details</p>
                <a href="{{ route('admin.student-works.index') }}" 
                   class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                    Back to List
                </a>
            </div>

            <div class="bg-[#1e293b] rounded-xl shadow-sm border border-gray-700 overflow-hidden">
                <div class="p-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-white mb-2">Name</h3>
                        <p class="text-gray-300">{{ $studentWork->name }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-white mb-2">Image</h3>
                        @if($studentWork->image)
                            <img src="{{ asset('storage/' . $studentWork->image) }}" 
                                 alt="{{ $studentWork->name }}" 
                                 class="w-64 h-64 object-cover rounded-lg">
                        @else
                            <p class="text-gray-400">No image available</p>
                        @endif
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-white mb-2">Description</h3>
                        <p class="text-gray-300 whitespace-pre-wrap">{{ $studentWork->description }}</p>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.student-works.edit', $studentWork->id) }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                            Edit
                        </a>
                        <form action="{{ route('admin.student-works.destroy', $studentWork->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200"
                                    onclick="return confirm('Are you sure you want to delete this student work?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-LayoutAdmin> 