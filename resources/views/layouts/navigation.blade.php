<nav style="width: 250px;" class="h-screen bg-white border-r border-gray-200 ">
<!-- Application Logo -->
    <div class="flex items-center px-6 border-b border-gray-200 py-4">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
            <x-application-logo class="w-auto h-6 fill-current text-gray-500" />
            <span class="text-lg font-semibold text-gray-800 ">Shaghalni</span>

        </a>   
    </div>
<!-- Navigation Links -->
 <ul class="flex flex-col  px-4 py-6 space-y-2">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
      Dashboard
    </x-nav-link>
    <x-nav-link :href="route('company.index')" :active="request()->routeIs('company.index')">
      Companies
    </x-nav-link>

     <x-nav-link :href="route('application.index')" :active="request()->routeIs('application.index')">
      Job Applications
    </x-nav-link>

     <x-nav-link :href="route('job-category.index')" :active="request()->routeIs('job-category.index')">
      Job Categories
    </x-nav-link>

     <x-nav-link :href="route('job-vacancy.index')" :active="request()->routeIs('job-vacancy.index')">
      Job Vacancies
    </x-nav-link>

    
     <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
      Users
    </x-nav-link>
    <hr />
      <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-nav-link :href="route('logout')" :action="false" class="text-red-600 hover:text-red-800" 
             onclick="event.preventDefault(); this.closest('form').submit();">
             Logout
         </x-nav-link>
               
    </form>
  </ul>    
</nav>


 <!-- <x-nav-link :href="route('logout')" :action="false" class="text-red-500">
          Logout
          </x-nav-link>   --> 
