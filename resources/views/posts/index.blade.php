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
  });
</script>