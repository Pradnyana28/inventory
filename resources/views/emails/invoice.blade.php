@component('mail::message')
<h1>Thank you for your order</h1>

<h2>{{ $purchases->invoice_number }}</h2>
name: {{ $purchases->user->name }}
@endcomponent