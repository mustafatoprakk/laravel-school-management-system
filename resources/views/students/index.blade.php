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
                <a href="{{ route("student.create") }}" class="btn btn-primary ">Add New Student</a>
            </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Number</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $student->id }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->surname }}</td>
                            <td>{{ $student->number }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-success">Edit</a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{ route('student.destroy', $student->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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