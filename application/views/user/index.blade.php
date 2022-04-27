<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User</title>
</head>

<body>
    <h1>User</h1>
    @foreach ($users['data'] as $user)
        <p>{{ $user->username }}</p>
    @endforeach

    {!! \NicehalfCore\System\Database\Database::links($users['current_page'], $users['pages']) !!}
</body>

</html>
