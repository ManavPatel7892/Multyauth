<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <style>
        table tr td,
        table tr th{
            padding: 10px 15px;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr align="left">
                <th scope="row">No.</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Date Of Birth</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            <tr align="left">
                <td>{{ $users['id'] }}</td>
                <td>{{ $users['name'] }}</td>
                <td>{{ $users['last_name'] }}</td>
                <td>{{ $users['gender'] }}</td>
                <td>{{ $users['date_of_birth'] }}</td>
                <td>{{ $users['email'] }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
