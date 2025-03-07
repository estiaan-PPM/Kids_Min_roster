<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
<div class="min-h-full">
    <nav class="bg-gray-100">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="shrink-0">
              <img src="https://www.onehopechurch.co.za/wp-content/uploads/2019/02/Copy-of-OneHope-official-logos-2.png" 
              alt="One Hope Church Stellenbosch" width = "114" height = "30">
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/class/3-6" :active="request()->is('3-6')">3-6s</x-nav-link>
                <x-nav-link href="/class/7-10" :active="request()->is('7-10')">7-10s</x-nav-link>
                <x-nav-link href="/class/11-13" :active="request()->is('11-13')">11-13s</x-nav-link>
                <x-nav-link href="/create" :active="request()->is('create')">Add New</x-nav-link>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/class/3-6" :active="request()->is('3-6')">3-6s</x-nav-link>
            <x-nav-link href="/class/7-10" :active="request()->is('7-10')">7-10s</x-nav-link>
            <x-nav-link href="/class/11-13" :active="request()->is('11-13')">11-13s</x-nav-link>
            <x-nav-link href="/create" :active="request()->is('create')">Add New</x-nav-link>
        </div>
      </div>
    </nav>
  
    <header class="bg-white shadow-sm">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 background-gray-500">
        {{ $slot }}
      </div>
    </main>
  </div>

</body>
</html>