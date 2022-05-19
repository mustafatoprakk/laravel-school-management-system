@extends("partials.master")
@section("content")


<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-md-6 offset-md-3">
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
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action="{{ route('login_action') }}" method="post">
                                @csrf
                                <p class="fs-3 text-center pb-3 font-monospace">Login</p>
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Your Password">
                                </div>
                                <div class="mb-3 d-grid gap-2">
                                    <button class="btn btn-primary">Login</button>
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