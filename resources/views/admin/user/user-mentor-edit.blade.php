<x-LayoutAdmin>
    <div class="bg-[#0f172a]">
        <div class="w-full mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-white">Edit Mentor</h1>
                <a href="{{ route('admin.mentors.index') }}"
                    class="px-4 py-2 bg-[#1e293b] text-white rounded-lg hover:bg-[#334155] duration-200">
                    Back to List
                </a>
            </div>

            <div class="bg-[#1e293b] rounded-xl p-6">
                <form action="{{ route('admin.mentors.update', $mentor) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-white mb-2">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $mentor->name) }}"
                            class="w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-white mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $mentor->email) }}"
                            class="w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="img" class="block text-sm font-medium text-white mb-2">Profile Image</label>
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset($mentor->img) }}" alt="{{ $mentor->name }}" class="w-20 h-20 rounded-full object-cover">
                            <input type="file" name="img" id="img" accept="image/*"
                                class="w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 @error('img') border-red-500 @enderror">
                        </div>
                        @error('img')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-white mb-2">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full px-3 py-2.5 bg-[#0f172a] border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 @error('description') border-red-500 @enderror">{{ old('description', $mentor->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Skills -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Skills</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($skills as $skill)
                                <div class="flex items-center">
                                    <input type="checkbox" name="skills[]" value="{{ $skill->id }}"
                                        id="skill_{{ $skill->id }}"
                                        class="w-4 h-4 text-blue-600 bg-[#0f172a] border-gray-600 rounded focus:ring-blue-500 focus:ring-2"
                                        {{ in_array($skill->id, old('skills', $mentor->skills->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <label for="skill_{{ $skill->id }}" class="ml-2 text-sm text-white">
                                        {{ $skill->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('skills')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 duration-200">
                            Update Mentor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-LayoutAdmin> 