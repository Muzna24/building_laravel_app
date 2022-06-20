<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <div class="container">
        <div class="row">
            <div class="col-6">
                @foreach ($errors as $error)
                    {{ $error }}
                @endforeach
            </div>
        </div>
    </div> --}}
    <form action="/issue/import" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="excelFile" id="excelFile">
        <input type="submit" value="Submit">
    </form>
    
</body>
</html>