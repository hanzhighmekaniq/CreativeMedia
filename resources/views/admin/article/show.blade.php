<x-LayoutAdmin>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Article Details</h1>
            <a href="{{ route('admin.articles.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to Articles
            </a>
        </div>

        <div class="bg-[#1e293b] rounded-lg p-6">
            <div class="mb-6">
                @if ($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                        class="w-full h-64 object-cover rounded-lg mb-4">
                @endif
                <h2 class="text-xl font-bold text-white mb-2">{{ $article->title }}</h2>
                <div class="flex items-center text-gray-400 text-sm mb-4">
                    <span class="mr-4">Category: {{ $article->subCategory->category->title }} / {{ $article->subCategory->title }}</span>
                    <span class="mr-4">Author: {{ $article->user->name }}</span>
                    <span class="mr-4">Status: <span class="px-2 py-1 rounded-full {{ $article->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">{{ ucfirst($article->status) }}</span></span>
                    <span>Created: {{ $article->created_at->format('M d, Y') }}</span>
                </div>
            </div>

            <div class="prose prose-invert max-w-none">
                {!! $article->content !!}
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin.articles.edit', $article) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit Article
                </a>
                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this article?')"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete Article
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-LayoutAdmin> 