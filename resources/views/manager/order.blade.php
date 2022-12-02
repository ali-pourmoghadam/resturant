<x-Manager_panel>


    
    <h4 class="d-block text-center mt-4"> جدول  سفارشات </h4>
    
    <div class="row mt-4">
        <div class="col-10 mx-auto mt-3">


            <table class="table ">
                <thead>

                  <tr class="text-center">

                    <th scope="col">شماره ردیف</th>

                    <th scope="col">سفارش دهنده</th>

                    <th scope="col">وضعیت سفارش</th>

                    <th scope="col">دیدن جزییات</th>

                    <th scope="col">به روز رسانی وضعیت</th>

                  </tr>

                </thead>


                <tbody>

                  @foreach ($orders as $order)
                      
                  
                  <tr class="text-center">


                    <th scope="row">
                        {{$loop->iteration}}
                    </th>

                    <td>
                        {{$order->order->user->email}}
                    </td>

                    <td>
                      {{$order->status}}
                    </td>
                          
                    <td>
                        <button class="btn btn-table bg-light-blue "  data-bs-toggle="modal" data-bs-target="#showModal-{{$order->id}}">
                            <i class="fa-sharp fa-solid fa-eye text-light"></i>
                        </button>
                    </td>

                    <x-modal  idx="showModal-{{$order->id}}" title="جزییات سفارش">
                    
                        <div class="d-block px-2 mb-4 text-center">

                            <h4>جزیییات سفارش</h4>

                                
                           
                            <ul style="list-style: none" class="text-right">

                                <li> {{"order#".$order->product->id}} : کد سفارش</li>

                                <li>   نام محصول : {{$order->product->name}}</li>

                                <li>    تغداد : {{$order->quantity}}</li>
                                
                                <li>    قیمت واحد : {{$order->product->price}}</li>

                                <li>    قیمت کل : {{$order->price}}</li>
                            </ul>

                            <br>

                            <h4>سفارش دهنده</h4>

                            <ul style="list-style: none" class="text-right">

                                <li class="mt-2">{{$order->order->user->fullName}} :نام</li>

                                <li class="mt-2">شماره تماس : {{$order->order->user->phone_number}}</li>

                                <li class="mt-2">ادرس : {{$order->order->user->address[0]->address}}</li>
                            </ul>

                        </div>

                        

                    </x-modal>
                 

                    <td>
                        
                      <form method="POST" action="comment/user/confirm/{{$order->id}}">
                        
                        @csrf

                        <button class="btn btn-table bg-light-green ">
                            <i class="fa-regular fa-pen-to-square text-light"></i>
                        </button>

                      </form>

                    </td>

                    
          
                  </tr>

                  @endforeach



                </tbody>


              </table>


        </div>
    </div>


</x-Manager_panel>