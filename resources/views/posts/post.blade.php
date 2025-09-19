<div class="post border-bottom p-3 bg-white w-shadow">
  <div class="media text-muted pt-3">
    <img
      src="assets/images/users/user-1.jpg"
      alt="Online user"
      class="mr-3 post-user-image" />
    <div class="media-body pb-3 mb-0 small lh-125">
      <div
        class="d-flex justify-content-between align-items-center w-100">
        <a href="#" class="text-gray-dark post-user-name">@if(!empty($post->user->first_name) && !empty($post->user->last_name))
          {{ $post->user->first_name }} {{ $post->user->last_name }}
          @endif</a>
        <div class="dropdown">
          <a
            href="#"
            class="post-more-settings"
            role="button"
            data-toggle="dropdown"
            id="postOptions"
            aria-haspopup="true"
            aria-expanded="false">
            <i class="bx bx-dots-horizontal-rounded"></i>
          </a>
          <div
            class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left post-dropdown-menu">
            <a
              href="#"
              class="dropdown-item"
              aria-describedby="savePost">
              <div class="row">
                <div class="col-md-2">
                  <i
                    class="bx bx-bookmark-plus post-option-icon"></i>
                </div>
                <div class="col-md-10">
                  <span class="fs-9">Save post</span>
                  <small
                    id="savePost"
                    class="form-text text-muted">Add this to your saved items</small>
                </div>
              </div>
            </a>
            <a
              href="#"
              class="dropdown-item"
              aria-describedby="hidePost">
              <div class="row">
                <div class="col-md-2">
                  <i class="bx bx-hide post-option-icon"></i>
                </div>
                <div class="col-md-10">
                  <span class="fs-9">Hide post</span>
                  <small
                    id="hidePost"
                    class="form-text text-muted">See fewer posts like this</small>
                </div>
              </div>
            </a>
            <a
              href="#"
              class="dropdown-item"
              aria-describedby="snoozePost">
              <div class="row">
                <div class="col-md-2">
                  <i class="bx bx-time post-option-icon"></i>
                </div>
                <div class="col-md-10">
                  <span class="fs-9">Snooze Lina for 30 days</span>
                  <small
                    id="snoozePost"
                    class="form-text text-muted">Temporarily stop seeing posts</small>
                </div>
              </div>
            </a>
            <a
              href="#"
              class="dropdown-item"
              aria-describedby="reportPost">
              <div class="row">
                <div class="col-md-2">
                  <i class="bx bx-block post-option-icon"></i>
                </div>
                <div class="col-md-10">
                  <span class="fs-9">Report</span>
                  <small
                    id="reportPost"
                    class="form-text text-muted">I'm concerned about this post</small>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <span class="d-block">{{$post->created_at->diffForHumans()}} <i class="bx bx-globe ml-3"></i></span>
    </div>
  </div>
  <div class="mt-3">
    <p>
      {{ $post->content}}
    </p>
  </div>
  <div class="d-block mt-3">
    <!-- <img
      src="https://scontent.fevn1-2.fna.fbcdn.net/v/t1.0-9/56161887_588993861570433_2896723195090436096_n.jpg?_nc_cat=103&_nc_eui2=AeFI0UuTq3uUF_TLEbnZwM-qSRtgOu0HE2JPwW6b4hIki73-2OWYhc7L1MPsYl9cYy-w122CCak-Fxj0TE1a-kjsd-KXzh5QsuvxbW_mg9qqtg&_nc_ht=scontent.fevn1-2.fna&oh=ea44bffa38f368f98f0553c5cef8e455&oe=5D050B05"
      class="post-content"
      alt="post image" />
  </div> -->
    <div class="mb-3">
      <!-- Reactions -->
      <div class="argon-reaction">
        <span class="like-btn">
          <a href="#" class="post-card-buttons" id="reactions"><i class="bx bxs-like mr-2"></i> Likes:{{ $post->likes_count }}</a>

        </span>
      </div>
      <button class="post-card-buttons" id="show-comments" type="button"
        style="border: none; background:none;">
        <img src="assets/images/profile_post/chat.png" alt="chat" width="25" class="mr-2"
          style="background: none; cursor: pointer;" />
        5
      </button>
      <div class="dropdown dropup share-dropup">
        <a"
          href="#"
          class="post-card-buttons"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false">
          <i class="bx bx-share-alt mr-2"></i> Share
          </a>
      </div>
    </div>
    <!-- pp -->
    <div
      class="border-top pt-3 hide-comments">
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
                        class="img-circle" />
                    </a>
                    <div class="media-body">
                      <form action="" method="" role="form">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="input-group">
                              <input
                                type="text"
                                class="form-control comment-input"
                                placeholder="Write a comment..." />
                              <div class="input-group-btn">
                                <button
                                  type="button"
                                  class="btn comment-form-btn"
                                  data-toggle="tooltip"
                                  data-placement="top"
                                  title="Tooltip on top">
                                  <i class="bx bxs-smiley-happy"></i></button>
                                <button
                                  type="button"
                                  class="btn comment-form-btn comment-form-btn"
                                  data-toggle="tooltip"
                                  data-placement="top"
                                  title="Tooltip on top">
                                  <i class="bx bx-camera"></i>
                                </button>
                                <button
                                  type="button"
                                  class="btn comment-form-btn comment-form-btn"
                                  data-toggle="tooltip"
                                  data-placement="top"
                                  title="Tooltip on top">
                                  <i class="bx bx-microphone"></i>
                                </button>
                                <button
                                  type="button"
                                  class="btn comment-form-btn"
                                  data-toggle="tooltip"
                                  data-placement="top"
                                  title="Tooltip on top">
                                  <i class="bx bx-file-blank"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </li>
                  <ul class="list-unstyled">
                    @foreach ($post->comments as $comment)
                    <li class="media">
                      <a href="#" class="pull-left">
                        <img
                          src="{{ $comment->user->profile_photo ?? asset('assets/images/users/default.jpg') }}"
                          alt="{{ $comment->user->name }}"
                          class="img-circle" />
                      </a>
                      <div class="media-body">
                        <div class="d-flex justify-content-between align-items-center w-100">
                          <strong class="text-gray-dark">
                            <a href="#" class="fs-8">{{ $comment->user->first_name }}</a>
                          </strong>
                          <a href="#"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        </div>
                        <span class="d-block comment-created-time">{{ $comment->created_at->diffForHumans() }}</span>
                        <p class="fs-8 pt-2">
                          {{ $comment->content }}
                        </p>
                        <div class="commentLR">
                          <button type="button" class="btn btn-link fs-8">Like</button>
                          <button type="button" class="btn btn-link fs-8">Reply</button>
                        </div>
                      </div>
                    </li>
              
                 
                    @endforeach
                  </ul>


                  <li class="media">
                    <div class="media-body">
                      <div class="comment-see-more text-center">
                        <button
                          type="button"
                          class="btn btn-link fs-8">
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