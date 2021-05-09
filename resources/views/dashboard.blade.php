<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 space-x-3 leading-tight">
        
          <a href="{{route('Events.index')}}"> Calender </a>  
           <a href="{{route('Events.create')}}"> Add calender </a>  
      
      </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
     <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 px-4">
      <!-- SMALL CARD ROUNDED -->
      @foreach ($calender as $item)
      <div class="bg-gray-100 border-indigo-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-indigo-400 dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
        <img class="w-16 h-16 object-cover rounded-full" src="{{ URL::asset('assets/images/undraw_Booking_re_gw4j (4).png')}}" alt="" />
        <div class="flex flex-col justify-center">
          <p class="text-gray-900 dark:text-gray-300 font-semibold">{{$item->name}}</p>
          {{-- <p class="text-black dark:text-gray-100 text-justify font-semibold">{{$item->id}}</p> --}}
          <div class="flex space-x-2">
            <a  href="{{route('Events.edit',$item->id)}}"
              class="px-2 py-2 transition  ease-in duration-100 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">Edit</a>
              <a  href="{{route('Statistic.edit',$item->id)}}"
                class="px-2 py-2 transition ease-in duration-100 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">View</a>
          </div>
         
        </div>
      </div>
      @endforeach

      <!-- END SMALL CARD ROUNDED -->
  
      
    </div>
    
  
  {{-- </div> --}}
</x-app-layout>
