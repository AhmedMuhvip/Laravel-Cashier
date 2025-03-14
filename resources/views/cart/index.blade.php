<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($cart && count($cart->courses) > 0)
                        @foreach($cart->courses as $course)
                            <div class="bg-green-50 mb-3 p-2 flex justify-between items-center">
                                <h6>{{$course->name}}
                                    <small class="text-blue-500">({{$course->price}})</small>
                                </h6>
                                <a href="#"
                                   class="inline-flex h-12 items-center justify-center rounded-md bg-neutral-950 px-3 py-2 mt-4 mb-4 font-medium text-neutral-50 shadow-lg shadow-neutral-500/20 transition active:scale-95">
                                    Remove
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path
                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                            </svg>
                            <p>This Cart is Empty</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
