<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="create-room-body">
    <h2>Create New Room</h2>

    <form action="/dashboard/createnewroom" method="POST">
        @csrf
        <div class="container-sm">
            <div class="mb-3">
                <label for="room-title" class="form-label">Room Number</label>
                <input type="text" class="form-control" name="new-room-title" id="room-title" placeholder="Enter new room number">
            </div>
            <div class="mb-3">
                <label for="room-type-id" class="form-label">Room Type-ID</label>
                <input type="text" class="form-control" name="room-type-id" id="room-type-id" placeholder="1,2,3,...">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create room</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
