@extends('admin.dashboard')


@section('content')
    <a href="{{ route('page_create_client') }}">Create client</a>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">

            @foreach($clients as $client)

                <li class="nav-item">
                    <div class="nav-link active">
                            <i class="fas fa-building"></i>
                            {{ $client->name }}
                            <a class="bg-black right mr-3" onclick="event.preventDefault(); document.getElementById('delete-client').submit();">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <form id="delete-client" action="{{ route('delete_client', ['id' => $client->id]) }}" method="POST" class="d-none">
                                @method('DELETE')
                                @csrf
                            </form>

                            <a href="{{ route('page_edit_client', ['id' => $client->id]) }}" class="bg-black right">
                                <i class="fas fa-edit"></i>
                            </a>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $clients->links() }}
    </nav>
    @include('alert')
@endsection
