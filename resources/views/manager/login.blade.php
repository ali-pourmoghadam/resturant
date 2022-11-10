<x-guest_layout>

    <div class="row">

        <div class="col-7 mx-auto  mt-100 rounded d-flex flex-row" style="height: 500px">

                <div class="w-50  bg-white rounded-start">
                        <h3 class="d-block text-center mt-5 txt-gray">ورود مدیر رستوران</h3>

                        <form class="mt-5 px-4">

                             @csrf

                            <div class="mb-3 mt-3">

                                <label for="exampleInputEmail1" class="form-label w-100 text-right">
                                    نام کاریری
                                   
                                    <i class="fa-solid fa-user mx-2"></i>
                                </label>

                                <input type="email" id="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                                <div id="error-email" class="text-center form-text text-danger"></div>
                            </div>

                            <div class="mb-3">

                              <label for="exampleInputPassword1" class="form-label w-100 text-right">
                                رمزعبور
                                <i class="fa-solid fa-key mx-2"></i>
                              </label>
                              <input type="password" id="password" name="password" class="form-control" id="exampleInputPassword1">
                              <div id="error-password" class="text-center form-text text-danger"></div>
                            </div>

                            <div class="mt-3 form-check  "dir="rtl">

                                <label class="form-check-label mx-4"for="exampleCheck1">مرا به خاطر بسپار</label>
                                <input  type="checkbox" class="form-check-input float-end" name="remmember" id="remmember">
                               
                                <div id="error-remmember" class="text-center form-text text-danger"></div>

                                <div id="error-wrong_credential" class="text-center form-text text-danger"></div>
                            </div>

                            <button onclick="login()" type="button" class="btn btn-custom mt-5 d-block mx-auto">ورود</button>
                        </form>


                           @if ($errors->any())

                            <div class="d-block text-center mt-5">

                                {{$errors->all()[0]}}

                            </div>
                               
                           @endif

                    </div>

                <div class="w-50">
                    <img src="{{asset("img/manager.jpg")}}" alt="" class="w-100 h-100 rounded-end cover">
                </div>

                
        </div>

    </div>


    <script>

        function login()
        {

            
            var email = document.querySelector("#email").value

            var password = document.querySelector("#password").value

            var remmember = document.querySelector("#remmember").checked


            var xhr = new XMLHttpRequest();

            var formData = new FormData()


            console.log(password)
         
            formData.append("email" , email)
            formData.append("password" , password)
            formData.append("remmember" , remmember)
            formData.append("_token" , ' {{ csrf_token() }}')


            xhr.onreadystatechange = function() {

            if (this.readyState == 4 ) 
            {

                message = JSON.parse(this.responseText)


                if(message.success)
                {
                    window.location.replace("/manager/dashboard");
                }
                
                for(var item in message.errors)
                {
                    
                    document.querySelector("#error-"+item).innerHTML =  message.errors[item]
                
                }

            }

            }


            xhr.open('POST', '/manager/login', true);

            xhr.setRequestHeader('Accept', 'application/json');

            xhr.send(formData);



        }

    </script>

</x-guest_layout>