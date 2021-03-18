@extends('admin.dashboard')

@section('content')
    <a href="{{ route('clients') }}">back</a>
    <div class="header">Create</div>
    <form class="form-control-border ml-3" method="post" action="{{ route('create_client') }}">
        {{ csrf_field() }}
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar mb-3" type="text" name="name" placeholder="Name" required>
        </div>
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar mb-3" type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar mb-3" type="tel" name="phone" placeholder="Phone like 0631111111" required>
        </div>
        <input type="text" id="companies" class="input-group input-group-sm mb-3" placeholder="Write name company">
        <div class="dropdown"></div>
        <div>
            <input class="form-control form-control-navbar" type="submit" placeholder="Name">
        </div>
    </form>
    @if($errors->all())
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    @endif
    @include('alert')
@stop

@section('script')
   <script>
       var companies = $('#companies');
       $(function(){
           companies.keyup(function(e) {
               @include('admin.client.ajax')
           });
       });
   </script>
@stop
