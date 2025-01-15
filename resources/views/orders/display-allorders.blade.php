
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Orders Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">


                @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif


                <form method="get" action="{{ URL('/display-allorders') }}">
                    

                    <!-- Search -->
                    <div>
                        <x-input-label for="search" :value="__('SEARCH ORDER')" />
                        <x-text-input id="search" class="block mt-1 w-full" type="text" name="Search" :value="old('search')" required autofocus autocomplete="search" />
                        <x-input-error :messages="$errors->get('search')" class="mt-2" />
                    </div>
                    <br/>

                    @if ($SearchText)
                        <p>"{{$SearchText}}" Search Results</p>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        
                        <x-primary-button class="ms-3">
                            {{ __('FIND') }}
                        </x-primary-button>

                        <x-primary-button class="ms-3">
                            <a href="{{ '/display-allorders' }}" class="btn btn-secondary">CLEAR SEARCH</a>
                        </x-primary-button>


                    </div>
                </form>
                </div>               

            </div>
        </div>
    </div>

    <!-- orders Table Data Display-->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                <div class="p-6 text-gray-900">
                    {{ __("Orders List") }}                   
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th style="font-size: 14px;padding-right:50px;">ID</th>
                            <th style="font-size: 14px;padding-right:50px;">Receiver</th>
                            <th style="font-size: 14px;padding-right:100px;">Address</th>
                            <th style="font-size: 14px;padding-right:100px;">Distance</th>
                            <th style="font-size: 14px;padding-right:100px;">Description</th>
                            <th style="font-size: 14px;padding-right:100px;">Weight</th>
                            <th style="font-size: 14px;padding-right:100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($OrderData as $item)
                            <tr>
                                <hr><hr>
                                <td style="font-size: 14px;">{{ $item['id'] }}</td>
                                <td style="font-size: 14px;">{{ $item['receiver'] }}</td>
                                <td style="font-size: 14px;">{{ $item['address'] }}</td>
                                <td style="font-size: 14px;">{{ $item['distance'] }}</td>
                                <td style="font-size: 14px;">{{ $item['description'] }}</td>
                                <td style="font-size: 14px;">{{ $item['weight'] }}</td>
                                <td style="font-size: 14px;"><a style="color:red;" href="{{ url('/display-orderdetails/'.$item->id) }}">Order Details</a>
                                <td style="font-size: 14px;"><a style="color:purple;" href="{{ url('/display-orderupdates/'.$item->id) }}">Order Updates</a>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                
                </div>

                
                

            </div>
        </div>
    </div>

</x-app-layout>

