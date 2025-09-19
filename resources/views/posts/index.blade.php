@foreach($posts as $post)
@include('posts.post',['post' => $post])

@endforeach