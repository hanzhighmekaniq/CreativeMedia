<x-LayoutAdmin>
    <div class="bg-[#0f172a]">
        <div class="w-full mx-auto">
            <div class="flex items-center justify-between mb-6">
                <p class="text-2xl font-bold text-white">Edit Student Work</p>
                <a href="{{ route('admin.student-works.index') }}" 
                   class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                    Back to List
                </a>
            </div>

            <div class="bg-[#1e293b] rounded-xl shadow-sm border border-gray-700 overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.student-works.update', $studentWork->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-white mb-2">Name</label>
                            <input type="text" name="name" id="name" 
                                   class="block w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg text-white
                                   placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500
                                   duration-200 @error('name') border-red-500 @enderror"
                                   value="{{ old('name', $studentWork->name) }}" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-white mb-2">Image</label>
                            @if($studentWork->image)
                                <div class="mb-4">
                                    <img src="{{ asset('storage/' . $studentWork->image) }}" 
                                         alt="{{ $studentWork->name }}" 
                                         class="w-32 h-32 object-cover rounded-lg">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" 
                                   class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-md 
                                   file:border-0 file:text-sm file:font-semibold file:bg-[#0f172a] file:text-white
                                   hover:file:bg-[#1e293b] @error('image') border-red-500 @enderror"
                                   accept="image/*">
                            <p class="mt-1 text-sm text-gray-400">Allowed formats: JPEG, PNG, JPG, GIF. Max size: 2MB</p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-white mb-2">Description</label>
                            <textarea name="description" id="description" rows="4" 
                                      class="block w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg text-white
                                      placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500
                                      duration-200 @error('description') border-red-500 @enderror">{{ old('description', $studentWork->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-LayoutAdmin> 