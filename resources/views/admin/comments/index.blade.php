<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comments Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-6">
                        @forelse ($comments as $comment)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold">
                                            {{ substr($comment->user->name, 0, 1) }}
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-gray-900">
                                                {{ $comment->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-700">
                                            {{ $comment->content }}
                                        </p>
                                        <div class="mt-2 flex items-center space-x-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($comment->status === 'approved') bg-green-100 text-green-800
                                                @elseif($comment->status === 'rejected') bg-red-100 text-red-800
                                                @else bg-yellow-100 text-yellow-800
                                                @endif">
                                                {{ ucfirst($comment->status) }}
                                            </span>
                                            @if($comment->status === 'pending')
                                                <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-green-600 hover:text-green-900">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.comments.reject', $comment) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Reject</button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @if($comment->replies->count() > 0)
                                    <div class="mt-4 ml-14 space-y-4">
                                        @foreach($comment->replies as $reply)
                                            <div class="bg-white p-3 rounded-lg border">
                                                <div class="flex items-start space-x-3">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-8 h-8 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold text-sm">
                                                            {{ substr($reply->user->name, 0, 1) }}
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <div class="flex items-center justify-between">
                                                            <p class="text-sm font-medium text-gray-900">
                                                                {{ $reply->user->name }}
                                                            </p>
                                                            <p class="text-sm text-gray-500">
                                                                {{ $reply->created_at->diffForHumans() }}
                                                            </p>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-700">
                                                            {{ $reply->content }}
                                                        </p>
                                                        <div class="mt-2 flex items-center space-x-4">
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                                @if($reply->status === 'approved') bg-green-100 text-green-800
                                                                @elseif($reply->status === 'rejected') bg-red-100 text-red-800
                                                                @else bg-yellow-100 text-yellow-800
                                                                @endif">
                                                                {{ ucfirst($reply->status) }}
                                                            </span>
                                                            @if($reply->status === 'pending')
                                                                <form action="{{ route('admin.comment-replies.approve', $reply) }}" method="POST" class="inline">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit" class="text-green-600 hover:text-green-900">Approve</button>
                                                                </form>
                                                                <form action="{{ route('admin.comment-replies.reject', $reply) }}" method="POST" class="inline">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit" class="text-red-600 hover:text-red-900">Reject</button>
                                                                </form>
                                                            @endif
                                                            <form action="{{ route('admin.comment-replies.destroy', $reply) }}" method="POST" class="inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500 text-center">No comments found.</p>
                        @endforelse

                        <div class="mt-4">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 