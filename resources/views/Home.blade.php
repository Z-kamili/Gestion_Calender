<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl space-x-3 text-gray-800 leading-tight">
          
            <a href="{{route('Events.index')}}"> Calender </a>  
             <a href="{{route('Events.create')}}"> Add calender </a>  
        
        </h2>
    </x-slot>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" >

    <img src="{{ URL::asset('assets/images/undraw_Booking_re_gw4j(5).png')}}" alt="">

</div>

</x-app-layout>