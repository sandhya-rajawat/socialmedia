<ul class="list-unstyled" style="margin-bottom: 0">
  <li class="media post-form w-shadow">
    <div class="media-body">
      <form id="postForm" class="space-y-4 h-25">
        @csrf
        <div class="form-group post-input">
          <textarea
            class="form-control"
            name="content"
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
            <button type="submit" id="btn" class="btn btn-primary btn-sm">
              Publish
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>
</ul>


<script>
  $(document).ready(function() {
    $('#postForm').submit(function(e) {
      e.preventDefault();

      let textarea = $('#postForm')[0];
      let data = new FormData(textarea);
      $('#btn').prop("disabled", true);

      $.ajax({
        type: "POST",
        url: "{{route('posts.store')}}",
        data: data,
        processData: false,
        contentType: false,
        success: function(e) {
          console.log(e.success);
          $('#btn').prop("disabled", false);
          $("textarea[name='content']").val(' ');

        },
        error: function(e) {
          console.log('error here!!');
          $('#btn').prop("disabled", false);
          $("textarea[name='content']").val(' ');
        }
      })

    })
  })
</script>