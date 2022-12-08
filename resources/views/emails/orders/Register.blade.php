<x-mail::message>

order with id {{$order->id}} regsiterd successfully!

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
