

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">

        <div class="container my-20" align="center">


            @if(session('success'))
                <div id="successAlert" class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close float-end" data-dismiss="alert">
                        X
                    </button>
                </div>
            @endif

            <form class="w-50 text-left" method="POST" action="{{ route('uploadDoctor') }}" enctype="multipart/form-data">

                @csrf

                <div  class="p-7 w-100">
                    <label>Doctor Name : </label>
                    <input class="form-input transform mt-2 w-100 text-black" type="text" name="name" placeholder="Write the name....." >
                </div>
                <div  class="p-7 w-100">
                    <label>Number : </label>
                    <input class="form-input transform mt-2 w-100 text-black" type="number" name="number" placeholder="Phone  Number....." >
                </div>
                <div  class="p-7 w-100">
                    <label>Speciality : </label>
                    <select name="speciality" class="text-black">
                        <option>--Select--</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="nose">Nose</option>
                    </select>
                </div>
                <div  class="p-7 w-100">
                    <label>Room Number : </label>
                    <input class="form-input transform mt-2 w-100 text-black" type="number" name="roomNumber" placeholder="Room Number....." >
                </div>
                <div  class="p-7 w-100">
                    <label>Doctor Image : </label>
                    <input class="form-input transform mt-2 w-100 text-black" type="file" name="image" >
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
    setTimeout(function(){
        document.getElementById('successAlert').style.display = 'none';
    }, 3000);
</script>

</body>
</html>
