@extends("partials.master")
@section("content")

<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <form action="{{ route('teacher.update', $teacher->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <p class="fs-3 text-center font-monospace">Teacher</p>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Teacher Name</label>
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $teacher->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="surname" class="form-label">Teacher Surname</label>
                                    <input type="text" class="form-control form-control-lg" id="surname" name="surname" value="{{ $teacher->surname }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Teacher Email</label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ $teacher->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="birth_date" class="form-label">Teacher Birth Date</label>
                                    <input type="date" class="form-control form-control-lg" id="birth_date" name="birth_date" value="{{ $teacher->birth_date }}">
                                </div>
                                <div class="mb-4">
                                    <label for="name" class="form-label">Teacher Branch</label>
                                    <select class="form-select form-select-lg mb-3" name="branch" id="branch" aria-label=".form-select-lg example">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}" @selected($teacher->branch == $course->id)>{{ $course->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="mb-5">
                                    <button type="submit" class="btn btn-success">Update Teacher</button>
                                    <a href="{{ route("teacher.index") }}" class="btn btn-danger">Back</a>
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