@extends("partials.master")
@section("content")

<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <form action="{{ route('course_update') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $course->id }}">
                                <p class="fs-3 text-center font-monospace">Course Update</p>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Course Name</label>
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $course->name }}">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Course Update</button>
                                    <a href="{{ route('course') }}" class="btn btn-danger">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection