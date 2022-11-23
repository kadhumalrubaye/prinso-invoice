<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }
    </style>
</head>

<body class="antialiased">

    @foreach ($customers as $customer)



    <div class="card" style="width: 18rem;">

        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <p>phone number : {{ $customer->phone}}</p>
            </li>
            <li class="list-group-item">
                <p> name: {{ $customer->name}}</p>
            </li>
            <li class="list-group-item">
                <p>address: {{ $customer->address}}</p>
            </li>
        </ul>
    </div>


    @endforeach
</body>

</html>