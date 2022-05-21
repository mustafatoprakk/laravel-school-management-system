@extends("partials.master")
@section("content")

@if (session("success"))
    <div class="alert alert-succuss alert-dismissible fade show" role="alert">
        <p>{{ session("success") }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->any())
@foreach ($errors->all() as $err)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>{{ $err }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endforeach
@endif
<div class="container" style="margin-top: 5%">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="float-end">
                <a href="{{ route('course_create') }}" class="btn btn-primary ">Add New Course</a>
            </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col-1">id</th>
                    <th scope="col-7">Name</th>
                    <th scope="col-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <th scope="row">{{ $course->id }}</th>
                            <td>{{ $course->name }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="{{ route('course_edit', $course->id) }}" class="btn btn-success">Edit</a>
                                    </div>
                                    <div class="col-md-2">
                                        <form action="" method="post" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection