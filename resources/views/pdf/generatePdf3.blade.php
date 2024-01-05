<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
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
                <th>Description</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr align="left">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->image }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
