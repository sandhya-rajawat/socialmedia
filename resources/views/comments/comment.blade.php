<li class="media mb-3">
    <a href="#" class="pull-left">
        <!-- <img src="{{ $comment->user->photo ?? asset('assets/images/users/default.png') }}"
             alt="{{ $comment->user->first_name }}"
             class="img-circle" width="40"> -->
    </a>
    <div class="media-body">
        <div class="d-flex justify-content-between align-items-center">
            <strong class="text-gray-dark">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</strong>
            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
        </div>
        <p class="mb-1">{{ $comment->content }}</p>
        <div class="comment-actions">
            <button type="button" class="btn btn-link btn-sm">Like</button>
            <button type="button" class="btn btn-link btn-sm">Reply</button>
        </div>
    </div>
</li>