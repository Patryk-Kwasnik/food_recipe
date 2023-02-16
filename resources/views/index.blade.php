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
    <section>
        <div class="bg-amber-100 py-40 pl-8">
            <div class="text-4xl"> Nagłówek</div>
            <p class="py-3 w-1/2">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
    </section>
    <div class="container mx-auto grid grid-cols-4 gap-4 justify-items-stretch">
        @foreach($results as $item)
            <div class="justify-self-auto relative">
                <a class="group/item hover:bg-slate-100" href=" {{ url('recipes/details/'.$item['id']) }}">
                    <img class="max-w-full max-h-96 rounded" src="{{$item['thumbnail_url']}}" alt="{{$item['thumbnail_alt_text']}}">
                    <div class="group/edit invisible hover:bg-slate-200 group-hover/item:visible">
                        <span class=" absolute text-3xl text-amber-400 bottom-8 left-1/2 -translate-x-1/2">@if(isset($item['user_ratings']))<i class="fa-solid fa-star text-xs"></i>{{$item['user_ratings']['score']}}@endif</span>
                    </div>
                </a>
                {{$item['name']}}
            </div>
        @endforeach
    </div>
    </body>
</html>
