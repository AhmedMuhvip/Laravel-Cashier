<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $course->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h5 class="text-lg font-bold text-blue-600">{{ $course->name }}</h5>
                    <p class="text-gray-600 mt-2">{{ $course->description }}</p>
                    <p class="text-lg font-semibold text-gray-800 mt-2">
                        ${{$course->price}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
