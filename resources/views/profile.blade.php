@extends("partials.master")
@section("content")


<div class="container" style="margin-top: 5%">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if (session("success"))
                <p class="alert alert-success">{{ session("success") }}</p>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <form action="" method="post" class="row g-3">
                        @csrf
                        <div class="row my-3">
                            <div class="col-6">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" class="form-control form-control-lg" name="name" id="name" value="{{ $user->name }}">
                            </div>
                            <div class="col-6">
                              <label for="surname" class="form-label">Surname</label>
                              <input type="text" class="form-control form-control-lg" name="surname" id="surname" value="{{ $user->surname }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control form-control-lg" id="confirm_password" name="confirm_password">
                        </div>
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="date" class="form-control form-control-lg" id="birth_date" name="birth_date" value="{{ $user->birth_date }}">
                        </div>
                        <div class="mb-3 d-grid gap-2 col-3">
                            <button type="submit" class="btn btn-success btn-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection