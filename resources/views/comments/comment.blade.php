    <li class="media mb-3">
        <!-- <a href="#" class="pull-left"> -->
        <!-- <img src="{{ $comment->user->photo ?? asset('assets/images/users/default.png') }}"
                alt="{{ $comment->user->first_name }}"
                class="img-circle" width="40"> -->
        <!-- </a> -->
        <div class="media-body">
            <div class="d-flex justify-content-between align-items-center">
                <strong class="text-gray-dark">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</strong>
                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
            <p class="mb-1">{{ $comment->content }}</p>
            <div class="comment-actions">
                <button type="submit" class="btn btn-link btn-sm like-btn" data-comment-id="{{ $comment->id }}">
                    <img src="{{ $comment->is_liked ? asset('assets/images/profile_post/like.png') : asset('assets/images/profile_post/unlike.png') }}"
                        style="width:23px; height:23px" class="icon">
                </button>
                <span class="like-count" id="comment-like-count-{{ $comment->id }}">{{ $comment->likes()->count()}}</span>
                <button type="button" class="btn-reply" data-comment-id="{{ $comment->id }}">
                    Reply
                </button>
                <!-- Reply form -->
                <form class="reply-form mb-2" data-comment-id="{{ $comment->id }}" data-post-id="{{$post->id}}" style="display:none;">
                    <div class="reply-box">
                        <input type="text" name="content" class="reply-input" placeholder="Write a reply..." />
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <button type="submit" class="btn-send">
                            <img src="{{ asset('assets/images/profile_post/reply.png') }}" style="width:20px; height:20px;">
                        </button>
                    </div>
                </form>
                @if($comment->replies->count())
                <ul class="list-unstyled ml-4">
                    @foreach($comment->replies as $reply)
                    <li class="media mb-2">
                        <div class="media-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>{{ $reply->user->first_name }} {{ $reply->user->last_name }}</strong>
                                <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ $reply->content }}</p>
                            <!-- Like actions under reply -->
                            <div class="comment-actions d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-link btn-sm like-btn" data-comment-id="{{ $reply->id }}">
                                    <img src="{{ $reply->is_liked ? asset('assets/images/profile_post/like.png') : asset('assets/images/profile_post/unlike.png') }}"
                                        style="width:20px; height:20px;" class="icon">
                                </button>
                                <span class="like-count"id="comment-like-count-{{ $reply->id }}">{{ $reply->likes()->count() }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif