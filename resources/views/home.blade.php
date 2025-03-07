<x-layout>
    <x-slot:heading>
        Home page
    </x-slot:heading>

    <h1>Hello from the Home Page!</h1> 
    <div class="search-container">
        <form action="/action_page.php">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
</x-layout>