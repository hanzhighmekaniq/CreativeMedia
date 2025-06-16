<x-LayoutAdmin>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Edit Article</h1>
            <a href="{{ route('admin.articles.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to Articles
            </a>
        </div>

        <div class="bg-[#1e293b] rounded-lg p-6">
            <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-300 mb-1">Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full px-3 py-2 bg-[#0f172a] border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('title', $article->title) }}" required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="sub_category_id" class="block text-sm font-medium text-gray-300 mb-1">Category</label>
                    <select name="sub_category_id" id="sub_category_id"
                        class="w-full px-3 py-2 bg-[#0f172a] border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">Select Category</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                {{ old('sub_category_id', $article->sub_category_id) == $subcategory->id ? 'selected' : '' }}>
                                {{ $subcategory->category->title }} - {{ $subcategory->title }}</option>
                        @endforeach
                    </select>
                    @error('sub_category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-300 mb-1">Content</label>
                    <div class="relative">
                        <textarea name="content" id="content" class="summernote hidden">{{ old('content', $article->content) }}</textarea>
                        <div id="content-preview"
                            class="w-full px-3 py-2 bg-[#0f172a] border border-gray-600 rounded-md text-white min-h-[100px] cursor-pointer">
                            {{ old('content', $article->content) ? 'Click here to edit content...' : 'Click here to edit content...' }}
                        </div>
                    </div>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-300 mb-1">Thumbnail</label>
                    @if ($article->thumbnail)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Current Thumbnail"
                                class="w-32 h-32 object-cover rounded">
                        </div>
                    @endif
                    <input type="file" name="thumbnail" id="thumbnail"
                        class="w-full px-3 py-2 bg-[#0f172a] border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        accept="image/*">
                    @error('thumbnail')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                    <select name="status" id="status"
                        class="w-full px-3 py-2 bg-[#0f172a] border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft
                        </option>
                        <option value="published"
                            {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>
                            Published</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Update Article
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Content Editor Modal -->
    <div id="content-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="bg-[#1e293b] w-full h-full rounded-lg flex flex-col">
                <div class="p-4 border-b border-gray-700 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-white">Edit Content</h3>
                    <button type="button" id="close-modal" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex-1 p-4 overflow-hidden">
                    <div id="modal-editor" class="h-full"></div>
                </div>
                <div class="p-4 border-t border-gray-700 flex justify-end space-x-2">
                    <button type="button" id="cancel-edit"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                        Cancel
                    </button>
                    <button type="button" id="save-content"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Save Content
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let editor;
            const modal = $('#content-modal');
            const modalEditor = $('#modal-editor');
            const contentPreview = $('#content-preview');
            const contentInput = $('#content');

            // Initialize Summernote in modal
            function initEditor() {
                editor = modalEditor.summernote({
                    height: '100%',
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                    callbacks: {
                        onImageUpload: function(files) {
                            for (let file of files) {
                                let data = new FormData();
                                data.append('file', file);
                                data.append('_token', '{{ csrf_token() }}');
                                $.ajax({
                                    url: '{{ route('admin.summernote.upload') }}',
                                    method: 'POST',
                                    data: data,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        if (response.url) {
                                            editor.summernote('insertImage', response.url,
                                                function($image) {
                                                    $image.css('width', '100%');
                                                    $image.attr('data-filename',
                                                        'retriever');
                                                });
                                        }
                                    }
                                });
                            }
                        }
                    }
                });

                // Set initial content if exists
                const initialContent = contentInput.val();
                if (initialContent) {
                    editor.summernote('code', initialContent);
                }
            }

            // Open modal
            contentPreview.click(function() {
                modal.removeClass('hidden');
                if (!editor) {
                    initEditor();
                }
            });

            // Close modal
            $('#close-modal, #cancel-edit').click(function() {
                modal.addClass('hidden');
            });

            // Save content
            $('#save-content').click(function() {
                const content = editor.summernote('code');
                contentInput.val(content);
                contentPreview.html(content || 'Click here to edit content...');
                modal.addClass('hidden');
            });

            // Handle category change
            $('#sub_category_id').change(function() {
                const categoryId = $(this).val();
                const subCategorySelect = $('#sub_category_id');
                
                // Don't clear the select if no category is selected
                if (!categoryId) {
                    return;
                }

                // Disable the select while loading
                subCategorySelect.prop('disabled', true);
                
                $.ajax({
                    url: '{{ route('admin.articles.subcategories') }}',
                    method: 'GET',
                    data: {
                        category_id: categoryId
                    },
                    success: function(response) {
                        // Clear existing options except the first one
                        subCategorySelect.find('option:not(:first)').remove();
                        
                        // Add new options
                        response.forEach(function(subCategory) {
                            subCategorySelect.append(
                                $('<option></option>')
                                    .val(subCategory.id)
                                    .text(subCategory.title)
                            );
                        });
                        
                        // If editing, select the current subcategory
                        const currentSubCategoryId = '{{ old('sub_category_id', $article->sub_category_id) }}';
                        if (currentSubCategoryId) {
                            subCategorySelect.val(currentSubCategoryId);
                        }
                    },
                    error: function() {
                        alert('Failed to load sub categories');
                    },
                    complete: function() {
                        subCategorySelect.prop('disabled', false);
                    }
                });
            });

            // Don't trigger change event on page load
            // This was causing the error because it was trying to load subcategories
            // before the user had selected a category
        });
    </script>
</x-LayoutAdmin>
