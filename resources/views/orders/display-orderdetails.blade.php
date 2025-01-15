
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                <div class="p-6 text-gray-900">
                    {{ __("View Order Details") }}                   
                </div>

                @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif


                <form method="POST" action="{{ URL('/edit-order') }}">
                    @csrf

                    <!-- Hidden ID field -->
                    <input type="hidden" id="customerid" name="customerid" value="{{ $customer->id }}">
                    <input type="hidden" id="orderid" name="orderid" value="{{ $order->id }}">

                    <!-- Order Number -->
                    <div>
                        <x-input-label for="ordernumber" :value="__('Order Number')" />
                        <x-text-input id="ordernumber" class="block mt-1 w-full" type="text" name="ordernumber" value="{{ $order->id }}" disabled required autofocus autocomplete="ordernumber" />
                        <x-input-error :messages="$errors->get('ordernumber')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Customer Fullname -->
                    <div>
                        <x-input-label for="firstname" :value="__('Customer')" />
                        <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" value="{{ $customer->firstname }} {{ $customer->lastname }}" disabled required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Organisation -->
                    <div>
                        <x-input-label for="organisation" :value="__('Customer Organisation')" />
                        <x-text-input id="organisation" class="block mt-1 w-full" type="text" name="organisation" value="{{ $customer->organisation }}" disabled required autofocus autocomplete="organisation" />
                        <x-input-error :messages="$errors->get('organisation')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Receiver -->
                    <div>
                        <x-input-label for="receiver" :value="__('Attention (Receiver)')" />
                        <x-text-input id="receiver" class="block mt-1 w-full" type="text" name="receiver" value="{{ $order->receiver }}" disabled required autofocus autocomplete="receiver" />
                        <x-input-error :messages="$errors->get('receiver')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Order Description -->
                    <div>
                        <x-input-label for="phone" :value="__('Description')" />
                        <textarea style="border: 1px solid #DCDCDC;border-radius: 5px;" id="phone" class="block mt-1 w-full" type="text" name="description" :value="old('description')" disabled required autofocus autocomplete="username">{{ $order->description }}</textarea>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Package Weight -->
                    <div>
                        <x-input-label for="weight" :value="__('Package Weight (kg)')" />
                        <x-text-input id="weight" class="block mt-1 w-full" type="number" name="weight" value="{{ $order->weight }}" disabled required autofocus autocomplete="distance" />
                        <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                    </div><br/>
                    
                    <!-- Delivery Address -->
                    <div>
                        <x-input-label for="address" :value="__('Delivery Address')" />
                        <textarea style="border: 1px solid #DCDCDC;border-radius: 5px;" id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" disabled required autofocus autocomplete="address">{{ $order->address }}</textarea>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Distance -->
                    <div>
                        <x-input-label for="distance" :value="__('Distance (km)')" />
                        <x-text-input id="distance" class="block mt-1 w-full" type="number" name="distance" value="{{ $order->distance }}" disabled required autofocus autocomplete="distance" />
                        <x-input-error :messages="$errors->get('distance')" class="mt-2" />
                    </div><br/>

                    <!-- Distance -->
                    <div>
                        <x-input-label for="date" :value="__('Order Date')" />
                        <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" value="{{ $order->date }}" disabled required autofocus autocomplete="date" />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div><br/>

                    <!-- Price -->
                    <div>
                        <x-input-label for="price" :value="__('Total Cost')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" value="R {{ $order->price }}c" disabled required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div><br/>

                    <div class="flex items-center justify-end mt-4">
                        
                        <x-primary-button class="ms-3">
                            {{ __('edit Order Details') }}
                        </x-primary-button>

                        <x-primary-button class="ms-3">
                            <a href="{{ '/add-orderview/'.$customer->id }}" class="btn btn-secondary">BACK</a>
                        </x-primary-button>

                        <x-primary-button class="ms-3">
                            <a href="{{ '/display-orderupdates/'.$order->id }}" class="btn btn-secondary">ORDER UPDATES</a>
                        </x-primary-button>
                        
                    </div>
                </form>
                </div>               

            </div>
        </div>
    </div>

</x-app-layout>

