<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js']) 
        @livewireStyles
        <title>{{ $title ?? 'Page Title' }}</title>
       
    </head>
    <body class="h-screen flex">
      @livewire('ui.toast')
      @if(Auth::check())
        @livewire('common.sidebar')
      <div class="w-[82%] bg-gray-100 flex flex-col shadow-2xl">
        @livewire('common.header')
        <div class="flex-grow overflow-y-auto text-black h-screen">
            {{ $slot }}
        </div>
      </div>
      @else
      <div class="h-screen w-full"> {{ $slot }}</div>
      @endif
        @livewireStyles

    </body>
</html>
