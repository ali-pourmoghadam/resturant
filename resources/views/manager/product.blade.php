<x-manager_panel>

    <h4 class="d-block text-center mt-4"> جدول دسته بندی محصولات</h4>

    <div class="row mt-4">
        <div class="col-10 mx-auto mt-3">


            <table class="table ">
                <thead>

                  <tr class="text-center">

                    <th scope="col">شماره ردیف</th>

                    <th scope="col">عکس  محصول</th>

                    <th scope="col">نام محصول</th>

                    <th scope="col">نمایش محصول</th>

                    <th scope="col">ویرایش</th>

                    <th scope="col">حذف</th>

                  </tr>

                </thead>


                <tbody>

                  @foreach ($products as $product)
                      
                  
                  <tr class="text-center">


                     <th class="pt-20" scope="row">
                        {{$loop->iteration}}
                    </th>

                    <td>
                        <img src="{{asset("storage/{$product->img}")}}" style="width:50px; height:50px; cover rounded" alt="">
                    </td>

                    <td class="pt-20">{{$product->name}}</td>

                    <td class="pt-20">
                        <button class="btn btn-table bg-light-green "  data-bs-toggle="modal" data-bs-target="#showModal-{{$product->id}}">
                            <i class="fa-regular fa-eye  text-light"></i>
                        </button>
                    </td>

                  {{--START-MODAL-PRODUCT-SHOW--}}

                  <div class="modal fade" id="showModal-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title w-100 text-center" id="exampleModalLabel"> اصلاعات محصول</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="row">

                            <div class="col-6" style="border-right: 1px solid">

                                <span class="d-block text-right mt-2">توضیحات :</span>
                                <p class="px-2 text-center mt-1">
                                    {{$product->description}}
                                </p>
                              
                            </div>

                            <div class="col-6 text-right p-2">

                                <span class="d-block mx-2 mb-2">قیمت : {{$product->price}}</span>

                                <div class="d-block mx-2 mb-2">

                                   <span class="d-block"> منوها :</span>

                                    @foreach ($product->menu as $menu)
                                        <span class="d-block mx-5">{{$menu->name}}-</span>
                                    @endforeach

                                </div>

                                <span class="d-block mx-2 mb-2"> تاریخ ساخت :</span>

                                <span class="d-block mx-5 mb-2"
                                      style="font-size: 13px; font-weight:bold"> {{$product->created_at}}-</span>
                            </div>


                        </div>

                      </div>
                    </div>
                  </div>

                  {{-- END-MODAL-PRODUCT-SHOW --}}

                    <td class="pt-20">
                        <button class="btn btn-table bg-light-blue "  data-bs-toggle="modal" data-bs-target="#editModal-{{$product->id}}">
                            <i class="fa-regular fa-pen-to-square text-light"></i>
                        </button>
                    </td>

                    <td class="pt-20">
                      <form method="POST" action="/manager/product/{{$product->id}}" enctype="multipart/form-data">
                        
                        @csrf

                        @method("DELETE")

                        <button class="btn btn-table bg-light-red ">
                            <i class="fa-solid fa-trash  text-light"></i>
                        </button>

                      </form>
                    </td>

                    
                  {{--START-MODAL-PRODUCT--}}

                  <div class="modal fade" id="editModal-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title w-100 text-center" id="exampleModalLabel"> ویرایش محصول</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <form action="/manager/product/{{$product->id}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="modal-body">
                                
                                
                          <div class="mb-3">

                            <label for="exampleInputEmail1" class="form-label w-100 text-right">نام محصول</label>
  
                            <input type="text" name="name" value="{{$product->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                          </div>
                          
  
                          <div class="mb-3">
  
                            <label for="exampleInputEmail1"  class="form-label w-100 text-right">قیمت </label>
  
                            <input type="text" name="price" value="{{$product->price}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                          </div>
  
  
  
  
                          <div class="mb-3">
  
                              <label for="exampleInputEmail1" class="form-label w-100 text-right">انخاب دسته بندی</label>
  
                                <select name="food_category_id" class="form-select" aria-label="Default select example">
                                            
                                  @foreach ($foodCategories as $category)
  
                                  <option value="{{$category->id}}">{{ $category->name }}</option>
  
                                  @endforeach     
                               </select>
  
                          </div> 
  
  
                          <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label w-100 text-right">توضیحات</label>
                              <textarea  name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                                    {{$product->description}}
                              </textarea>
                          </div>
                               
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                              <button type="submit" class="btn btn-primary">به روز رسانی</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  
                  {{-- END-MODAL-PRODUCT --}}
                  </tr>

                  @endforeach



                </tbody>
              </table>


        </div>
    </div>

{{--     
    <h4 class="d-block text-center mt-4">آمار منوها</h4>


    <div class="row mt-4 pt-4" style="padding: 20px !important">

        
        <div class="col-6 background-white rounded"  >
            <canvas id="myChart"></canvas>
        </div>    
         
        
        <div class="col-3 hpx-400 bg-white rounded mx-auto d-flex flex-column " style="hieght : 400px">

            <div class="w-100 h-25  rounded position-relative">
                <span class="top-sale-txt"> پرفروش ترین منوها</span>

                <span class="btn top-sale-btn">ماه
                    <i class="fa-solid fa-caret-down ml-2" style="font-size: 9px"></i>
                </span>
            </div>
            
            <div class="d-flex flex-row justify-content-start align-items-center">

                <div class="p-2">
                    <img class="top-sale-pic" src="{{asset('img/resturant.jpg')}}" alt="">
                </div>

                <div class="top-sale-info w-75 pt-3">
               
                    <p class=" position-relative px-2 fs-6">
                        پیتزا پپرونی

                        <span class="position-absolute right-20 txt-gray">
                            9 عدد
                        </span>
                    </p>

                    <p class=" position-relative px-2">
                        مبلغ کل فروش 

                        <span class="position-absolute right-20 txt-gray">
                            50 تومان
                        </span>
                    </p>
                </div>

            </div>
            <div class="d-flex flex-row justify-content-start align-items-center">

                <div class="p-2">
                    <img class="top-sale-pic" src="{{asset('img/resturant.jpg')}}" alt="">
                </div>

                <div class="top-sale-info w-75 pt-3">
               
                    <p class=" position-relative px-2 fs-6">
                        پیتزا پپرونی

                        <span class="position-absolute right-20 txt-gray">
                            9 عدد
                        </span>
                    </p>

                    <p class=" position-relative px-2">
                        مبلغ کل فروش 

                        <span class="position-absolute right-20 txt-gray">
                            50 تومان
                        </span>
                    </p>
                </div>

            </div>
            <div class="d-flex flex-row justify-content-start align-items-center">

                <div class="p-2">
                    <img class="top-sale-pic" src="{{asset('img/resturant.jpg')}}" alt="">
                </div>

                <div class="top-sale-info w-75 pt-3">
               
                    <p class=" position-relative px-2 fs-6">
                        پیتزا پپرونی

                        <span class="position-absolute right-20 txt-gray">
                            9 عدد
                        </span>
                    </p>

                    <p class=" position-relative px-2">
                        مبلغ کل فروش 

                        <span class="position-absolute right-20 txt-gray">
                            50 تومان
                        </span>
                    </p>
                </div>

            </div>
      

        </div>  

         
    </div> --}}


    <div class="add-item-heaeder pointer" data-bs-toggle="modal" data-bs-target="#addfoodModal"> 

        اضافه کردن محصول

        <i class="fa-solid fa-plus"></i>

    </div>



      {{-- ADD-PRODUCt-MODAL --}}
       
      <div class="modal fade" id="addfoodModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-center w-100" id="exampleModalLabel">ایجاد محصول</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="/manager/product" enctype="multipart/form-data">

              @csrf

                <div class="modal-body">
            
                        <div class="mb-3">

                          <label for="exampleInputEmail1" class="form-label w-100 text-right">نام محصول</label>

                          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          
                        </div>
                        

                        <div class="mb-3">

                          <label for="exampleInputEmail1" class="form-label w-100 text-right">قیمت </label>

                          <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          
                        </div>

                        
                        <div class="mb-3">

                               <label for="exampleInputEmail1" class="form-label w-100 text-right">انتخاب عکس</label>

                                <x-file_upload>
                                </x-file_upload>
                        </div>


                     

                        <div class="mb-3">

                            <label for="exampleInputEmail1" class="form-label w-100 text-right">افزودن به منو</label>
                           

                             <select name="menu" class="form-select" aria-label="Default select example">
                                          
                              @foreach ($menus as $menu)
                                                 
                                <option value="{{$menu->id}}">{{ $menu->name }}</option>

                              @endforeach
                    
                             </select>

                        </div> 



                        <div class="mb-3">

                            <label for="exampleInputEmail1" class="form-label w-100 text-right">انخاب دسته بندی</label>

                              <select name="food_category_id" class="form-select" aria-label="Default select example">
                                          
                                @foreach ($foodCategories as $category)

                                <option value="{{$category->id}}">{{ $category->name }}</option>

                                @endforeach     
                             </select>

                        </div> 


                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label w-100 text-right">توضیحات</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                </div>


                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                  <button type="submit" class="btn btn-primary">اضفه کردن</button>
                </div>


            </form>


          </div>
        </div>
      </div>

      {{-- END-PRODUCt-MODAL --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}


    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

    <script>

    // const labels = [
    //     'January',
    //     'February',
    //     'March',
    //     'April',
    //     'May',
    //     'June',
    // ];

    // const data = {
    //     labels: labels,
    //     datasets: [{
    //     label: 'My First dataset',
    //     backgroundColor: [
    //         'rgb(255, 99, 132)',
    //         'rgb(54, 162, 235)',
    //         'rgb(255, 205, 86)'
    //         ],
    //     borderColor: 'rgb(255, 99, 132)',
    //     data: [0, 10, 5, 2, 20, 30, 45],
    //     }]
    // };


    // const config = {
    //     type: 'doughnut',
    //     data: data,
    //     options: {}
    // };


    // const myChart = new Chart(
    //     document.getElementById('myChart'),
    //     config
    // );
 
    </script> 



</x-manager_panel>