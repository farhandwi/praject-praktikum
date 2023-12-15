<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendataan Penduduk</title>
</head>
<body>
    <h1>Selamat Datang!</h1>
    <table style="border: none">
        <form action="{{ route('submit-data') }}" method="POST">
            @csrf
            <tr>
                <td>NIK: </td>
                <td><input type="text" name="NIK" placeholder="input NIK"></td>
            </tr>
            <tr>
                <td>Nama: </td>
                <td><input type="text" name="Nama" placeholder="input Nama"></td>
            </tr>
            <tr>
                <td>Provinsi: </td>
                <td><input type="text" name="Provinsi" placeholder="input Provinsi"></td>
            </tr>
            <tr>
                <td>Kota: </td>
                <td><input type="text" name="Kota" placeholder="input Kota"></td>
            </tr>
            <tr>
                <td>Nomor Telepon: </td>
                <td><input type="text" name="Nomor" placeholder="input Nomor"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Submit</button>
                </td>
            </tr>

        </form>
    </table>
</body>
</html>