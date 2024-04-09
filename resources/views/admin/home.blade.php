

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
        @include('admin.body')
    </div>
</div>

@include('admin.script')

</body>
</html>
