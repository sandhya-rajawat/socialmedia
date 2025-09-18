@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="col-md-8 second-section" id="page-content-wrapper">
    <!-- Quick Links -->
    <div class="mb-3">
        <div class="btn-group d-flex bg-red-900">
            <!-- ...buttons... -->
        </div>
    </div>
    <!-- Post Form -->

    <div class="col-md-12 second-section" id="page-content-wrapper">
        <div class="mb-3">
            <div class="btn-group d-flex">
                <a
                    href="index.html"
                    class="btn btn-quick-links mr-3 ql-active">
                    <img
                        src="assets/images/icons/theme/speech.png"
                        class="mr-2"
                        alt="quick links icon" />
                    <span class="fs-8">Speech</span>
                </a>
                <a href="messages.html" class="btn btn-quick-links mr-3">
                    <img
                        src="assets/images/icons/theme/listen.png"
                        class="mr-2"
                        alt="quick links icon" />
                    <span class="fs-8">Listen</span>
                </a>
                <a href="watch.html" class="btn btn-quick-links">
                    <img
                        src="assets/images/icons/theme/watch.png"
                        class="mr-2"
                        alt="quick links icon" />
                    <span class="fs-8">Watch</span>
                </a>
            </div>
        </div>
        <!-- Post Form  -->
        <ul class="list-unstyled" style="margin-bottom: 0">
            <li class="media post-form w-shadow">
                <div class="media-body">
                    <div class="form-group post-input">
                        <textarea
                            class="form-control"
                            id="postForm"
                            rows="2"
                            placeholder="What's on your mind, Arthur?"></textarea>
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
                            <button type="button" class="btn btn-primary btn-sm">
                                Publish
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </div>

    <!-- Posts -->
    <div id="posts-section" class="posts-section mb-5" id="post">

    </div>
</div>