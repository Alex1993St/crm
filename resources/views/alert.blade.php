@if (session('success'))
    <div class="alert alert-success">
        Saved
    </div>
@endif


@if (session('delete'))
    <div class="alert alert-danger">
        Delete
    </div>
@endif

@if (session('edit'))
    <div class="alert alert-primary">
        Edit
    </div>
@endif
