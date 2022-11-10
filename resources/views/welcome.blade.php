<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>Start</title>
</head>
<body>


    <h1 class="text-center mt-5 mb-3">Routes : </h1>

    @php
       $routes = Route::getRoutes();
        
        foreach ($routes as $key=>$value)
        {
            if($key>4)
            {
                echo "<p class = 'text-center'>".$value->uri()."</p>";
            }

        }
    @endphp
        
</body>
</html>