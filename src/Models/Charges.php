<?php

namespace ArtMin96\FilamentStripeDashboard\Models;

use ArtMin96\FilamentStripeDashboard\FilamentStripeDashboard;
use ArtMin96\FilamentStripeDashboard\StripeClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Sushi\Sushi;

class Charges extends Model
{
    use Sushi;

    protected $limit = 10;

    public function getRows()
    {
        $offset = request()->get('page') !== null ? intval(request()->get('page') - 1) * ($this->limit) : 0;
        $this->limit += 1;
//        dd($offset);
        $charges = (new StripeClient)->listCharges(['limit' => $this->limit]);
//        $charges = (new StripeClient)->listCharges(['limit' => $this->limit]);
//        $charges = (new StripeClient)->listCharges(['limit' => $this->limit, 'offset' => $offset]);

//        dd($this->limit, $offset, $charges, $charges->autoPagingIterator());
//        dd(request()->get('page'));

//        if ($charges->has_more) {
//            $this->limit += 1;
//        }

        return collect($charges->data)
            ->map(function ($item) {
                $charge = (new StripeClient)->getCharge($item->id);

                return [
                    'charge_id' => $charge->id,
                    'amount' => $charge->amount,
                    'currency' => $charge->currency,
                    'created' => $charge->created,
                    'status' => $charge->status,
                    'fee' => $charge->balance_transaction ? FilamentStripeDashboard::formatMoney(
                        $charge->balance_transaction->currency,
                        $charge->balance_transaction->fee
                    ) : 0,
                    'net' => $charge->balance_transaction ? FilamentStripeDashboard::formatMoney(
                        $charge->currency,
                        $charge->amount - $charge->balance_transaction->fee
                    ) : 0,
                    'metadata' => $charge->metadata->count() ? json_encode($charge->metadata->toArray()) : null,
                    'livemode' => $charge->livemode,
                    'captured' => $charge->captured,
                    'paid' => $charge->paid,
                    'refunded' => $charge->refunded,
                    'disputed' => $charge->disputed,
                    'fraud_details' => '',
                    'transfer_group' => $charge->transfer_group,
                ];
            })
            ->all();

//        return collect($charges->data)
//            ->map(function ($charge) {
//                return [
//                    'charge_id' => $charge->id,
//                    'amount' => $charge->amount,
//                    'currency' => $charge->currency,
//                    'created' => $charge->created,
//                    'status' => $charge->status,
//                    'fee' => $charge->balance_transaction ? FilamentStripeDashboard::formatMoney(
//                                                                    $charge->balance_transaction->currency,
//                                                                    $charge->balance_transaction->fee
//                                                                ) : 0,
//                    'net' => $charge->net,
//                    'metadata' => $charge->metadata->count() ? json_encode($charge->metadata->toArray()) : null,
//                    'livemode' => $charge->livemode,
//                    'captured' => $charge->captured,
//                    'paid' => $charge->paid,
//                    'refunded' => $charge->refunded,
//                    'disputed' => $charge->disputed,
//                    'fraud_details' => '',
//                    'transfer_group' => $charge->transfer_group,
//                ];
//            })
//            ->all();
    }

    public function formatMetadata()
    {
        $metadataString = [];
        $metadataJson = json_decode($this->metadata, true);

        if (!empty($metadataJson)) {
            foreach ($metadataJson as $key => $metadata) {
                $metadataKey = Str::of($key)->headline()->toString();
                $metadataString[$key] = [
                    'key' => $metadataKey,
                    'value' => $metadata,
                ];
            }
        }

        return $metadataString;

//        return implode(', ', $metadataString);
//        return collect(json_decode($this->metadata, true))
//            ->map(function ($metadata, $key): array {
//                $metadataKey = Str::of($key)->headline()->toString();
//
//                return [$key => $metadataKey . ': ' . $metadata];
//            })
//            ->implode(', ');
    }
}
