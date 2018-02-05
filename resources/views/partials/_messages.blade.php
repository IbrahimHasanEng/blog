@if (Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show w-auto" role="alert">
    <h5>{{ Session::get('success') }}</h5>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
