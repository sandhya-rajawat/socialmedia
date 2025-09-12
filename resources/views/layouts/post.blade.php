<div id="post-container">
  {{-- Posts will be appended here via AJAX --}}
</div>

<script>
  $(document).ready(function() {
    $.ajax({
      type: "GET",
      url: "{{ route('posts.index') }}",
      success: function(response) {
        let posts = response.posts;

        posts.forEach(function(post) {
          $('#post-container').append(`
          <div class="post border-bottom p-3 bg-white w-shadow">
  <div class="media text-muted pt-3">
    <img src="assets/images/users/user-1.jpg" alt="Online user" class="mr-3 post-user-image" />
    <div class="media-body pb-3 mb-0 small lh-125">
      <div class="d-flex justify-content-between align-items-center w-100">
        <a href="#" class="text-gray-dark post-user-name">John Michael</a>
        <div class="dropdown">
          <a href="#" class="post-more-settings" role="button" data-toggle="dropdown">
            <i class="bx bx-dots-horizontal-rounded"></i>
          </a>
        </div>
      </div>
      <span class="d-block">3 hours ago <i class="bx bx-globe ml-3"></i></span>
    </div>
  </div>
        
              <div class="mt-3">
                <p>${post.content}</p>
              </div>
            </div>
          `);
        });
      },
      error: function(e) {
        console.log("error find", e);
      }
    });

    // Helper function to calculate time since
    function timeSince(date) {
      const seconds = Math.floor((new Date() - date) / 1000);
      let interval = seconds / 3600;
      if (interval > 1) return Math.floor(interval) + " hours ago";
      interval = seconds / 60;
      if (interval > 1) return Math.floor(interval) + " minutes ago";
      return Math.floor(seconds) + " seconds ago";
    }
  });
</script>