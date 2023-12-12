@extends('testing')

@section('content')

    <div class="container w-25 border p-3 mt-5">
        <form  method="POST" action="{{ route('tasks-update', ['id' => $task->id]) }}">
            @method('PATCH')
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message}}</h6>
            @enderror

            <div class="mb-5 w-20">
              <label for="title" class="form-label">new homework</label>
              <input type="text" name="title" class="form-control" value="{{ $task->title }}">
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>

@endsection
