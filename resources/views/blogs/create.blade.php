@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="/blogs" method="POST">
        @csrf
        
            <div class="form-group">
                <label for="name">name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
              </div>
            <div class="form-group">
                <label for="name">description</label>
                <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
              </div>
              <input type="submit" value="Save" class="btn btn-primary">
    </form>
@endsection