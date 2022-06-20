<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    {{-- <table class="table-hover" border="2">
        <th>User name</th>
        <th>Message</th>
        @foreach ($users as $user)
        <tr>
                @foreach ($user->issues as $issue)
                    <td>{{ $user->name }}</td>
                    <td>{{ $issue->message }}</td>
                @endforeach  
        </tr>
        @endforeach
    </table> --}}
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
                <div class="alart alart-success">User Name:{{ $user->name }}</div>
                <hr>
                <ul>
                    @foreach ($user->issues as $issue)
                        <li>{{ $issue->message }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>