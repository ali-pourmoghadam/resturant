
<x-manager_panel>

    <div class="position-absolute" style="right:265px; top:16px">

        <i class="fa-regular fs-5 fa-bell  position-absolute pointer"

        data-bs-toggle="modal" data-bs-target="#notif"
        
        style="right:27px; top:3px">
    
                @if ($countNotifs > 0)

                <div class="bell-count">
                    {{$countNotifs}}
                </div>
                    
                @endif
         </i>
    </div>



     
    <x-modal class="d-flex flex-column" idx="notif" title="پیغام ها">
        

        <div class="d-flex flex-column">
            
            @empty(!$notifications["foodParty"])

                <h5 class="d-block text-right px-2">: فودپارتی </h5>
        
                @foreach ($notifications["foodParty"] as $notif)

                    <div class="px-4 text-center mt-3 position-relative" style="width:100%;">

                        <button  onclick="mark('{{$notif['id']}}')" class="btn-close mx-2" style="font-size: 10px"></button>  فود پارتی مورخ {{$notif["begin"]}} شروع میشود  

                    </div>

        
                @endforeach
                
            @endempty
         
         </div>



        <div class="d-flex flex-column">
            
            @empty(!$notifications["order"])

            <h5 class="d-block text-right px-2">: سفارش </h5>
            
            @foreach ($notifications["order"] as $notif)
            
                    <div class="px-4 text-center mt-3 position-relative" style="width:100%;">

                        <button  onclick="mark('{{$notif['id']}}')" class="btn-close mx-2" style="font-size: 10px"></button> درخواست سفارش , پنل خود را چک کنید

                    </div>

        
                @endforeach
                
            @endempty
         
         </div>

        <div class="d-flex flex-column">
            
            @empty(!$notifications["comment"])

            <h5 class="d-block text-right px-2">: نظرات </h5>
            
            @foreach ($notifications["comment"] as $notif)
            
                    <div class="px-4 text-center mt-3 position-relative" style="width:100%;">

                        <button  onclick="mark('{{$notif['id']}}')" class="btn-close mx-2" style="font-size: 10px"></button>    نظر خود را ثبت کرده {{$notif['sender']}}

                    </div>

        
                @endforeach
                
            @endempty
         
         </div>




        <script>

            function mark(id)
                    {

   
                        var xhr = new XMLHttpRequest();

                        var formData = new FormData()
                    
                        formData.append("id" , id)

                        formData.append("_token" , ' {{ csrf_token() }}')


                        xhr.onreadystatechange = function() {

                        if (this.readyState == 4 ) 
                        {

                            message = JSON.parse(this.responseText)


                            if(message.success)
                            {
                                window.location.replace("/manager/dashboard");
                            }

                        }

                        }


                        xhr.open('POST', 'markNotifications/'+id, true);

                        xhr.setRequestHeader('Accept', 'application/json');

                        xhr.send(formData);


                    }

        </script>

    </x-modal>
    
</x-manager_panel>