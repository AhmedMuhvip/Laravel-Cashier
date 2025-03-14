<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            @if($courses->count() > 0)
                @foreach($courses as $course)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-6">
                            <a href="{{route('courses.show', $course)}}">
                                <h5 class="text-lg font-bold text-blue-600">{{ $course->name }}</h5>
                            </a>
                            <p class="text-gray-600 mt-2">{{ $course->description }}</p>
                            <p class="text-lg font-semibold text-gray-800 mt-2">
                                ${{$course->price}}</p>
                            @if($cart && $cart->courses->contains($course))
                                <a href="#"
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
