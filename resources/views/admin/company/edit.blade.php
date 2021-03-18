@extends('admin.dashboard')

@section('content')
    <a href="{{ route('companies') }}">back</a>
    <div class="header">Edit</div>
    <form class="form-control-border ml-3" method="post" action="{{ route('edit_company') }}">
        @method('PUT')
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $company->id ?? '' }}">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar mb-3" type="text" name="name" placeholder="Name"  value="{{ $company->name ?? '' }}" required>
        </div>
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar mb-3" type="email" name="email" placeholder="Email"  value="{{ $company->email ?? '' }}" required>
        </div>
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar mb-3" type="tel" name="phone" placeholder="Phone like 0631111111"  value="{{ $company->phone ?? '' }}" required>
        </div>
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
