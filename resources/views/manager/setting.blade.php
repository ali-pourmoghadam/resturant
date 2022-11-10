<x-manager_panel>

    <form method="POST" enctype="multipart/form-data" action="/manager/setting/{{$id}}">
 
        @csrf

        <div class="col-8 mx-auto h-100 p-3">

        <div class="row mt-5">

            <div class="col-6">

                <div class="form-group">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="d-block mx-2 text-right">: ایمیل</label>
                       <input type="email" name="email" class="form-control mt-1 text-center" id="exampleInputEmail1" aria-describedby="emailHelp" >

                       @error('email')
                            <div class="text-danger text-center mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class=" d-block mx-2 text-right"> : نام</label>
                       <input type="text" name="name" class="form-control mt-1 text-center" id="exampleInputEmail1" aria-describedby="emailHelp" >

                       @error('name')
                       <p class="text-danger text-center mt-2">{{ $message }}</p>
                       @enderror

                    </div>
                   
                </div>
        
            </div>

            <div class="col-6">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class=" d-block mx-2 text-right"> : نام خانوادگی</label>
                   <input type="text" name="last_name"  class="form-control mt-1 text-center" id="exampleInputEmail1" aria-describedby="emailHelp" >
                   
                   @error('last_name')
                   <p class="text-danger text-center mt-2">{{ $message }}</p>
                   @enderror

                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class=" d-block mx-2 text-right"> : کدملی</label>
                   <input type="text" name="national_id" class="form-control mt-1 text-center" id="exampleInputEmail1" aria-describedby="emailHelp" >

                   @error('national_id')
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
            
            <label for="exampleInputEmail1" class=" d-block mx-2 text-right"> :  شماره همراه</label>
            
            <input type="text" name="phone_number" class="form-control mt-1 text-right" id="exampleInputEmail1" aria-describedby="emailHelp" >

            @error('phone_number')
            <p class="text-danger text-center mt-2">{{ $message }}</p>
            @enderror

        </div>
{{-- 
        <div class="mb-3 col-12  mx-auto">
            
            <label for="exampleInputEmail1" class=" d-block mx-2 text-right"> : مختصات</label>
            
            <input type="hidden" name="Coordinates" value="{ data : { lat : '132.1231' , long : '3564.23'}}">

            <div id="map" class="mt-2 rounded" style=" height: 400px; background: #eee; border: 2px solid #aaa;"></div>
            
            @error('Coordinates')
            <p class="text-danger text-center mt-2">{{ $message }}</p>
            @enderror

        </div> --}}

        <div class="mb-3">

            <label for="exampleInputEmail1" class=" d-block mx-2 text-right"> :  ادرس</label>

            <input type="text" name="address" class="form-control mt-1 text-right" id="exampleInputEmail1" aria-describedby="emailHelp" >

            @error('address')
            <p class="text-danger text-center mt-2">{{ $message }}</p>
            @enderror

            
        </div>

        <div class="mb-3 mt-2">

            <button class="btn btn-custom d-block mx-auto">به ورزرسانی</button>
            
        </div>

        </div>

    </form>


    <script type="text/javascript">
        var myMap = new ol.Map({
            target: 'map',
            key: 'web.9d4ce296ce3643cf872e77b4588aca46',
            maptype: 'dreamy',
            poi: true,
            traffic: false,
            view: new ol.View({
                center: ol.proj.fromLonLat([51.338076, 35.699756]),
                zoom: 14
            })
        });
    </script>

</x-manager_panel>