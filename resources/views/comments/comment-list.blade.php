@foreach ($comments as $comment)
    @include('comments.comment', ['comment' => $comment])
@endforeach
{{ $comments->links() }}
