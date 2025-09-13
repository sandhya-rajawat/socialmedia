<!-- Post Form -->
<ul class="list-unstyled" style="margin-bottom: 0">
  <li class="media post-form w-shadow">
    <div class="media-body">
      <form id="postForm" class="space-y-4 h-25 ">
        @csrf
        <div class="form-group post-input">
          <textarea
            class="form-control"
            name="content"
            rows="2"
            placeholder="What's on your mind,{{Auth::user()->first_name??'guest'}}"></textarea>
        </div>
        <div class="row post-form-group">
          <div class="col-md-9">
            <button
              type="button"
              class="btn btn-link post-form-btn btn-sm">
              <img
                src="assets/images/icons/theme/post-image.png"
                alt="post form icon" />
              <span>Photo/Video</span>
            </button>
            <button
              type="button"
              class="btn btn-link post-form-btn btn-sm">
              <img
                src="assets/images/icons/theme/tag-friend.png"
                alt="post form icon" />
              <span>Tag Friends</span>
            </button>
            <button
              type="button"
              class="btn btn-link post-form-btn btn-sm">
              <img
                src="assets/images/icons/theme/check-in.png"
                alt="post form icon" />
              <span>Check In</span>
            </button>
          </div>
          <div class="col-md-3 text-right">
            <button type="submit" id="btn" class="btn btn-primary btn-sm ">
              Publish
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>
</ul>
<!-- Posts Container -->
<div id="post-container" class="posts-section">
  {{-- Posts appended here --}}
</div>
<script>
  // Helper function to render a post's HTML
  function renderPost(post) {
    return `
      <div class="post border-bottom p-3 bg-white w-shadow mb-3">
        <div class="media text-muted pt-3">
          <img src="assets/images/users/user-1.jpg" alt="User" class="mr-3 post-user-image rounded-circle" width="50" />
          <div class="media-body pb-3 mb-0 small lh-125">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">qkjdkjdkjdksjdkj</strong>
              <small class="text-muted">Just now</small>
            </div>
          </div>
        </div>
        <div class="mt-3">
          <p>${post.content}</p>
        </div>
      </div>
    `;
  }
  $(document).ready(function() {
    // Fetch posts on page load
    function fetchPosts() {
      $.ajax({
        type: "GET",
        url: "{{ route('posts.index') }}",
        success: function(response) {
          $('#post-container').empty();
          response.posts.forEach(function(post) {
            $('#post-container').append(renderPost(post));
          });
        },
        error: function() {
          alert('Error fetching posts');
        }
      });
    }
    fetchPosts();
    // Submit post form via AJAX

    $('#postForm').submit(function(e) {
      e.preventDefault();
      let formData = new FormData(this);
      $('#btn').prop("disabled", true);
      $.ajax({
        type: "POST",
        url: "{{ route('posts.store') }}",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success) {
            $('#post-container').prepend(renderPost(response.post));
            // Reset textarea
            $("textarea[name='content']").val('');
          } else {
            console.log('Failed to save post');
          }
          $('#btn').prop("disabled", false);
        },
        error: function() {
          console.log('Error saving post');
          $('#btn').prop("disabled", false);
        }
      });
    });

  });
</script>