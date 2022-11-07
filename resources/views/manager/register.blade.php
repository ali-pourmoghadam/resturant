<x-guest_layout>

    <div class="row">

        <div class="col-8 mx-auto  mt-5 rounded d-flex flex-row" style="height: 620px">

                <div class="w-50  bg-white rounded-start">
                        <h3 class="d-block text-center mt-5 txt-gray">ثبت نام فروشندگان</h3>

                        <form class="mt-5 px-4" >

                             @csrf

                            <div class="mb-1 ">

                                <label for="exampleInputEmail1" class="form-label w-100 text-right">
                                    ایمیل
                                    <i class="fa-solid fa-user mx-2"></i>
                                </label>

                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                                
                                <div id="error-email" class="text-center form-text text-danger"></div>
                            </div>

                            <div class="mb-1 ">

                                <label for="exampleInputEmail1" class="form-label w-100 text-right">
                                    نام رستوران

                                    <i class="fa-solid fa-utensils mx-2"></i>
                                </label>

                                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                                
                                <div id="error-name" class="text-center form-text text-danger"></div>
                            </div>
                            <div class="mb-1 ">

                                <label for="exampleInputEmail1" class="form-label w-100 text-right">
                                    نوع رستوران 
                               
                                    <i class="fa-solid fa-shop mx-2"></i>
                                </label>

                                <select name="type" id="type" class="form-select text-center" aria-label="Default select example">
                                    
                                    @foreach ($categories as $category)

                                    <option value="{{$category->id}}">{{$category->name}}</option>

                                    @endforeach

                                  </select>

                                  <div id="error-type" class="text-center form-text text-danger"></div>
                                
                            </div>

                            <div class="mb-1 ">

                                <label for="exampleInputEmail1" class="form-label w-100 text-right">
                                     شهر
                                  
                                    <i class="fa-solid fa-tree-city mx-2"></i>
                                </label>

                                <select name="city" id="city" class="form-select text-center" aria-label="Default select example">
                                    
                                    @foreach ($cities as $city)

                                    <option value="{{$city->id}}">{{$city->name}}</option>

                                    @endforeach

                                  </select>

                                  <div id="error-city" class="text-center form-text text-danger"></div>
                                
                            </div>

                            <div class="mb-1">

                              <label for="exampleInputPassword1" class="form-label w-100 text-right">
                                رمزعبور
                                <i class="fa-solid fa-key mx-2"></i>
                              </label>
                              <input type="password" name="password" id="password" class="form-control" id="exampleInputPassword1">

                              <div id="error-password" class="text-center form-text text-danger"></div>
                            </div>

                         

                            <button onclick="createUser()" type="button" class="btn btn-custom mt-5 d-block mx-auto">ثبت نام</button>
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



      <div class="show-errors">
    
      </div>



    <script>


        function createUser(){

            var email = document.querySelector("#email").value

            var name = document.querySelector("#name").value

            var type = document.querySelector("#type").value

            var city = document.querySelector("#city").value
            
            var password = document.querySelector("#password").value

          

            var xhr = new XMLHttpRequest();

            var formData = new FormData()


         
            formData.append("email" , email)
            formData.append("name" , name)
            formData.append("type" , type)
            formData.append("city" , city)
            formData.append("password" , password)
            formData.append("_token" , ' {{ csrf_token() }}')
           
            xhr.onreadystatechange = function() {

                    if (this.readyState == 4 ) 
                     {
         
                        message = JSON.parse(this.responseText)
                        
                        if(message.success)
                        {
                            window.location.replace("/");
                        }
                        
                        for(var item in message.errors)
                        {
                            
                            document.querySelector("#error-"+item).innerHTML =  message.errors[item]
                        
                        }
                  
                      }

                }
                

             xhr.open('POST', '/manager/register', true);

             xhr.setRequestHeader('Accept', 'application/json');
                
             xhr.send(formData);


        }

    </script>

</x-guest_layout>