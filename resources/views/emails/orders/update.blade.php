<x-mail::message>
# Introduction

<p class="text-center">

    your order status :
    
    {{$order->status}}
    
</p>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
