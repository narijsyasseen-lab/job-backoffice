<div class="absolute inset-x-0 bottom-10 z-50 max-w-2xl">
            @if (session('success'))
               <div x-data="{show: true}" x-show="show" x-transition x-init="setTimeout(()=> show = false, 500)
                  class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                   role="alert">
                  <span class="block sm:inline">{{ session('success') }}</span>
               </div>
            @endif
        </div>