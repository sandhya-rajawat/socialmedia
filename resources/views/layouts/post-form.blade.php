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
            placeholder="What's on your mind,{{Auth::user()->first_name ??'guest'}}"></textarea>
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
             <span class="d-block">3 hours ago <i class="bx bx-globe ml-3"></i></span>
          </div>
         </div>
        <div class="mt-3">
       <p>${post.content}</p>
        </div>
       <div class="d-block mt-3">
                    <img
                      src="https://scontent.fevn1-2.fna.fbcdn.net/v/t1.0-9/56161887_588993861570433_2896723195090436096_n.jpg?_nc_cat=103&_nc_eui2=AeFI0UuTq3uUF_TLEbnZwM-qSRtgOu0HE2JPwW6b4hIki73-2OWYhc7L1MPsYl9cYy-w122CCak-Fxj0TE1a-kjsd-KXzh5QsuvxbW_mg9qqtg&_nc_ht=scontent.fevn1-2.fna&oh=ea44bffa38f368f98f0553c5cef8e455&oe=5D050B05"
                      class="post-content"
                      alt="post image"/>
                  </div>
              
                    <div class="argon-reaction">
                      <span class="like-btn">
                <a href="#" class="likebtn" data-post-id="${post.id}">
               <img src="assets/images/profile_post/unlike.png" width="20" class="like-icon" />
               <i class="bx bxs-like mr-2"></i> 
              <span class="like-count">${post.like_count ?? 0}</span>
                </a>
                  </span>
                    </div>
                   <a
                      href="javascript:void(0)"
                      class="post-card-buttons"
                      id="show-comments"
                      ><i class="bx bx-message-rounded mr-2"></i> 5</a
                    >
                  
                    <div class="dropdown dropup share-dropup">
                      <a
                        href="#"
                        class="post-card-buttons"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="bx bx-share-alt mr-2"></i> Share
                      </a>
                      <div class="dropdown-menu post-dropdown-menu">
                        <a href="#" class="dropdown-item">
                          <div class="row">
                            <div class="col-md-2">
                              <i class="bx bx-share-alt"></i>
                            </div>
                            <div class="col-md-10">
                              <span>Share Now (Public)</span>
                            </div>
                          </div>
                        </a>
                        <a href="#" class="dropdown-item">
                          <div class="row">
                            <div class="col-md-2">
                              <i class="bx bx-share-alt"></i>
                            </div>
                            <div class="col-md-10">
                              <span>Share</span>
                            </div>
                          </div>
                        </a>
                        <a href="#" class="dropdown-item">
                          <div class="row">
                            <div class="col-md-2">
                              <i class="bx bx-message"></i>
                            </div>
                            <div class="col-md-10">
                              <span>Send as Message</span>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div> </div>
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

  // like_system
  $(document).on('click', '.likebtn', function(e) {
    e.preventDefault();

    const $this = $(this);
    const postId = $this.data('post-id');
    const $likeCount = $this.closest('.argon-reaction').find('.like-count');
    const $likeIcon = $this.closest('.argon-reaction').find('.like-icon');
    $.ajax({
      type: 'POST',
      url: `/posts/${postId}/likes`,
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
</script>