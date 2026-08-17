<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __ ('Companies') }} {{ request()->input('archived') == 'true' ? 'Archived' : '' }}
        </h2>
    </x-slot>
    <div class="overflow-x-auto p-6">
        <x-toast-notification\>
            
            <div class="flex justify-end items-center space-x-4 ">
                <div>
                    @if(request()->input('archived') == 'true')
                       <!--Active-->
                        <a href="{{ route('companies.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2">
                           Active categories
                        </a>
                       
                    
                    @else
                    <!--Archived-->
                       <a href="{{ route('companies.index', ['archived' => 'true']) }}"
                           class="inline-flex items-center px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2">
                           Archived companies
                        </a>
                    @endif    
                    <!--Add Job Category-->
                    <a href="{{ route('companies.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2">
                       Add Job company
                    </a>
                </div>  
           </div>
    <!--Job Category table -->
    <table class="min-w-full divide-y divide-gray-200 rounded-lg shadow mt-4 bg-white">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text sm font-semibold text-gray-600"> Name</th>
                <th class="px-6 py-3 text-left text sm font-semibold text-gray-600"> Address</th>
                <th class="px-6 py-3 text-left text sm font-semibold text-gray-600"> Industry</th>
                <th class="px-6 py-3 text-left text sm font-semibold text-gray-600"> website</th>
                <th class="px-6 py-3 text-left pl-16 text-sm font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($companies as $company)
               <tr class="border-b">   
                    <td class="px-6 py-4 text-gray-800"> {{ $company->name }}</td>
                    <td class="px-6 py-4 text-gray-800"> {{ $company-> address }}</td>
                    <td class="px-6 py-4 text-gray-800"> {{ $company-> industry }}</td>
                    <td class="px-6 py-4 text-gray-800"> {{ $company-> website }}</td>                    
                    <td class="px-6 py-4 ">
                       <div class="flex space-x-2">
                        @if(request()->input('archived') == 'true') 
                        <!--Restore button-->  
                           <form action="{{ route('company.restore',$category->id) }} " method="POST" class="d-inline-block">
                             @csrf
                             @method('PUT')
                            <button type="submit" class="text-green-500 hover:text-green-700"> 🔄 Restore </button>
                            </form>                       
                              @else
                              
                           <!--Edit button-->
                           <a href="{{ route('companies.edit', $company->id) }}" class="text-blue-600 hover:text-blue-900 ml-3"> 🖊️ Edit</a>
                           <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline ">
                               @csrf
                               @method('DELETE')
                              <button type="submit" class="text-red-500 hover:text-red-700"> 🗃️ Archive</button>
                           </form>
                            
                        @endif    
                      </div>  
                   </td>
               </tr> 
            @empty
            <tr>
                <td colspan="2" class="px-2 py-4 text-gray-800">No companies found</td>
            </tr>             
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">
        {{ $companies->links()  }}

    </div>
</div>
</x-app-layout>