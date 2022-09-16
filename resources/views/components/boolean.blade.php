@props(['label' => null, 'value' => false])

<x-filament-stripe-dashboard::charge-details-row
    :label="$label">

    @if($value)
        <x-heroicon-o-check-circle class="w-6 h-6 text-success-500" />
    @else
        <x-heroicon-o-x-circle class="w-6 h-6 text-danger-500" />
    @endif

</x-filament-stripe-dashboard::charge-details-row>
