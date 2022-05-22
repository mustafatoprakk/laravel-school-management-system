@extends("partials.master")
@section("content")

<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <form action="{{ route('student.update', $student->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <p class="fs-3 text-center font-monospace">Student</p>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Student Name</label>
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $student->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="surname" class="form-label">Student Surname</label>
                                    <input type="text" class="form-control form-control-lg" id="surname" name="surname" value="{{ $student->surname }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Student Email</label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ $student->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Student Number</label>
                                    <input type="number" class="form-control form-control-lg" id="number" name="number" value="{{ $student->number }}">
                                </div>
                                <div class="mb-3">
                                    <label for="birth_date" class="form-label">Student Birth Date</label>
                                    <input type="date" class="form-control form-control-lg" id="birth_date" name="birth_date" value="{{ $student->birth_date }}">
                                </div>
                                <div class="mb-5">
                                    <button type="submit" class="btn btn-success">Update Student</button>
                                    <a href="{{ route("student.index") }}" class="btn btn-danger">Back</a>
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