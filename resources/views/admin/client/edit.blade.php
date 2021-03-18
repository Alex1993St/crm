@extends('admin.dashboard')

@section('content')
    <a href="{{ route('companies') }}">back</a>
    <div class="header">Edit</div>
    <form class="form-control-border ml-3" method="post" action="{{ route('edit_client') }}">
        @method('PUT')
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $client->id ?? '' }}">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar mb-3" type="text" name="name" placeholder="Name"  value="{{ $client->name ?? '' }}" required>
        </div>
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar mb-3" type="email" name="email" placeholder="Email"  value="{{ $client->email ?? '' }}" required>
        </div>
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar mb-3" type="tel" name="phone" placeholder="Phone like 0631111111"  value="{{ $client->phone ?? '' }}" required>
        </div>
        <input type="text" id="companies" class="input-group input-group-sm mb-3" placeholder="Write name company">
        <div class="dropdown"></div>
        <select class="input-group input-group-sm mb-3" name="company[]" multiple size="2" id="remove">
            @foreach($client->company as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="submit" placeholder="Name">
        </div>
    </form>
    @if($errors->all())
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    @endif
    @include('alert')
@endsection

@section('script')
    <script>
        var companies = $('#companies');
        $(function(){
            companies.keyup(function(e) {
                $('#remove').remove();
                @include('admin.client.ajax')
            });
        });
    </script>
@stop
