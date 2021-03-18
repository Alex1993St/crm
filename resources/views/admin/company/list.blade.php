@extends('admin.dashboard')


@section('content')
    <a href="{{ route('page_create_company') }}">Create company</a>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" >
            @foreach($companies as $company)
                <li class="nav-item">
                    <div class="nav-link active">
                            <i class="fas fa-building"></i>
                            {{ $company->name }}
                            <a class="bg-black right mr-3" onclick="event.preventDefault(); document.getElementById('delete-company').submit();">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <form id="delete-company" action="{{ route('delete_company', ['id' => $company->id]) }}" method="POST" class="d-none">
                                @method('DELETE')
                                @csrf
                            </form>

                            <a href="{{ route('page_edit_company', ['id' => $company->id]) }}" class="bg-black right">
                                <i class="fas fa-edit"></i>
                            </a>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $companies->links() }}
    </nav>
    @include('alert')
@endsection
