<x-admin_panel>


    <h4 class="d-block text-center mt-4">جدول دسته بندی رستوران ها</h4>

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

                    <td>فست فود</td>

                    <td>
                       <form action="">

                        <div class="form-check form-switch mx-auto" style="width:10px">
                            <input class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                        </div>

                       </form>
                    </td>

                    <td>
                        <button class="btn btn-table bg-light-blue ">
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

               
                </tbody>
              </table>


        </div>
    </div>


    <h4 class="d-block text-center mt-4">آمار رستوران ها</h4>


    <div class="row mt-4 pt-4" style="padding: 20px !important">

        
        <div class="col-5 background-white rounded"  >
            <canvas id="myChart"></canvas>
        </div>    
         
        
        <div class="col-3 hpx-400 bg-white rounded mx-auto d-flex flex-column " style="hieght : 400px">

            <div class="w-100 h-25  rounded position-relative">
                <span class="top-sale-txt"> پرفروش ترین رستوزان ها</span>

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

         <div class="col-3 hpx-400 bg-white rounded mx-auto d-flex flex-column " style="hieght : 400px">

            <div class="w-100 h-25  rounded position-relative">
                <span class="top-sale-txt">محبوب ترین رستوران ها</span>

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