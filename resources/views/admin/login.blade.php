<x-guest_layout>

    <div class="row">

        <div class="col-7 mx-auto  mt-100 rounded d-flex flex-row" style="height: 500px">

                <div class="w-50  bg-white rounded-start">
                        <h3 class="d-block text-center mt-5 txt-gray">ورود مدیر سیستم</h3>

                        <form class="mt-5 px-4" method="POST" , action="/admin/login">

                             @csrf

                            <div class="mb-3 mt-3">

                                <label for="exampleInputEmail1" class="form-label w-100 text-right">
                                    نام کاریری
                                   
                                    <i class="fa-solid fa-user mx-2"></i>
                                </label>

                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                            </div>

                            <div class="mb-3">

                              <label for="exampleInputPassword1" class="form-label w-100 text-right">
                                رمزعبور
                                <i class="fa-solid fa-key mx-2"></i>
                              </label>
                              <input type="password" name="password" class="form-control" id="exampleInputPassword1">

                            </div>

                            <div class="mt-3 form-check  "dir="rtl">

                                <label class="form-check-label mx-4"for="exampleCheck1">مرا به خاطر بسپار</label>
                                <input  type="checkbox" class="form-check-input float-end" id="exampleCheck1">
                                
                            </div>

                            <button type="submit" class="btn btn-custom mt-5 d-block mx-auto">ورود</button>
                        </form>


                           @if ($errors->any())

                            <div class="d-block text-center mt-5">

                                {{$errors->all()[0]}}

                            </div>
                               
                           @endif

                    </div>

                <div class="w-50">
                    <img src="{{asset("img/admin.webp")}}" alt="" class="w-100 h-100 rounded-end cover">
                </div>

                
        </div>

    </div>

</x-guest_layout>