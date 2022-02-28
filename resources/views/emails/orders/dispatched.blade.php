@component('mail::message')
    # Introduction

    Your order with code {{ $order->code }} has been dispatched and will get to you in a few days time.

    @component('mail::button', ['url' => route('account.orders.show', $order)])
        View Order
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent
