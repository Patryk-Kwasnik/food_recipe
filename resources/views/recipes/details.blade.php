<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Przepisy</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
        <script src="https://kit.fontawesome.com/1be28eb531.js" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
    <div class="container flex flex-row mx-auto">
        <div class="block">
            nutrition
            <p class="mx-4"> {{$results['nutrition']['calories']}}</p>
            <p class="mx-4"> {{$results['nutrition']['protein']}}</p>
            <p class="mx-4"> {{$results['nutrition']['fat']}}</p>
            <p class="mx-4"> {{$results['nutrition']['sugar']}}</p>
            <p class="mx-4"> {{$results['nutrition']['calories']}}</p>
            <p class="mx-4"> {{$results['total_time_tier']['display_tier']}}</p>
            <p class="mx-4"> {{$results['user_ratings']['score']}}</p>
        </div>
        <div class="justify-self-auto">
            <a class="group/item hover:bg-slate-100" href=" {{ url('recipes/details/'.$results['id']) }}">
                <img class="max-w-full max-h-96 rounded" src="{{$results['thumbnail_url']}}" alt="{{$results['thumbnail_alt_text']}}">
                <div class="group/edit invisible hover:bg-slate-200 group-hover/item:visible">
                    <span class=" absolute text-3xl text-amber-400 bottom-8 left-1/2 -translate-x-1/2">@if(isset($results['user_ratings']))<i class="fa-solid fa-star text-xs"></i>{{$results['user_ratings']['score']}}@endif</span>
                </div>
            </a>
            {{$results['name']}}
        </div>

    </div>
    </body>
</html>
