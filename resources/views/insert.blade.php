<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('/insert/form') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <br>
        <label for="description">Description</label>
        <textarea name="description" cols="30" rows="2"></textarea>
        <br>
        <label for="price">Price</label>
        <input type="number" name="price">
        <br>
        <label for="ratings">Ratings</label>
        <input type="number" name="ratings">
        <br>
        <label for="image">Image URL [/images/macarons/"filename"]</label>
        <input type="text" name="image">
        <br>
        <label for="flavor">Flavor</label>
        <input type="text" name="flavor">
        <br>
        <label for="bestselling">Best Selling [BestSelling | -]</label>
        <input type="text" name="bestselling">
        <br>
        <label for="seasonal">Seasonal [Seasonal | -]</label>
        <input type="text" name="seasonal">
        <br>
        <label for="limited">Limited [Limited | -]</label>
        <input type="text" name="limited">
        <br>
        <label for="new">New [New | -]</label>
        <input type="text" name="new">
        <br>
        <button type="submit">Submit</button>
    </form>
    <a href="/home">Home</a>
</body>
</html>

