<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @vite(['resources/js/app.js'])

    <title>پنل ادمین</title>
    
</head>
<body>

    <div class="row h-100">



            {{-- --SATRT-BODY-- --}}


            <div class="col-10 h-100 ">

               
                {{-- --SATRT-BODY-HEADER-- --}}

                    <div class="admin-header d-flex fle-row justify-content-start align-items-center">

                        <div class="flex-1 h-100 w-50 d-flex justify-content-start align-items-center px-3">

                            <span>
                                <i class="fa-solid fs-4 fa-arrow-right-from-bracket"></i>
                            </span>
                            
                        </div>

                        <div class="flex-1  h-100 w-50">

                        </div>
                    </div>

                {{-- --End-BODY-HEADER-- --}}  


                {{-- --SATRT-BODY-CONTENT-- --}}

                    <div>
                        {{$slot}}
                    </div>

                {{-- --END-BODY-CONTENT-- --}}

            </div>

            {{-- --END-SIDEBAR-- --}}



            {{-- --SATRT-SIDEBAR-- --}}
            
            <div class="col-2 bg-dark h-100 d-flex flex-column">
                


                    {{-- START-ADMIN --}}
                    
                    <div class="border-bottom-gary panel-admin-sction">

                        <div class="position-relative panel-item px-4 py-2 ">

                            <img src="{{asset("img/avatar.png")}}" class="avatar d-block mx-auto " alt="">

                          

                            <span class="d-block text-center mt-3 fs-6 text-light">

                                <i class="fa-solid fa-people-roof test-light"></i>

                                مدیریت 

                            </span>

                        </div>

                    </div>

                    {{-- END-ADMIN --}}
                    


                    {{-- START-ADMIN- --}}

                    <div>

                        <div class="position-relative mx-auto w-80 panel-item px-4 py-2 ">


                            <i class="position-absolute mt-1  text-light fs-6  fa-solid fa-chart-line"></i>
                            <span class="text-light fs-6 d-block text-center  ">داشبورد</span>
                            
                        </div>

                    </div>


                    {{-- START-CATEGORY --}}

                    <div>



                        <div class="position-relative mx-auto w-80 panel-item px-4 py-2 " data-bs-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1">
                        
                            <i class="position-absolute mt-1  text-light fs-6  fa-solid fa-plus-minus"></i>

                            <span class="text-light fs-6 d-block text-center  ">دسته بندی</span>

                        </div>

                        {{-- START-CATEGORY-TIEMS --}}

                        <div id="collapse-1"  class="

                                        

                                        bg-light rounded-3 d-felx

                                        flex-column panel-item-sub 

                                        justify-content-center

                                        align-items-center

                                        w-75

                                        mx-auto
                                        
                                        mb-3
                                        " >


                                    <div class="position-relative px-3 py-2 ">

                                    
                                        <i class="position-absolute mt-1 fs-6 fa-solid fa-business-time"></i>

                                        <a href="" class="fs-6  d-block text-center text-dark">دسته بندی شغل ها</a>

                                    </div>

                                    <div class="position-relative px-3 py-2 ">

                    
                                        <i class="position-absolute mt-1 fs-6  fa-solid fa-utensils"></i>

                                        <a href="" class="fs-6  d-block text-center text-dark">دسته بندی  غذاها</a>

                                    </div>

                                
                        </div>

                        {{-- END-CATEGORY-TIEMS --}}


                    </div>

                    {{-- END-CATEGORY --}}



                    {{-- START-FOODPARTY --}}

                    <div >

                        <div class="position-relative  mx-auto w-80  panel-item px-4 py-2 " data-bs-toggle="collapse" href="#collapse-2" role="button" aria-expanded="true" aria-controls="collapse-2">
                        
                            
                            <i class="position-absolute mt-1 text-light fs-6 fa-solid fa-pizza-slice"></i>

                            <span class="text-light fs-6 d-block text-center ">فود پارتی</span>
            
                        </div>


                        {{-- START-FOODPARTY-TIEMS --}}

                        <div id="collapse-2"  class="

                        collapse

                        bg-light rounded-3 d-felx

                        flex-column panel-item-sub 

                        justify-content-center

                        align-items-center

                        w-75

                        mx-auto
                        
                        mb-3
                        " >


                        <div class="position-relative px-3 py-2 ">

                            <i class="fa-solid position-absolute mt-1 fs-6 fa-wand-sparkles"></i>

                            <a href="" class="fs-6  d-block text-center text-dark">مدیریت فودپارتی</a>

                        </div>

                
                
                    </div>

                    {{-- END-FOODPARTY-TIEMS --}}

                    





            </div>

            {{-- --END-SIDEBAR-- --}}

               



            </div>
    </div>
    
</body>
</html>