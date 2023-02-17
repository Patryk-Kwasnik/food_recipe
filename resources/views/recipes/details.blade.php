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
    <body class="antialiased dark:bg-slate-800">
    <div class="container flex flex-row mx-auto">
        <div class="flex-1 w-50 flex flex-col h-fit max-w-lg p-6 mx-auto text-center text-zinc-800 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 bg-amber-500 ">
            <span>{{$results['name']}} <i class="fa-solid fa-star "></i>{{$results['user_ratings']['score']}}</span>
            <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700 list-disc list-inside">
                <li class="flex space-x-3 mx-4 leading-3">{{ Lang::get('api.calories') }} {{$results['nutrition']['calories']}}</li>
                <li class="flex space-x-3 mx-4 leading-3">{{ Lang::get('api.protein') }} {{$results['nutrition']['protein']}}</li>
                <li class="flex space-x-3 mx-4 leading-3">{{ Lang::get('api.fat') }} {{$results['nutrition']['fat']}}</li>
                <li class="flex space-x-3 mx-4 leading-3">{{ Lang::get('api.sugar') }} {{$results['nutrition']['sugar']}}</li>

                <li class="flex space-x-3 mx-4 leading-3">{{ Lang::get('api.total_time_tier') }} {{$results['total_time_tier']['display_tier']}}</li>
                <li class="flex space-x-3 mx-4">{{ Lang::get('api.description') }} {{$results['description']}}</li>
            </ul>
        </div>
        <div class="justify-self-auto flex-1">
            <div class=" sm:w-5/12 px-4">
                <a class="group/item hover:bg-slate-100" href=" {{ url('recipes/details/'.$results['id']) }}">
                    <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="{{$results['thumbnail_url']}}" alt="{{$results['thumbnail_alt_text']}}">
                </a>
            </div>

        </div>

    </div>
    </body>
</html>
