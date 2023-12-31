@extends('testing')

@section('content')

    <div class="container w-25 border p-3 mt-5">
        <form  method="POST" action="{{ route('tasks') }}">
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message}}</h6>
            @enderror

            <div class="mb-3">
              <label for="title" class="form-label">new homework</label>
              <input type="text" name="title" class="form-control">
            </div>

            <label for="category_id" class="form-label">Task category</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">assignment</button>
        </form>
        <div>
            @foreach ($tasks as $task )
                <div class="row py-1">
                    <div class="col-m-9 d-flex align-items-center">
                        <a href="{{ route('tasks-edit', ['id' => $task->id])}}">{{ $task->title }}</a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('tasks-destroy', [$task->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
