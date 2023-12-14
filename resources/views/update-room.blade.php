<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="update-room-body">
    <h2>Update Room Available</h2>
    <form action="/admin/dashboard/room/update/{{$room->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-sm">
            <div class="mb-3">
                <label for="room-title" class="form-label">Room Number</label>
                <input type="text" class="form-control" value="{{$room->title}}" name="new-room-title" id="room-title">
            </div>
            <div class="mb-3">
                <label for="room-type-id" class="form-label">Room Type-ID</label>
                <input type="text" class="form-control" value="{{$room->roomtype_id}}" name="room-type-id" id="room-type-id">
            </div>
            <div class="mb-3">
                <label for="available-status" class="form-label">Available Status</label>
                <select name="available-status" class="form-control" id="exampleSelect">
                    <option value="available">Available</option>
                    <option value="not available">Not Available</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
