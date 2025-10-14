<div class="post border-bottom p-3 bg-white w-shadow">
    <div class="media text-muted pt-3">
        <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="Online user" class="mr-3 post-user-image" />
        <div class="media-body pb-3 mb-0 small lh-125">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a href="#" class="text-gray-dark post-user-name">
                    @if (!empty($post->user->first_name) && !empty($post->user->last_name))
                        {{ $post->user->first_name }} {{ $post->user->last_name }}
                    @endif
                </a>

                @if ((int) $post->user_id === auth()->id())
                    <div class="dropdown">
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item">Delete</button>
                            </form>
                        </div>
                    </div>
                @endif
                <div class="dropdown">
                    <a href="#" class="post-more-settings" role="button" data-toggle="dropdown" id="postOptions"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left post-dropdown-menu">
                        <a href="#" class="dropdown-item" aria-describedby="savePost">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="bx bx-bookmark-plus post-option-icon"></i>
                                </div>
                                <div class="col-md-10">
                                    <span class="fs-9">Save post</span>
                                    <small id="savePost" class="form-text text-muted">Add this to your saved
                                        items</small>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item" aria-describedby="hidePost">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="bx bx-hide post-option-icon"></i>
                                </div>
                                <div class="col-md-10">
                                    <span class="fs-9">Hide post</span>
                                    <small id="hidePost" class="form-text text-muted">See fewer posts like this</small>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item" aria-describedby="snoozePost">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="bx bx-time post-option-icon"></i>
                                </div>
                                <div class="col-md-10">
                                    <span class="fs-9">Snooze Lina for 30 days</span>
                                    <small id="snoozePost" class="form-text text-muted">Temporarily stop seeing
                                        posts</small>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item" aria-describedby="reportPost">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="bx bx-block post-option-icon"></i>
                                </div>
                                <div class="col-md-10">
                                    <span class="fs-9">Report</span>
                                    <small id="reportPost" class="form-text text-muted">I'm concerned about this
                                        post</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <span class="d-block">{{ $post->created_at->diffForHumans() }}
                <i class="bx bx-globe ml-3"></i></span>
        </div>
    </div>
  

    <div class="post-card"
        onclick="window.location='{{ route('posts.show', $post->id) }}'">
        <p>  {{ $post->content }}</p>
    </div>
    <!-- <div class="d-block mt-3"> -->
    <!-- <img
      src="https://scontent.fevn1-2.fna.fbcdn.net/v/t1.0-9/56161887_588993861570433_2896723195090436096_n.jpg?_nc_cat=103&_nc_eui2=AeFI0UuTq3uUF_TLEbnZwM-qSRtgOu0HE2JPwW6b4hIki73-2OWYhc7L1MPsYl9cYy-w122CCak-Fxj0TE1a-kjsd-KXzh5QsuvxbW_mg9qqtg&_nc_ht=scontent.fevn1-2.fna&oh=ea44bffa38f368f98f0553c5cef8e455&oe=5D050B05"
      class="post-content"
      alt="post image" />
  </div> -->
    <div class="mb-7 ml-3 post-reactions d-flex align-items-center gap-3">
        <!-- Like Button -->
        <div class="argon-reaction d-flex align-items-center">
            <button class="likebtn d-flex align-items-center" data-post-id="{{ $post->id }}" type="button">
                <img src="{{ $post->isliked ? asset('assets/images/profile_post/like-new.png') : asset('assets/images/profile_post/unlike-new.png') }}"
                    width="20" class="like-icon mr-1" alt="Like" />
                <span class="like-count">{{ $post->likes()->count() }}</span>
            </button>
        </div>
        <!-- Comment Button -->
        <button class="show-comments d-flex align-items-center" data-post-id="{{ $post->id }}" type="button">
            <i class="bx bx-message-rounded mr-2"></i>
            <span class="comment-count">{{ $post->comments()->count() }}</span>
        </button>
        <!-- Share Button -->
        <div class="dropdown dropup share-dropup d-flex align-items-center">
            <a href="#" class="post-card d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="bx bx-share-alt mr-2"></i> Share
                {{-- kkkkkk --}}
            </a>
        </div>
    </div>
    <!-- comments -->
    <div class="border-top pt-3 hide-comments hidden" id="comments-{{ $post->id }}"
        data-post-id="{{ $post->id }}">
        <div class="row bootstrap snippets">
            <div class="col-md-12">
                <div class="comment-wrapper">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <ul class="media-list comments-list">
                                <li class="media comment-form">
                                    <a href="#" class="pull-left">
                                        <img src="assets/images/users/user-4.jpg" alt=""
                                            class="img-circle" />
                                    </a>
                                    <div class="media-body">
                                        <form action="" method="" role="form" class="form-submit"
                                            data-post-id="{{ $post->id }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control comment-input"
                                                            placeholder="Write a comment..." />
                                                        <div class="input-group-append">
                                                            <button type="submit" class="comment-submit  p-0"
                                                                style="border:none; background:none;  display: none;">
                                                                <img src="{{ asset('assets/images/profile_post/up.png') }}"
                                                                    style="width:20px; height:20px;" alt="upload">
                                                            </button>
                                                        </div>
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn comment-form-btn"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Tooltip on top">
                                                                <i class="bx bxs-smiley-happy"></i>
                                                            </button>
                                                            <button type="button"
                                                                class="btn comment-form-btn comment-form-btn"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Tooltip on top">
                                                                <i class="bx bx-camera"></i>
                                                            </button>
                                                            <button type="button"
                                                                class="btn comment-form-btn comment-form-btn"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Tooltip on top">
                                                                <i class="bx bx-microphone"></i>
                                                            </button>
                                                            <button type="button" class="btn comment-form-btn"
                                                                data-toggle="tooltip" data-placement="top"
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
                                @foreach ($post->comments as $comment)
                                    @include('comments.comment', ['comment' => $comment])
                                @endforeach
                                {{-- <li class="media">
                                    <a href="#" class="pull-left">
                                        <img src="assets/images/users/user-2.jpg" alt=""
                                            class="img-circle" />
                                    </a>
                                </li> --}}
                                <li class="media">
                                    <div class="media-body">
                                        <div class="comment-see-more text-center">
                                            <button type="button" class="btn btn-link fs-8">
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
