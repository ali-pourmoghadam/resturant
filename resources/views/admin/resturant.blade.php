<x-admin_panel>


    <h4 class="d-block text-center mt-4"> جدول دسته بندی رستوران  ها</h4>

    <div class="row mt-4">
        <div class="col-10 mx-auto mt-3">


            <table class="table ">
                <thead>

                  <tr class="text-center">

                    <th scope="col">شماره ردیف</th>

                    <th scope="col">نام دسته بندی</th>

                    <th scope="col">وضعیت</th>

                    <th scope="col">ویرایش</th>

                    <th scope="col">حذف</th>

                  </tr>

                </thead>


                <tbody>

                  <tr class="text-center">

                    <th scope="row">1</th>

                    <td>کباب</td>

                    <td>
                       <form action="">

                        <div class="form-check form-switch mx-auto" style="width:10px">
                            <input class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                        </div>

                       </form>
                    </td>

                    <td>
                        <button class="btn btn-table bg-light-blue "  data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa-regular fa-pen-to-square text-light"></i>
                        </button>
                    </td>

                    <td>
                      <form>

                        <button class="btn btn-table bg-light-red ">
                            <i class="fa-solid fa-trash  text-light"></i>
                        </button>

                      </form>
                    </td>

                  </tr>

                  {{--START-MODAL-RESTURANT--}}

                  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                  {{-- END-MODAL-RESTURANT --}}
               
                </tbody>
              </table>


        </div>
    </div>


    <h4 class="d-block text-center mt-4">آمار رستوران ها</h4>


    <div class="row mt-4 pt-4" style="padding: 20px !important">

        
        <div class="col-6 background-white rounded"  >
            <canvas id="myChart"></canvas>
        </div>    
         
        
        <div class="col-3 hpx-400 bg-white rounded mx-auto d-flex flex-column " style="hieght : 400px">

            <div class="w-100 h-25  rounded position-relative">
                <span class="top-sale-txt"> پرفروش ترین رستوران ها</span>

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
 
         
    </div>


    <div class="add-item-heaeder pointer" data-bs-toggle="modal" data-bs-target="#addResturantModal"> 

        اضافه کردن رستوران  

        <i class="fa-solid fa-plus"></i>

    </div>



      {{-- ADD-RESTURANT-MODAL --}}
       
    <div class="modal fade" id="addResturantModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-center w-100" id="exampleModalLabel">ایجاد رستوران</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form>

                <div class="modal-body">
            
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label w-100 text-right">نام دسته بندی</label>

                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          
                        </div>

                        <div class="mb-3">

                            <label for="exampleInputEmail1" class="form-label w-100 text-right">وضعیت</label>

                            <select class="form-select" aria-label="Default select example">
                            
                                <option value="1">فعال</option>
                                <option value="2">غیرفعال</option>
                     
                              </select>

                        </div>
                      
         
                 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                  <button type="button" class="btn btn-primary">اضفه کردن</button>
                </div>


            </form>


          </div>
        </div>
      </div>

      {{-- END-ADD-RESTURANT-MODAL --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
    ];

    const data = {
        labels: labels,
        datasets: [{
        label: 'My First dataset',
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 30, 45],
        }]
    };


    const config = {
        type: 'doughnut',
        data: data,
        options: {}
    };


    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
 
    </script> 


</x-admin_panel>