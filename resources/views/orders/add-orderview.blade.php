
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                <div class="p-6 text-gray-900">
                    {{ __("Create New Order") }}                   
                </div>

                @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif


                <form method="POST" action="{{ URL('/add-order') }}">
                    @csrf

                    <!-- Hidden ID field -->
                    <input type="hidden" id="customerid" name="customerid" value="{{ $customer->id }}">


                    <!-- Firstname -->
                    <div>
                        <x-input-label for="firstname" :value="__('Firstname')" />
                        <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" value="{{ $customer->firstname }}" disabled required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Lastname -->
                    <div>
                        <x-input-label for="lastname" :value="__('Lastname')" />
                        <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" value="{{ $customer->lastname }}" disabled required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Organisation -->
                    <div>
                        <x-input-label for="organisation" :value="__('Organisation')" />
                        <x-text-input id="organisation" class="block mt-1 w-full" type="text" name="organisation" value="{{ $customer->organisation }}" disabled required autofocus autocomplete="organisation" />
                        <x-input-error :messages="$errors->get('organisation')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Attention -->
                    <div>
                        <x-input-label for="receiver" :value="__('Attention (Receiver)')" />
                        <x-text-input id="receiver" class="block mt-1 w-full" type="text" name="receiver" :value="old('receiver')" required autofocus autocomplete="receiver" />
                        <x-input-error :messages="$errors->get('receiver')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Order Description -->
                    <div>
                        <x-input-label for="phone" :value="__('Description')" />
                        <textarea style="border: 1px solid #DCDCDC;border-radius: 5px;" id="phone" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="username"></textarea>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Package Weight -->
                    <div>
                        <x-input-label for="weight" :value="__('Package Weight (kg)')" />
                        <x-text-input id="weight" class="block mt-1 w-full" type="number" name="weight" :value="old('weight')" required autofocus autocomplete="weight" />
                        <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                    </div><br/>

                    <!-- Delivery Address -->
                    <div>
                        <x-input-label for="address" :value="__('Delivery Address')" />
                        <textarea style="border: 1px solid #DCDCDC;border-radius: 5px;" id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address"></textarea>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div><br/>

                    <!-- Distance -->
                    <div>
                        <x-input-label for="distance" :value="__('Distance (km)')" />
                        <x-text-input id="distance" class="block mt-1 w-full" type="number" name="distance" :value="old('distance')" required autofocus autocomplete="distance" />
                        <x-input-error :messages="$errors->get('distance')" class="mt-2" />
                    </div><br/>

                    <!-- Distance -->
                    <div>
                        <x-input-label for="date" :value="__('Order Date')" />
                        <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus autocomplete="date" />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div><br/>

                    <div class="flex items-center justify-end mt-4">
                        
                        <x-primary-button class="ms-3">
                            {{ __('Create Order') }}
                        </x-primary-button>
                    </div>
                </form>
                </div>               

            </div>
        </div>
    </div>


    <!-- Orders Table Data Display-->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                <div class="p-6 text-gray-900">
                    {{ __("Customer Orders List") }}                   
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
                            <th style="font-size: 14px;padding-right:10px;">Date</th>
                            <th style="font-size: 14px;padding-right:10px;">Price</th>
                            <th style="font-size: 14px;padding-right:10px;">Status</th>
                            <th style="font-size: 14px;padding-right:10px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($CustomerOrders as $item)
                            <tr>
                                <hr><hr>
                                <td style="font-size: 14px;">{{ $item['id'] }}</td>
                                <td style="font-size: 14px;">{{ $item['receiver'] }}</td>
                                <td style="font-size: 14px;">{{ $item['address'] }}</td>
                                <td style="font-size: 14px;">{{ $item['distance'] }}km</td>
                                <td style="font-size: 14px;">{{ $item['description'] }}</td>
                                <td style="font-size: 14px;">{{ $item['weight'] }}</td>
                                <td style="font-size: 14px;">{{ $item['date'] }}</td>
                                <td style="font-size: 14px;">R{{ $item['price'] }}</td>
                                <td style="font-size: 14px;">{{ $item['status'] }}</td>
                                <td style="font-size: 14px;"><a style="color:purple;" href="{{ url('/display-orderdetails/'.$item->id) }}">Order Details</a>
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

