<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    
    {{--forme--}}
    <div class="container">
      <div class="row pt-5">
      <h1>Add your issue: </h1>
      <form action="/issue/store" method="post" enctype="multiport/form-data">
        @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" require value="{{ Auth::User()->name }}">
      </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" require value="{{ Auth::User()->email }}">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">phone</label>
    <input type="phone" class="form-control" id="phone" name="phone" require>
  </div>
  <div class="mb-3">
    <label for="message" class="form-label">Message</label>
    <input type="textarea" class="form-control" id="message" name="message" require>
  </div>
  <div class="mb-3">
    <label for="building_number" class="form-label">Building No</label>
    <input type="txt" class="form-control" id="building_number" name="building_number" require>
  </div>
  <div class="mb-3">
    <label for="apartment_number" class="form-label">Apartment No</label>
    <input type="text" class="form-control" id="apartment_number" name="apartment_number" require>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Add attachment</label>
  <input class="form-control" type="file" id="formFile" name= "attachment">
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
    </div>
    {{--#forme--}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>