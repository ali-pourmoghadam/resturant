<x-manager_panel>

    <div class="col-sm-5 mx-auto">

        @foreach ($notifications as $notif)
            
            <x-success_message>

                    شروع فرود پارتی از :{{$notif->data['begin']}}
                    <br>
                    پایان فرود پارتی در :{{$notif->data['end']}}
            
            </x-success_message>
            
        @endforeach

    </div>
    
</x-manager_panel>