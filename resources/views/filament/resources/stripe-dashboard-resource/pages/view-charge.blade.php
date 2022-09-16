<x-filament::page>
    <x-filament::card>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tbody>
                <x-filament-stripe-dashboard::charge-details-row
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.id')"
                    :value="$record->charge_id" />

                <x-filament-stripe-dashboard::charge-details-row
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.amount')"
                    :value="money($record->amount, $record->currency)" />

                <x-filament-stripe-dashboard::charge-details-row
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.fee')"
                    :value="$record->fee" />

                <x-filament-stripe-dashboard::charge-details-row
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.net')"
                    :value="$record->net" />

                <x-filament-stripe-dashboard::charge-details-row
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.status')"
                    :value="$record->status" />

                <x-filament-stripe-dashboard::charge-details-row
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.created')"
                    :value="\Carbon\Carbon::createFromTimestamp($record->created)->toDateTimeString()" />

                <x-filament-stripe-dashboard::charge-details-row
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.metadata')">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
                        <tbody>
                            @foreach($record->formatMetadata() as $metadata)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
                                        {{ $metadata['key'] }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $metadata['value'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-filament-stripe-dashboard::charge-details-row>

                <x-filament-stripe-dashboard::boolean
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.livemode')"
                    :value="$record->livemode" />

                <x-filament-stripe-dashboard::boolean
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.captured')"
                    :value="$record->captured" />

                <x-filament-stripe-dashboard::boolean
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.paid')"
                    :value="$record->paid" />

                <x-filament-stripe-dashboard::boolean
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.refunded')"
                    :value="$record->refunded" />

                <x-filament-stripe-dashboard::boolean
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.disputed')"
                    :value="$record->dispute" />

                <x-filament-stripe-dashboard::charge-details-row
                    :label="__('filament-stripe-dashboard::stripe-dashboard.columns.fraud_details')"
                    :value="$record->fraud_details" />
            </tbody>
        </table>

{{--        <div class="grid grid-cols-2 gap-6 divide-y dark:divide-slate-700">--}}
{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.id') }}</div>--}}
{{--            <div>{{ $record->charge_id }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.amount') }}</div>--}}
{{--            <div>{{ \ArtMin96\FilamentStripeDashboard\FilamentStripeDashboard::formatMoney($record->currency, $record->amount) }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.fee') }}</div>--}}
{{--            <div>{{ $record->fee }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.net') }}</div>--}}
{{--            <div>{{ $record->net }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.status') }}</div>--}}
{{--            <div>{{ $record->status }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.created') }}</div>--}}
{{--            <div>{{ \Carbon\Carbon::createFromTimestamp($record->created)->toDateTimeString() }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.metadata') }}</div>--}}
{{--            <div>{{ $record->metadata }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.livemode') }}</div>--}}
{{--            <div>--}}
{{--                @if($record->livemode)--}}
{{--                    <div class="filament-tables-boolean-column px-4 py-3">--}}
{{--                        <svg class="w-6 h-6 text-success-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <svg class="w-6 h-6 text-danger-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
{{--                    </svg>--}}
{{--                @endif--}}
{{--            </div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.captured') }}</div>--}}
{{--            <div>{{ $record->captured }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.paid') }}</div>--}}
{{--            <div>{{ $record->paid }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.refunded') }}</div>--}}
{{--            <div>{{ $record->refunded }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.dispute') }}</div>--}}
{{--            <div>{{ $record->disputed }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.fraud_details') }}</div>--}}
{{--            <div>{{ $record->fraud_details }}</div>--}}

{{--            <div>{{ __('filament-stripe-dashboard::stripe-dashboard.columns.transfer_group') }}</div>--}}
{{--            <div>{{ $record->transfer_group }}</div>--}}
{{--        </div>--}}
    </x-filament::card>
</x-filament::page>
