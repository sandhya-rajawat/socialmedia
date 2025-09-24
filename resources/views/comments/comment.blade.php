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
                @if($comment->is_liked)
                <img src="{{ asset('assets/images/profile_post/like.png') }}" style="width:29px" class="icon">
                @else
                <img src="{{ asset('assets/images/profile_post/unlike.png') }}" style="width:29px" class="icon">
                @endif
            </button>

            <span class="like-count">{{ $comment->like_count }}</span>
            <button type="button" class="btn btn-link btn-sm">Reply</button>
        </div>
    </div>
</li>
<script>
    $(document).ready(function() {
        $(".like-btn").on('click', function() {
            let $this = $(this);
            let commentId = $this.data('comment-id');
            let commentUrl = "{{ route('comments.like.store', ':comment') }}";
            commentUrl = commentUrl.replace(':comment', commentId);
            let $img = $this.find('img');
            let $like_count = $this.closest('.comment-actions').find('.like-count');

            $.ajax({
                url: commentUrl,
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function() {
                    $this.prop("disabled", true);
                },
                success: function(response) {

                    let newCount = response.likeCount;
                    let isLiked = response.is_liked;
                    $like_count.text(newCount);

                    if (isLiked) {
                        $img.attr('src', "{{ asset('assets/images/profile_post/like.png') }}");


                    } else {
                        $img.attr('src', "{{ asset('assets/images/profile_post/unlike.png') }}");

                    }
                    $this.prop("disabled", false);
                },

                error: function(xhr) {
                    console.log("Error:", xhr.responseText);
                     $this.prop("disabled", false);
                }
            })

        });
    });
</script>