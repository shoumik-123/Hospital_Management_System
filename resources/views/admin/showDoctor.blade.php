<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ALl Doctors Admin</title>

    @include('admin.css')
</head>
<body>
<div class="container-scroller">

    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">

        <div class="container-fluid p-28" >

            @if(session('success'))
                <div id="successAlert" class="alert alert-success">
                    {{ session('success') }}
                    <button id="closeSuccessAlert" type="button" class="close float-end" data-dismiss="alert">
                        X
                    </button>
                    </div>
            @endif

            <table class="table text-light">
                <tr>
                    <th>Image</th>
                    <th>Doctor Name</th>
                    <th>Phone</th>
                    <th>Speciality</th>
                    <th>Room Number</th>
                    <th>Actions</th>
                </tr>

                @foreach($data as $doctor)
                    <tr>
                        <td>
                            <img src="doctorImages/{{ $doctor->image }}" height="100" width="100">
                        </td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->speciality }}</td>
                        <td>{{ $doctor->roomNumber }}</td>
                        <td>
                            <a class="btn btn-outline-primary mr-4" href="{{ route('updateDoctor' , $doctor->id) }}">Update</a>
                            <a class="btn btn-outline-danger" href="{{ route('deleteDoctor' , $doctor->id) }}">Delete</a>
                        </td>


                    </tr>
                @endforeach


            </table>
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
