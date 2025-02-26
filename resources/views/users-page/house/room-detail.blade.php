<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <a href="{{route('house.detail',$room->id_house)}}">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" hre>
                    House Detail/
                </h2>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Room Detail
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('house.partialsRoomDetail.main-data')
            @include('house.partialsRoomDetail.pic')
        </div>
    </div>
</x-app-layout>