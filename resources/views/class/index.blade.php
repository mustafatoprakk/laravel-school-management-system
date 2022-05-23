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
                <a href="{{ route('class.create') }}" class="btn btn-primary ">Add New Class</a>
            </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col-1">id</th>
                    <th scope="col-7">Class Name</th>
                    <th scope="col-7">Teacher Name</th>
                    <th scope="col-7">Students Name</th>
                    <th scope="col-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <th scope="row">{{ $class->id }}</th>
                            <td>{{ $class->name }}</td>
                            <td>{{ $class->teacher->name }}</td>
                            <td>
                                @foreach ($class->student_id as $student)
                                    {{ $student }}
                                @endforeach
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('class.edit', $class->id) }}" class="btn btn-success">Edit</a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{ route('class.destroy', $class->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger" type="submit">Delete</button>
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