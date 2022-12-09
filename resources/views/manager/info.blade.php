<x-manager_panel>
    

<form action="/manager/resturant/info/{{$resturant->id}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method("PATCH")

    <div class="col-8 mx-auto h-100 p-3">

        <div class="row mt-5">

            <h6 class="d-block mx-2 mt-2 text-right"> :مکان خود را مشخص کنید</h6>

            <div class="col-9 mx-auto">

                <div class="form-group">

                    <div id="map" class="mx-auto" style="width: 600px; height: 450px; background: #eee; border: 2px solid #aaa;"></div>
  
                </div>
        
            </div>
            
        </div>

      
    
        <div class="row">

            <div class="mb-3 col-6 mt-3 mx-auto">
           
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class=" d-block mx-2 text-right"> عرض حغرافیایی</label>
    
                       <input type="text" name="latitude" value="{{$resturant->latitude}}"  placeholder="{{$resturant->latitude}}" class="form-control mt-1 text-center" id="lat" aria-describedby="emailHelp" >
    
                       @error('lat')
                            <div class="text-danger text-center mt-2">{{ $message }}</div>
                        @enderror
                    </div>
            </div>

            <div class="mb-3 col-6 mt-3 mx-auto">
           
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="d-block mx-2 text-right">طول جغرافیایی</label>

                    <input type="text" name="longtitude" value="{{$resturant->longtitude}}"  placeholder="{{$resturant->longtitude}}" class="form-control mt-1 text-center" id="long" aria-describedby="emailHelp" >

                    @error('long')
                    <p class="text-danger text-center mt-2">{{ $message }}</p>
                    @enderror

                    </div>
            </div>

        </div>
      
       
        
      
        <div class="mb-3 col-7 mt-3 mx-auto">
           
             <x-file_upload></x-file_upload>

             @error('thumbnail')
             <p class="text-danger text-center mt-2">{{ $message }}</p>
             @enderror
        </div>

        <div class="mb-3 col-5  mx-auto">
            
            <label for="exampleInputEmail1" class=" d-block mx-2 text-right"> :  شماره تماس</label>
            
            <input type="text" name="phone_number"  value="{{$resturant->phone_number}}"  placeholder="{{$resturant->phone_number}}"  class="form-control mt-1 text-right" id="exampleInputEmail1" aria-describedby="emailHelp" >

            @error('phone_number')
            <p class="text-danger text-center mt-2">{{ $message }}</p>
            @enderror

        </div>


        <div class="mb-3">

            <label for="exampleInputEmail1" class=" d-block mx-2 text-right"> :  ادرس</label>

            <input type="text" name="address"   value="{{$resturant->address}}"  placeholder="{{$resturant->address}}"   class="form-control mt-1 text-right" id="exampleInputEmail1" aria-describedby="emailHelp" >

            @error('address')
            <p class="text-danger text-center mt-2">{{ $message }}</p>
            @enderror

            
        </div>


    <div class="mb-3 col-7 mx-auto">

                                
        <label class="form-label w-100 text-right">انتخاب روز کاری</label>

        <div class="d-flex flex-column  justify-content-center mb-4 mt-2" >

            <div class="form-check mx-1">

                <input name="day[sat]" class="form-check-input" type="checkbox" value="64" id="flexCheckDefault" checked>

                <label class="form-check-label mx-2" for="flexCheckDefault">
                شنبه
                </label>

                
               <x-time :workHours=$workHours  day="saturday"></x-time>


            </div>

            <div class="form-check mx-1">
                <input name="day[sun]" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" >
                <label class="form-check-label mx-2" for="flexCheck">
            یکشنبه
                </label>

                <x-time :workHours=$workHours day="sunday"></x-time>

            </div>
            <div class="form-check mx-1">
                <input name="day[mon]" class="form-check-input" type="checkbox" value="2" id="flexCheck" >
                <label class="form-check-label mx-2" for="flexCheck">
            دوشنبه
                </label>

                <x-time :workHours=$workHours day="monday"></x-time>

            </div>
            <div class="form-check mx-1">
                <input name=" day[tue]" class="form-check-input" type="checkbox" value="4" id="flexCheck" >
                <label class="form-check-label mx-2" for="flexCheck">
            سه شنبه
                </label>

                <x-time :workHours=$workHours day="tuesday"></x-time>
            </div>
            <div class="form-check mx-1">
                <input name="day[wen]" class="form-check-input" type="checkbox" value="8" id="flexCheck" >
                <label class="form-check-label mx-2" for="flexCheck">
            چهار شنبه
                </label>

                <x-time :workHours=$workHours day="wednesday"></x-time>

            </div>
            <div  class="form-check mx-1">
                <input   name=" day[thu]"  class="form-check-input" type="checkbox" value="16" id="flexCheck" >
                <label class="form-check-label mx-2" for="flexCheck">
            پنج شنبه
                </label>

                <x-time :workHours=$workHours day="thursday"></x-time>

            </div>
            <div  class="form-check mx-1">
                <input  name=" day[fri]" class="form-check-input" type="checkbox" value="32" id="flexCheck" >
                <label class="form-check-label mx-2" for="flexCheck">
            جمعه
                </label>

                <x-time :workHours=$workHours day="friday"></x-time>
            </div>


            
            @if(session()->has('hours'))

                @foreach (session('hours') as $key=>$value)
                
                <p class="text-center">
                    {{$value}}_{{$key}}    
                </p>

                @endforeach

            @endif
        
            
                
        
       
        </div>

    </div>
    


        
        <div class="mb-3 mt-2">

            <button class="btn btn-custom d-block mx-auto">ارسال اطلاعات</button>
            
        </div>

    </div>


</form>



    <script type="text/javascript">

        var latInput =  document.querySelector("#lat");
        var lonInput =  document.querySelector("#long");

        var myMap = new ol.Map({
            target: 'map',
            key: 'web.9d4ce296ce3643cf872e77b4588aca46',
            maptype: 'dreamy',
            poi: true,
            traffic: false,
            view: new ol.View({
                
                center: ol.proj.fromLonLat([51.338076, 35.699756]),
                zoom: 14
            }) ,

          
        });


        myMap.on('click', function(evt){                

        var coords = ol.proj.toLonLat(evt.coordinate);
        
        var lat = coords[1];
        var lon = coords[0];

        latInput.value = lat
        lonInput.value = lon

        });

        

    </script>

</x-manager_panel>