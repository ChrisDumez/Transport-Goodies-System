
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Customer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                <div class="p-6 text-gray-900">
                    {{ __("Customer Details") }}                   
                </div>

                @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif


                <form method="post" action="{{ URL('/edit-customerdetails') }}">
                    @csrf

                    <!-- Hidden ID field -->
                    <input type="hidden" id="customerid" name="customerid" value="{{ $customer->id }}">

                    <!-- Customer Firstname -->
                    <div>
                        <x-input-label for="firstname" :value="__('Firstname')" />
                        <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" value="{{ $customer->firstname }}" disabled required autofocus autocomplete="firstname" />
                        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Customer Lastname -->
                    <div>
                        <x-input-label for="lastname" :value="__('Lastname')" />
                        <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" value="{{ $customer->lastname }}" disabled required autofocus autocomplete="lastname" />
                        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Organisation -->
                    <div>
                        <x-input-label for="organisation" :value="__('Customer Organisation')" />
                        <x-text-input id="organisation" class="block mt-1 w-full" type="text" name="organisation" value="{{ $customer->organisation }}" disabled required autofocus autocomplete="organisation" />
                        <x-input-error :messages="$errors->get('organisation')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Contact Number -->
                    <div>
                        <x-input-label for="phone" :value="__('Contact Number')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone" value="{{ $customer->phone }}" disabled required autofocus autocomplete="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $customer->email }}" disabled required autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div><br/>


                    <div class="flex items-center justify-end mt-4">
                        
                        <x-primary-button class="ms-3">
                            <a href="{{ '/edit-customerdetails/'.$customer->id }}" class="btn btn-secondary">EDIT CUSTOMER DETAILS</a>
                        </x-primary-button>

                        <x-primary-button class="ms-3">
                            <a href="{{ '/customers-dashboard' }}" class="btn btn-secondary">BACK</a>
                        </x-primary-button>

                        
                        
                    </div>
                </form>
                </div>               

            </div>
        </div>
    </div>

</x-app-layout>

