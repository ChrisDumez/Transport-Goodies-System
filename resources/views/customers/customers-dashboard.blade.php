
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                <div class="p-6 text-gray-900">
                    {{ __("New Customer Details") }}                   
                </div>

                @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif


                <form method="POST" action="{{ URL('/add-customer') }}">
                    @csrf

                    <!-- Firstname -->
                    <div>
                        <x-input-label for="firstname" :value="__('Firstname')" />
                        <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Lastname -->
                    <div>
                        <x-input-label for="lastname" :value="__('Lastname')" />
                        <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Organisation -->
                    <div>
                        <x-input-label for="organisation" :value="__('Organisation')" />
                        <x-text-input id="organisation" class="block mt-1 w-full" type="text" name="organisation" :value="old('organisation')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('organisation')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Telephone Number -->
                    <div>
                        <x-input-label for="phone" :value="__('Contact Number')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>


                    

                    <div class="flex items-center justify-end mt-4">
                        
                        <x-primary-button class="ms-3">
                            {{ __('Add Customer') }}
                        </x-primary-button>
                    </div>
                </form>
                </div>               

            </div>
        </div>
    </div>

    <!-- Customers Table Data Display-->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                <div class="p-6 text-gray-900">
                    {{ __("Customer List") }}                   
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th style="font-size: 14px;padding-right:50px;">ID</th>
                            <th style="font-size: 14px;padding-right:50px;">First Name</th>
                            <th style="font-size: 14px;padding-right:100px;">Last Name</th>
                            <th style="font-size: 14px;padding-right:100px;">Organisation</th>
                            <th style="font-size: 14px;padding-right:100px;">Phone No.</th>
                            <th style="font-size: 14px;padding-right:100px;">Email</th>
                            <th style="font-size: 14px;padding-right:10px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($CustomerData as $item)
                            <tr>
                                <hr><hr>
                                <td style="font-size: 14px;">{{ $item['id'] }}</td>
                                <td style="font-size: 14px;">{{ $item['firstname'] }}</td>
                                <td style="font-size: 14px;">{{ $item['lastname'] }}</td>
                                <td style="font-size: 14px;">{{ $item['organisation'] }}</td>
                                <td style="font-size: 14px;">{{ $item['phone'] }}</td>
                                <td style="font-size: 14px;">{{ $item['email'] }}</td>
                                <td style="font-size: 14px;"><a style="color:red;" href="{{ url('/add-orderview/'.$item->id) }}">Create / View Orders</a>|
                                <td style="font-size: 14px;"><a style="color:purple;" href="{{ url('/display-customerdetails/'.$item->id) }}">Customer Details</a>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>

