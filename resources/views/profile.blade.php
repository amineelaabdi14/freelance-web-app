<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('edit-profile')}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="put" />
        <input type="text" name="newName">
        <input type="email" name="newEmail">
        <input type="password" name="newPassword">
        <input type="password" name="password">
        <button type="submit">submitini hh</button>
    </form>
</body>
</html>