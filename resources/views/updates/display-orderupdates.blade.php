
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Updates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                <div class="p-6 text-gray-900">
                    {{ __("Add Update") }}                   
                </div>

                @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif


                <form method="POST" action="{{ URL('/add-update') }}">
                    @csrf

                    <!-- Hidden ID field -->
                    <input type="hidden" id="customerid" name="customerid" value="{{ $order->customerid }}">
                    <input type="hidden" id="orderid" name="orderid" value="{{ $order->id }}">

                    <!-- Order Number Display -->
                    <div>
                        <x-input-label for="order" :value="__('Order ID')" />
                        <x-text-input id="order" class="block mt-1 w-full" type="text" name="order" value="{{$order->id}}" disabled required autofocus autocomplete="order" />
                        <x-input-error :messages="$errors->get('order')" class="mt-2" />
                    </div>
                    <br/>


                    <!-- Update Datail -->
                    <div>
                        <x-input-label for="detail" :value="__('Update Detail')" />
                        <textarea style="border: 1px solid #DCDCDC;border-radius: 5px;" id="detail" class="block mt-1 w-full" type="text" name="detail" required autofocus autocomplete="detail"></textarea>
                        <x-input-error :messages="$errors->get('detail')" class="mt-2" />
                    </div>
                    <br/>

                    <!-- Status -->

                    <div>
                        <x-input-label for="status" :value="__('Status')" />
                        <select name="status" id="status" style="border: 1px solid #DCDCDC;border-radius: 5px;">
                        <option value="Pending">Pending</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Returned">Returned</option>
                        </select>
                    </div>
                    <br/>

                    


                    <div class="flex items-center justify-end mt-4">
                        
                        <x-primary-button class="ms-3">
                            {{ __('Update Order') }}
                        </x-primary-button>
                    </div>
                </form>
                </div>               

            </div>
        </div>
    </div>


    <!-- Orders Details Data Display-->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                <div class="p-6 text-gray-900">
                    {{ __("Order Updates") }}                   
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th style="font-size: 14px;padding-right:50px;">ID</th>
                            <th style="font-size: 14px;padding-right:50px;">Customer ID</th>
                            <th style="font-size: 14px;padding-right:100px;">Order ID</th>
                            <th style="font-size: 14px;padding-right:100px;">Update Detail</th>
                            <th style="font-size: 14px;padding-right:100px;">Date</th>
                            <th style="font-size: 14px;padding-right:100px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($OrderDetail as $item)
                            <tr>
                                <hr><hr>
                                <td style="font-size: 14px;">{{ $item['id'] }}</td>
                                <td style="font-size: 14px;">{{ $item['customerid'] }}</td>
                                <td style="font-size: 14px;">{{ $item['orderid'] }}</td>
                                <td style="font-size: 14px;">{{ $item['detail'] }}</td>
                                <td style="font-size: 14px;">{{ $item['date'] }}</td>
                                <td style="font-size: 14px;">{{ $item['status'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>

            </div>
        </div>
    </div>


    
</x-app-layout>

