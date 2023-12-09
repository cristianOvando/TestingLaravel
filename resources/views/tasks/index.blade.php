@extends('testing')

@section('content')

    <div class="container w-25 border p-4 mt-5">
        <form>
            <div class="mb-3">
              <label for="title" class="form-label">new homework</label>
              <input type="text" name="title" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">assignment</button>
        </form>
    </div>

@endsection
