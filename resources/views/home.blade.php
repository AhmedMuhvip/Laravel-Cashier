<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            @if(request('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                     role="alert">
                    <div class="flex">
                        <div class="py-1">
                            <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold {{request('message')=='Payment successful!'?'bg-blue-400':'bg-fuchsia-500'}}">{{request('message')}}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if($courses->count() > 0)
                @foreach($courses as $course)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-6">
                            <a href="{{route('courses.show', $course)}}">
                                <h5 class="text-lg font-bold text-blue-600">{{ $course->name }}</h5>
                            </a>
                            <p class="text-gray-600 mt-2">{{ $course->description }}</p>
                            <p class="text-lg font-semibold text-gray-800 mt-2">
                                {{$course->price()}}</p>
                            @if($cart && $cart->courses->contains($course))
                                <a href="{{route('removeFromCart',$course)}}"
                                   class="inline-block mt-6 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                                    Remove From Cart
                                </a>
                            @else
                                <a href="{{route('addtoCart',$course)}}"
                                   class="inline-block mt-6 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                                    Add To Cart
                                </a>
                            @endif


                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-gray-500 col-span-3 text-center">No courses available.</p>
            @endif
        </div>
    </div>
</x-app-layout>
