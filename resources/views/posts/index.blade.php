@foreach($posts as $post)
@include('posts.post',['post' => $post])
@endforeach

<script>
  $(document).ready(function() {
    $(document).on('input', ".comment-input", function() {
      let $btn = $(this).closest(".input-group").find('.comment-submit');
      if ($(this).val().trim() !== '') {
        $btn.show();
      } else {
        $btn.hide();
      }
    });

    $('.form-submit').submit(function(e) {
      e.preventDefault();
      const $this = $(this);
      const postId = $this.data('post-id');
      const commentData = $this.find('.comment-input').val();
      if (commentData.trim() === '') return;
      let commentUrl = "{{ route('posts.comments.store', ':post') }}";
      commentUrl = commentUrl.replace(':post', postId);
      console.log('data inter');
      $.ajax({
        type: "POST",
        url: commentUrl,
        data: {
          content: commentData,
          _token: "{{ csrf_token() }}"
        },
        beforeSend: function() {
          $this.find(".comment-submit").prop("disabled", true);
        },
        success: function(response) {
          if (response.success) {
            $this.closest(".comments-list").prepend(response.html);
            $this.find('.comment-input').val('');
          }
          $this.find(".comment-submit").prop("disabled", false);
        },


        error: function(xhr) {
          console.error("Error creating post:", xhr.responseText);
          $this.find(".comment-submit").prop("disabled", false);
        }

      });
    });


    $(document).on('click', '.likebtn', function(e) {
      e.preventDefault();

      const $this = $(this);
      const postId = $this.data('post-id');
      const $likeCount = $this.closest('.argon-reaction').find('.like-count');
      const $likeIcon = $this.closest('.argon-reaction').find('.like-icon');
      let likeUrl = "{{ route('posts.likes.store', ':post') }}";
      likeUrl = likeUrl.replace(':post', postId);
      $.ajax({
        type: 'POST',
        url: likeUrl,
        data: {
          _token: "{{ csrf_token() }}"
        },
        success: function(response) {
          // Update the like count
          if (response.success) {

            const newCount = response.likes_count;
            const status = response.status;

            $likeCount.text(newCount);
            if (response.is_liked === true) {
              $likeIcon.attr('src', '/assets/images/profile_post/like.png');
            } else {
              $likeIcon.attr('src', '/assets/images/profile_post/unlike.png');
            }
          }
        },
        error: function(response) {
          console.error('Something went wrong while liking the post.');
        }
      });
    });

    // comment_like system

    $(document).on('click', '.like-btn', function(e) {
      e.preventDefault();
      let $this = $(this);
      let commentId = $this.data('comment-id');
      let commentUrl = "{{ route('comments.like.store', ':comment') }}";
      commentUrl = commentUrl.replace(':comment', commentId);
      let $img = $this.find('img');
      let $like_count = $this.closest('.comment-actions').find('.like-count');
      console.log(commentUrl);
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
          console.log($like_count);
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