<x-manager_panel>

       
    <div class="row mt-4 mb-4">


        <div class="col-3 gb-dark mr-2">    

            <div class="statistic-card p-2 d-flex flex-row  align-items-center justify-content-start">

                <div class="flex-1 statistic-card-shape bg-light-blue">
                    <i class="fa-solid fa-bowl-food text-light mt-3 "style="font-size:25px"></i>
                 
                </div>

                <div class="flex w-75">
                    <span class="d-block text-center fs-5 txt-gray">تعداد کل سفارش ها</span>
                    <span class="d-block text-center fs-6 mt-2 txt-gray">{{$count}}</span>
                </div>

            </div>
            
        </div>
        <div class="col-3 gb-dark mr-2">    

            <div class="statistic-card p-2 d-flex flex-row  align-items-center justify-content-start">

                <div class="flex-1 statistic-card-shape bg-light-green">
                    <i class="fa-solid fa-mountain-city text-light mt-3 "style="font-size:25px"></i>
                </div>

                <div class="flex w-75">
                    <span class="d-block text-center fs-5 txt-gray">درامد کل</span>
                    <span class="d-block text-center fs-6 mt-2 txt-gray">{{$income}} تومان</span>
                </div>

            </div>
            
        </div>

    </div>
    


 
    <div class="d-block  position-relative mt-4 mb-4"> 
        


        <h4 class="text-center">
              گزارش سفارشات انجام شده 
        </h4>


        <div style="width:300px; right:50px; top:0px;" class="position-absolute">

            <form method="GET" action="/manager/report">

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

                    <th scope="col">نام محصول</th>

                    <th scope="col">تعداد</th>

                    <th scope="col">قیمت واحد</th>

                    <th scope="col">قیمت کل</th>

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
                      {{$order->order->transaction[0]->transaction_id}}
                    </td>
                          
                    <td>
                        {{$order->created_at}}
                    </td>


                    <td>
                        {{$order->product->name}}
                    </td>

                    <td>
                        {{$order->quantity}}
                    </td>

                    <td>
                        {{$order->product->price}}
                    </td>

                    <td>
                        {{$order->price}}
                    </td>

                    
          
                  </tr>

                  @endforeach



                </tbody>


              </table>


        </div>
    </div>


    
</x-manager_panel>