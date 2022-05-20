@extends("partials.master")
@section("content")


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
       
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection