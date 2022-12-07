<x-admin_panel>
 
    <div class="d-block  position-relative mt-4 mb-4"> 
        


        <h4 class="text-center">
              گزارش سفارشات   
        </h4>


        <div style="width:300px; right:50px; top:0px;" class="position-absolute">

            <form method="GET" action="/admin/report/order">

         
                 <button class="btn ">
                    اعمال
                 </button>

                <select name="orderNumber" style="width:100px; border-radius:10px; height:23px; border:none;" class="text-center" aria-label="Default select example">
                    <option  value="0">هفتگی</option>
                    <option value="1">ماهانه</option>
                  </select>

                  <label  class="d--block text-right"> : فیلتر بر اساس </label>
            </form>
            
        </div>
    
    </div>
    
    <div class="row mt-4">
        <div class="col-10 mx-auto mt-4">


             <table class="table mt-4">
                <thead>

                  <tr class="text-center">

                    <th scope="col">شماره ردیف</th>

                    <th scope="col">شماره سفارش</th>

                    <th scope="col">ای دی تراکنش</th>

                    <th scope="col">تاریخ ثبت سفارش</th>

                    <th scope="col">سفارش دهنده</th>

                    <th scope="col"> جزییات </th>

                  </tr>

                </thead>


                <tbody>

                  @foreach ($orders as $order)
                      
                  
                  <tr class="text-center">


                    <th scope="row">
                        {{$loop->iteration}}
                    </th>

                    <td>
                        {{$order->id}}
                    </td>

                    <td>
                      {{$order->transaction[0]->transaction_id}}
                    </td>
                          
                    <td>
                        {{$order->created_at}}
                    </td>


                    <td>
                        {{$order->user->fullName}}
                    </td>


                    <td>
                        <button class="btn btn-table bg-light-blue "  data-bs-toggle="modal" data-bs-target="#detailModal-{{$order->id}}">
                            <i class="fa-regular fa-pen-to-square text-light"></i>
                        </button>
                        

                        <x-modal title="جزییات" idx="detailModal-{{$order->id}}">

                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">نام محصول</th>
                                    <th scope="col">تعداد</th>
                                    <th scope="col">رستوران</th>
                                    <th scope="col">قیمت </th>
                                  </tr>
                                </thead>
                                <tbody>

                                    @foreach ($order->product as $product)
                                    
                                    <tr>
                                      <th scope="row">{{$product->name}}</th>
  
                                      <td>{{ $product->pivot->quantity}}</td>
  
                                      <td>{{ $product->menu[0]->resturant->name}}</td>
  
                                      <td>{{ $product->pivot->price}}</td>
                                    </tr>

                                    @endforeach
                              </table>

                        </x-modal>
                    </td>

                    
          
                  </tr>

                  @endforeach



                </tbody>


              </table> 


        </div>
    </div>


    
</x-admin_panel>