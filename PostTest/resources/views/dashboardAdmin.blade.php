<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>Hasil data</h1>
    <table style="border: none">
        <tr>
            <td>NIM: </td>
            <td>{{ $NIK }}</td>
        </tr>
        <tr>
            <td>Nama: </td>
            <td>{{ $Nama }}</td>
        </tr>
        <tr>
            <td>Provinsi: </td>
            <td>{{ $Provinsi }}</td>
        </tr>
        <tr>
            <td>Kota: </td>
            <td>{{ $Kota }}</td>
        </tr>
        <tr>
            <td>Nomor Telephon: </td>
            <td>{{ $Nomor }}</td>
        </tr>
    </table>
    <a href="/">Back</a>
</body>
</html>