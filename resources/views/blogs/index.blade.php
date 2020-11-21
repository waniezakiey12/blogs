@extends('layouts.app')

@section('content')
<a href="/blogs/create" class="btn btn-primary">Create new blog</a>
    <table class="table">
        <tr>
            <td>name</td>
            <td>description</td>
            <td>actions</td>
        </tr>
        @foreach ($blogs as $blog)
            <tr>
                <td>{{$blog->name}}</td>
                <td>{{$blog->text}}</td>
                <td><a class="btn btn-success" href="/blogs/{{$blog->id}}/edit">Edit</a> </td>

                <td>
                    <form action="/blogs/{{$blog->id}}" type="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger">delete</button>
                    </form>
                </td>
                
            </tr>
        @endforeach
</table>
{{$blogs->links()}}

@endsection

@push('scripts')
<script>
    
</script>
@endpush