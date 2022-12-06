<x-admin_panel>
    

    <div class="row mt-4">


        <div class="col-3 gb-dark mr-2">    

            <div class="statistic-card p-2 d-flex flex-row  align-items-center justify-content-start">

                <div class="flex-1 statistic-card-shape bg-purple">
                    <i class="fa-regular fa-user text-light mt-3 "style="font-size:25px"></i>
                </div>

                <div class="flex w-75">
                    <span class="d-block text-center fs-5 txt-gray">تعداد کاربران</span>
                    <span class="d-block text-center fs-6 mt-2 txt-gray">{{$count["users"]}}</span>
                </div>

            </div>
            
        </div>
        <div class="col-3 gb-dark mr-2">    

            <div class="statistic-card p-2 d-flex flex-row  align-items-center justify-content-start">

                <div class="flex-1 statistic-card-shape bg-light-red">
                    <i class="fa-solid fa-utensils fa-user text-light mt-3 "style="font-size:25px"></i>
    
                
                </div>

                <div class="flex w-75">
                    <span class="d-block text-center fs-5 txt-gray">تعداد رستوران ها</span>
                    <span class="d-block text-center fs-6 mt-2 txt-gray">{{$count["resturants"]}}</span>
                </div>

            </div>
            
        </div>
        <div class="col-3 gb-dark mr-2">    

            <div class="statistic-card p-2 d-flex flex-row  align-items-center justify-content-start">

                <div class="flex-1 statistic-card-shape bg-light-blue">
                    <i class="fa-solid fa-bowl-food text-light mt-3 "style="font-size:25px"></i>
                 
                </div>

                <div class="flex w-75">
                    <span class="d-block text-center fs-5 txt-gray">تعداد کل سفارش ها</span>
                    <span class="d-block text-center fs-6 mt-2 txt-gray">{{$count["orders"]}}</span>
                </div>

            </div>
            
        </div>
        <div class="col-3 gb-dark mr-2">    

            <div class="statistic-card p-2 d-flex flex-row  align-items-center justify-content-start">

                <div class="flex-1 statistic-card-shape bg-light-green">
                    <i class="fa-solid fa-mountain-city text-light mt-3 "style="font-size:25px"></i>
                </div>

                <div class="flex w-75">
                    <span class="d-block text-center fs-5 txt-gray">شهرهای فعال</span>
                    <span class="d-block text-center fs-6 mt-2 txt-gray">{{$count["cities"]}}</span>
                </div>

            </div>
            
        </div>

    </div>

    <div class="row mt-4 p-5" style="gap: 2px">
        
 
        <div class="col-8 bg-white rounded p-4 mx-auto">
            <canvas id="myChart"></canvas>
        </div>

        <div class="col-3 hpx-400 bg-white rounded mx-auto d-flex flex-column " style="hieght : 400px">

            <div class="w-100 h-25  rounded position-relative">
                <span class="top-sale-txt">محصولات پرفروش</span>
            </div>

            @foreach ($bestSellers as $bestSeller)
                
            <div class="d-flex flex-row justify-content-start align-items-center">

                <div class="p-2">
                    <img class="top-sale-pic" src="{{asset('storage/'.$bestSeller->product->img)}}" alt="">
                </div>

                <div class="top-sale-info w-75 pt-3">
               
                    <p class=" position-relative px-2 fs-6">

                         {{$bestSeller->product->name}}

                        <span class="position-absolute right-20 txt-gray">

                            {{$bestSeller->total}}

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
            @endforeach
            
        
      

        </div>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>


    const labels = [

         @foreach($incomeByMonth as $income)
           "{{$income->month}}" , 
        @endforeach
    
    ];

    const data = {
        labels: labels,
        datasets: [{
        label: 'درامد',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [
            @foreach($incomeByMonth as $income)
              "{{$income->total}}" , 
            @endforeach
        ],
        }]
    };


    const config = {
        type: 'line',
        data: data,
        options: {}
    };


    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
 
    </script> 

</x-admin_panel>