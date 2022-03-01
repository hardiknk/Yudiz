<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">

<body>
    <div class="container">
        <h1>List Of The All Student </h1>
        
        <a style="margin-bottom: 10px" href=" {{ route('student.create') }} " class="btn btn-primary"> Add New Student
        </a>

        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email </th>
                    <th>Course </th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student_data as $item)
                    <tr>
                        <td> {{ $item->name }} </td>
                        <td> {{ $item->email }} </td>
                        <td> {{ $item->course }}</td>

                        <td> <a class="btn btn-warning" href="{{ URL::to('student/' . $item->id . '/edit') }}">Edit
                            </a>
                            <form action="{{ route('student.destroy', $item->id) }}" method="post"> @csrf
                                @method("DELETE") <button class="btn btn-danger"> Delte</button> </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
