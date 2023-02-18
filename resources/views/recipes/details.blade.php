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
        <script src="https://unpkg.com/flowbite@1.3.3/dist/flowbite.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

    </head>
    <header class="fixed w-full z-50">
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900 ">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="#" class="flex items-center">
                    <i class="fa-solid fa-bowl-food dark:text-white"></i>
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"> Przepisy</span>
                </a>
                <div class="flex items-center lg:order-2">
                    <div class="hidden mt-2 mr-4 sm:inline-block">
                        <span></span>
                    </div>
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-white bg-purple-700 rounded lg:bg-transparent lg:text-purple-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Przepisy</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Tekst</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Tekst2</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Kontakt</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <body class="antialiased dark:bg-slate-800">
    <section>
        <div class="container flex flex-row mx-auto lg:pt-28 pb-16 gap-10">
            <div class="flex-1 w-50 flex flex-col h-fit max-w-lg p-6 mx-auto text-center text-zinc-800 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 bg-amber-500">
                <span class="font-bold">{{$results['name']}} <i class="fa-solid fa-star "></i>{{$results['user_ratings']['score']}}</span>
                <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700 list-disc list-inside">
                   @if(isset($results['nutrition']['calories'])) <li class="flex space-x-3 mx-4 leading-3">{{ Lang::get('api.calories') }} {{$results['nutrition']['calories']}}</li>@endif
                   @if(isset($results['nutrition']['protein'])) <li class="flex space-x-3 mx-4 leading-3">{{ Lang::get('api.protein') }} {{$results['nutrition']['protein']}}</li>@endif
                   @if(isset($results['nutrition']['fat'])) <li class="flex space-x-3 mx-4 leading-3">{{ Lang::get('api.fat') }} {{$results['nutrition']['fat']}}</li>@endif
                   @if(isset($results['nutrition']['sugar'])) <li class="flex space-x-3 mx-4 leading-3">{{ Lang::get('api.sugar') }} {{$results['nutrition']['sugar']}}</li>@endif
                   @if(isset($results['total_time_tier']['display_tier']))<li class="flex space-x-3 mx-4 leading-3">{{ Lang::get('api.total_time_tier') }} {{$results['total_time_tier']['display_tier']}}</li>@endif
                   @if(isset($results['description'])) <li class="flex space-x-3 mx-4">{{ Lang::get('api.description') }} {{$results['description']}}</li>@endif
                </ul>
                <span class="font-bold"> <i class="fa-solid fa-star "></i> Components</span>
                <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700 list-disc list-inside">
                    @foreach($results['sections'] as $component)
                        @foreach($component['components'] as $item)
                            @if(isset($item['raw_text'])) <li class="flex space-x-3 mx-4 leading-3">{{$item['raw_text']}}</li>@endif
                        @endforeach
                    @endforeach
                </ul>
            </div>

            <div class="justify-self-auto flex-1">
                <div class="px-4">
                    <a class="group/item hover:bg-slate-100" href=" {{ url('recipes/details/'.$results['id']) }}">
                        <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="{{$results['thumbnail_url']}}" alt="{{$results['thumbnail_alt_text']}}">
                    </a>
                </div>
            </div>

            <div class="flex-1 text-center">
                <div id="default-carousel" class="relative" data-carousel="static">
                    <div class="overflow-hidden relative w-100 h-64">
                    @if($similarities['count']>0)
                        @foreach($similarities['results'] as $item)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <a title="{{$item['name']}}" class="group/item hover:bg-slate-100" href=" {{ url('recipes/details/'.$item['id']) }}">
                                    <img class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" src="{{$item['thumbnail_url']}}" alt="{{$item['thumbnail_alt_text']}}">
                                </a>
                            </div>
                        @endforeach
                        <!-- Slider controls -->
                        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                             <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                <span class="hidden">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <span class="hidden">Next</span>
                            </span>
                        </button>
                    @endif
                    </div>
                </div>
                <span class="font-bold text-center dark:text-white"> Similar</span>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900 lg:pt-12">
        <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-24 lg:px-6 ">
            <h2 class="mb-6 text-3xl font-extrabold tracking-tight text-center text-gray-900 lg:mb-8 lg:text-3xl dark:text-white">Preparation Tips</h2>
            <div class="max-w-screen-md mx-auto">
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                    @foreach($results['instructions'] as $item)
                    <h3 id="accordion-flush-heading-{{$item['position']}}">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left border-b border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400" data-accordion-target="#accordion-flush-body-{{$item['position']}}" aria-expanded="false" aria-controls="accordion-flush-body-{{$item['position']}}">
                            <span>Step {{$item['position']}}</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-{{$item['position']}}" class="hidden" aria-labelledby="accordion-flush-heading-{{$item['position']}}">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">{{$item['display_text']}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('slider', () => ({
            currentIndex: 1,
            images: [
                'https://source.unsplash.com/1600x900/?beach',
                'https://source.unsplash.com/1600x900/?cat',
                'https://source.unsplash.com/1600x900/?dog',
                'https://source.unsplash.com/1600x900/?lego',
                'https://source.unsplash.com/1600x900/?textures&patterns'
            ],
            back() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            next() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                } else if (this.currentIndex <= this.images.length){
                    this.currentIndex = this.images.length - this.currentIndex + 1
                }
            },
        }))
    })
</script>
