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

    const likeIcon = post.is_liked ? "/assets/images/profile_post/like.png" : "/assets/images/profile_post/unlike.png";
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
                
               <img src="${likeIcon}" width="20" class="like-icon" />
               <i class="bx bxs-like mr-2"></i> 
              <span class="like-count">${post.like_count ?? 0}</span>
                </a>
                  </span>
                    </div>
                 <a href="javascript:void(0)" 
              class="post-card-buttons show-comments-btn" 
              data-post-id="${post.id}">
            <i class="bx bx-message-rounded mr-2">
             <img src="assets/images/profile_post/chat.png" alt="chat" width="25">
              </i>5
               </a>
                  
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
                   
                  </div>
                
                   

                   
                   <div
                  id="comments-${post.id}"
                    class="border-top pt-3  ">
                    <div class="row bootstrap snippets">
                      <div class="col-md-12">
                        <div class="comment-wrapper">
                          <div class="panel panel-info">
                            <div class="panel-body">
                              <ul class="media-list comments-list">
                                <li class="media comment-form">
                                  <a href="#" class="pull-left">
                                 
                                    <img
                                      src="assets/images/users/user-4.jpg"
                                      alt=""
                                      class="img-circle"
                                    />
                                  </a>
                                  <div class="media-body">
                                    <form action="" method="" role="form">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="input-group">
                                            <input
                                              type="text"
                                              class="form-control comment-input"
                                              placeholder="Write a comment..."
                                            /> <button type="submit" 
                                            class="comment-submit" 
                                           data-post-id="${post.id}"  
                                         style="border:none; background:none; padding:0; cursor:pointer; display:none;">
                                       <img src="assets/images/profile_post/up.png" style="width:20px; height:20px;" alt="upload">
                                     </button>
                                       
 
                                            <div class="input-group-btn">
                                          
                                              <button
                                                type="button" 
                                                class="btn comment-form-btn"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Tooltip on top"
                                              >
                                                <i
                                                  class="bx bxs-smiley-happy"
                                                ></i>
                                              </button>
                                              <button
                                                type="button"
                                                class="btn comment-form-btn comment-form-btn"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Tooltip on top"
                                              >
                                                <i class="bx bx-camera"></i>
                                              </button>
                                              <button
                                                type="button"
                                                class="btn comment-form-btn comment-form-btn"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Tooltip on top"
                                              >
                                                <i class="bx bx-microphone"></i>
                                              </button>
                                              <button
                                                type="button"
                                                class="btn comment-form-btn"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Tooltip on top"
                                              >
                                                <i class="bx bx-file-blank"></i>
                                              </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </li>
                                <li class="media" >
                                  <a href="#" class="pull-left">
                                    <img
                                      src="assets/images/users/user-2.jpg"
                                      alt=""
                                      class="img-circle"
                                    />
                                  </a>
                                  <div class="media-body">
                                    <div
                                      class="d-flex justify-content-between align-items-center w-100"
                                    >
                                      <strong class="text-gray-dark"
                                        ><a href="#" class="fs-8"
                                          >Karen Minas</a
                                     
                                        ></strong
                                      >
                                      <a href="#"
                                        ><i
                                          class="bx bx-dots-horizontal-rounded"
                                        ></i
                                      ></a>
                                    </div>
                                    <span class="d-block comment-created-time"
                                      >30 min ago</span
                                    >
                                    <p class="fs-8 pt-2">
                                      Lorem ipsum dolor sit amet, consectetur
                                      adipiscing elit. Lorem ipsum dolor sit
                                      amet,
                                      <a href="#">#consecteturadipiscing </a>.
                                    </p>
                                    <div class="commentLR">
                                      <button
                                        type="button"
                                        class="btn btn-link fs-8"
                                      >
                                        Like
                                      </button>
                                      <button
                                        type="button"
                                        class="btn btn-link fs-8"
                                      >
                                        Reply
                                      </button>
                                    </div>
                                  </div>
                                </li>
                                <li class="media">
                                  <a href="#" class="pull-left">
                                    <img
                                      src="https://bootdey.com/img/Content/user_2.jpg"
                                      alt=""
                                      class="img-circle"
                                    />
                                  </a>
                                  <div class="media-body">
                                    <div
                                      class="d-flex justify-content-between align-items-center w-100"
                                    >
                                      <strong class="text-gray-dark"
                                        ><a href="#" class="fs-8"
                                          >Lia Earnest</a
                                        ></strong
                                      >
                                      <a href="#"
                                        ><i
                                          class="bx bx-dots-horizontal-rounded"
                                        ></i
                                      ></a>
                                    </div>
                                    <span class="d-block comment-created-time"
                                      >2 hours ago</span
                                    >
                                    <p class="fs-8 pt-2">
                                      Lorem ipsum dolor sit amet, consectetur
                                      adipiscing elit. Lorem ipsum dolor sit
                                      amet,
                                      <a href="#">#consecteturadipiscing </a>.
                                    </p>
                                    <div class="commentLR">
                                      <button
                                        type="button"
                                        class="btn btn-link fs-8"
                                      >
                                        Like
                                      </button>
                                      <button
                                        type="button"
                                        class="btn btn-link fs-8"
                                      >
                                        Reply
                                      </button>
                                    </div>
                                  </div>
                                </li>
                              
                                <li class="media">
                                  <div class="media-body">
                                    <div class="comment-see-more text-center">
                                      <button
                                        type="button"
                                        class="btn btn-link fs-8"
                                      >
                                        See More
                                      </button>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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

  // like_system
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
  // Post_comment...................
  $(document).ready(function() {
    $(document).on("input", ".comment-input", function() {
      let $btn = $(this).closest(".input-group").find(".comment-submit");
      if ($(this).val().trim() !== "") {
        $btn.show();
      } else {
        $btn.hide();
      }
    });
    $(document).on("click", ".show-comments-btn", function(e) {
      e.preventDefault();
      let postId = $(this).data("post-id");
      $(`#comments-${postId}`).toggle();
    });

    $(document).on("click", ".comment-submit", function(e) {
      e.preventDefault();
      let postId = $(this).data("post-id");
      let $input = $(this).closest(".input-group").find(".comment-input");
      let content = $input.val().trim();
      if (content === "") return;
      let CommentUrl = "{{ route('posts.comments.store', ':post') }}";
      CommentUrl = CommentUrl.replace(':post', postId);
      // console.log(postId, content, CommentUrl); 
      $.ajax({
        type: "POST",
        url: CommentUrl,
        data: {
          _token: "{{ csrf_token() }}",
          content: content
        },
        success: function(response) {
          if (response.success) {
            console.log(" Comment saved:", response);
            $input.val("");
          }
        },
        error: function(xhr) {
          console.log(" Error:", xhr.responseText);
        }
      });
    });
  });
</script>