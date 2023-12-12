@extends('testing')

@section('content')


<div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
        <form  method="POST" action="{{route('categories.update',['category' => $category->id])}}">
            @method('PATCH')
            @csrf

            <div class="mb-3 col">

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                 @error('color')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

              <label for="name" class="form-label">Name category</label>
              <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color category</label>
                <input type="color" name="color" class="form-control">
              </div>
            <button type="submit" class="btn btn-primary">Updated category</button>
        </form>

        <div>
            @if ($category->tasks->count() > 0)
                @foreach ($category->tasks as $task )
                    <div class="row py-1">
                        <div class="col-ms-9 d-flex aling-items-center">
                            <a href="{{ route('todos-edit', ['id' => $task->id]) }}">{{ $task->title }}</a>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <form action="{{ route('tasks-destroy', [$task->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            @endif

            there are no tasks

        </div>
    </div>
</div>

@endsection
