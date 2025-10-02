   <div class="container mx-auto">
        <div class="post border-bottom p-3 bg-white shadow rounded">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="d-flex align-items-center">
                    <img src="{{ $post->user->photo ?? asset('assets/images/users/default.png') }}"
                        alt="{{ $post->user->name }}" class="w-10 h-10 rounded-full mr-2">
                    <div>
                        <p class="font-bold">{{ $post->user->first_name }} {{ $post->user->last_name }}</p>
                        <span class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="mb-3" id="post-text-{{ $post->id }}">
                    <p>{{ $post->content }}</p>
                </div>
