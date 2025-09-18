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

  @foreach($posts as $post)
  @include('posts.post')
  @endforeach
</div>

@endsection