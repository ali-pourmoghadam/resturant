<x-manager_panel>

    <div class="col-sm-5 mx-auto">

        @foreach ($notifications as $notif)
            
 

                    {{-- شروع فرود پارتی از :{{$notif['begin']}}
                    <br>
                    پایان فرود پارتی در :{{$notif['end']}} --}}
       
            
        @endforeach

    </div>
    
</x-manager_panel>