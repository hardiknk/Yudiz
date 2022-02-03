<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>Country Data With City Count</h2>
        <table class="table  table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>Country Name</th>
                    <th>Country City Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($country_data as $item)
                    <tr>
                        <td> {{ $item->con_name }} </td>
                        <td> {{ $item->get_all_city_count }} </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
