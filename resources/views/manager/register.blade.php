<x-guest_layout>

    <div class="row">

        <div class="col-8 mx-auto  mt-5 rounded d-flex flex-row" style="height: 620px">

                <div class="w-50  bg-white rounded-start">
                        <h3 class="d-block text-center mt-5 txt-gray">ثبت نام فروشندگان</h3>

                        <form class="mt-5 px-4" method="POST" >

                             @csrf

                            <div class="mb-1 ">

                                <label for="exampleInputEmail1" class="form-label w-100 text-right">
                                    ایمیل
                                    <i class="fa-solid fa-user mx-2"></i>
                                </label>

                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                            </div>

                            <div class="mb-1 ">

                                <label for="exampleInputEmail1" class="form-label w-100 text-right">
                                    نام رستوران

                                    <i class="fa-solid fa-utensils mx-2"></i>
                                </label>

                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                            </div>
                            <div class="mb-1 ">

                                <label for="exampleInputEmail1" class="form-label w-100 text-right">
                                    نوع رستوران 
                               
                                    <i class="fa-solid fa-shop mx-2"></i>
                                </label>

                                <input type="text" name="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                            </div>

                            <div class="mb-1 ">

                                <label for="exampleInputEmail1" class="form-label w-100 text-right">
                                     شهر
                                  
                                    <i class="fa-solid fa-tree-city mx-2"></i>
                                </label>

                                <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                            </div>

                            <div class="mb-1">

                              <label for="exampleInputPassword1" class="form-label w-100 text-right">
                                رمزعبور
                                <i class="fa-solid fa-key mx-2"></i>
                              </label>
                              <input type="password" name="password" class="form-control" id="exampleInputPassword1">

                            </div>

                            <button type="submit" class="btn btn-custom mt-5 d-block mx-auto">ثبت نام</button>
                        </form>


                           @if ($errors->any())

                            <div class="d-block text-center mt-5">

                                {{$errors->all()[0]}}

                            </div>
                               
                           @endif

                    </div>

                <div class="w-50">
                    <img src="{{asset("img/manager.webp")}}" alt="" class="w-100 h-100 rounded-end cover">
                </div>

                
        </div>

    </div>

</x-guest_layout>