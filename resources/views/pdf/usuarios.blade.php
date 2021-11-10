<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ci</th>
                <th>nombre</th>
                <th>apellido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
                <tr>
                    <td>{{ $user->ciusuario }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->nivel }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
