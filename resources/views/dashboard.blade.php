<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>here is the dashboard</h1>
    <form action="{{ route('delete-gig') }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="delete" />
        <input type="number" name="id">
        <input type="number" name="category_id">
        <input type="text" name="title">
        <input type="text" name="description">
        <input type="number" name="price">
        <input type="number" name="delivery_time">
        <button type="submit">ajoutini hh</button>
    </form>
</body>
</html>