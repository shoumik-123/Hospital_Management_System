

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Doctor Admin</title>

    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">

        <div class="container my-20" align="center" style="height: 70vh ;box-sizing: border-box">


            @if(session('success'))
                <div id="successAlert" class="alert alert-success">
                    {{ session('success') }}
                    <button id="closeSuccessAlert" type="button" class="close float-end" data-dismiss="alert">
                        X
                    </button>
                </div>
            @endif


                <form class="w-75 text-left" method="POST" action="{{ route('editDoctor' , $doctor->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div  class="p-7 w-100">
                                <label>Doctor Name : </label>
                                <input class="form-input transform mt-2 w-100 text-black" type="text" name="name" value="{{ $doctor->name }}" placeholder="Write the name....."  required>
                            </div>
                            <div  class="p-7 w-100">
                                <label>Number : </label>
                                <input class="form-input transform mt-2 w-100 text-black" type="number" name="number" value="{{  $doctor->phone }}" placeholder="Phone  Number....." required>
                            </div>
                            <div  class="p-7 w-100">
                                <label>Speciality : </label>
                                <select name="speciality" class="text-black" required>
                                    <option value="skin" <?php echo ($doctor->speciality == "skin") ? "selected" : ""; ?>>Skin</option>
                                    <option value="heart" <?php echo ($doctor->speciality == "heart") ? "selected" : ""; ?>>Heart</option>
                                    <option value="eye" <?php echo ($doctor->speciality == "eye") ? "selected" : ""; ?>>Eye</option>
                                    <option value="nose" <?php echo ($doctor->speciality == "nose") ? "selected" : ""; ?>>Nose</option>
                                </select>

                            </div>
                            <div  class="p-7 w-100">
                                <label>Room Number : </label>
                                <input class="form-input transform mt-2 w-100 text-black" type="number" name="roomNumber" value="{{ $doctor->roomNumber }}" placeholder="Room Number....." required>
                            </div>
                            <div  class="p-7 w-100">
                                <label>Change Photo : </label>
                                <input class="form-input transform mt-2 w-100 text-black" type="file" name="image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div  class="p-7 w-100">
                                <label>Doctor Image : </label>
                                <img src="{{ asset('doctorImages/' . $doctor->image) }}"  alt="" style="height: 500px ;  width: 100%"/>
                            </div>
                        </div>
                    </div>

                    <div  class="px-7 w-100">
                        <input class="btn btn-success transform  py-3 w-100 text-black" type="submit" >
                    </div>

                </form>

        </div>

    </div>
</div>

@include('admin.script')

<script>
    let successAlert = document.getElementById('successAlert');
    setTimeout(function(){
        successAlert.style.display = 'none';
    }, 3000);

    document.querySelector('#successAlert .close').addEventListener('click', function() {
        successAlert.style.display = 'none';
    });
</script>

</body>
</html>
