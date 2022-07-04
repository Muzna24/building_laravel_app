<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>issues</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            @forelse ($issues as $issue)
            <div class="col-3">
                <div class="card">
                    <div class="card-header">{{ $issue->message }}</div>
                    <div class="card-body">
                        <img src="{{ asset('images') }}" alt="">
                    </div>
                    <div class="card-footer">
                        {{ $issue->building_number }}
                        {{ $issue->apartment_number }}
                        <a href="/issues/edit/{{ $issue->id }}"><button class="btn btn-primary">{{ __('Edit') }}</button></a>
                        <a href="/issues/delete/{{ $issue->id }}"><button class="btn btn-danger">{{ __('Delete') }}</button></a>
                        </div>
                </div>
            </div>
            @empty
                {{ __('No Data') }}
            @endforelse
        </div>
    </div>
    


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>