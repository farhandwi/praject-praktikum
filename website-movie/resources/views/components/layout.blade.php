@props(['title', 'header1' => '', 'header2' => ''])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#ffffff]">

    <header>
        @include('components.navbar')
    </header>

    <main>
        <div class="w-full">
            {{$slot}}
        </div>
    </main>
</body>
</html>
