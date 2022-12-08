<x-mail::message>

<p class="text-center">
    order with id {{$order->id}} registered
</p>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
