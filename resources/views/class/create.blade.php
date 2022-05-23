@extends("partials.master")
@section("content")

<div class="container" style="margin-top: 5%">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <form action="{{ route('class.store') }}" method="post">
                                @csrf
                                <p class="fs-3 text-center font-monospace">Create Class</p>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Class Name</label>
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="8-A" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="teacher_name" class="form-label">Teacher Name</label>
                                    <select class="form-select form-select-lg mb-3" name="teacher_name" id="teacher_name">
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="mb-3">
                                    <label for="class_number" class="form-label">Class Number</label>
                                    <select class="form-select form-select-lg mb-3" id="class_number" name="class_number">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                      <option value="11">11</option>
                                      <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="class_letter" class="form-label">Class Letter</label>
                                    <select class="form-select form-select-lg mb-3" name="class_letter">
                                      <option value="A">A</option>
                                      <option value="B">B</option>
                                      <option value="C">C</option>
                                      <option value="D">D</option>
                                      <option value="E">E</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="student_name" class="form-label">Students Name</label>
                                    <select class="form-select form-select-lg mb-3" multiple data-live-search="true" id="student_name" name="student_name[]">
                                        
                                    </select>
                                </div>
                                <div class="mb-3 pt-2">
                                    <button type="submit" class="btn btn-primary">Create Class</button>
                                    <a href="{{ route('class.index') }}" class="btn btn-danger">Back</a>
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $('#class_number').on('change',function(){
            var classNumber=this.value;
            $('#student_name').html('');
            $.ajax({
                url: "{{ url('fetch-student') }}",
                type: "POST",
                data: {
                    class_number: classNumber,
                    _token: "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function(result){
                    $('#district').html('<option value="">Select Student</option>');
                    $.each(result.students, function(key, value){
                        $('#student_name').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            })
        })
    })


</script>