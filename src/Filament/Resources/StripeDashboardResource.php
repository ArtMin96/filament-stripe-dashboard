<?php

namespace ArtMin96\FilamentStripeDashboard\Filament\Resources;

use ArtMin96\FilamentStripeDashboard\Filament\Resources\StripeDashboardResource\Pages\ListCharges;
use ArtMin96\FilamentStripeDashboard\Filament\Resources\StripeDashboardResource\Pages\ViewCharges;
use ArtMin96\FilamentStripeDashboard\Filament\Resources\StripeDashboardResource\Widgets\AvailableBalance;
use ArtMin96\FilamentStripeDashboard\FilamentStripeDashboard;
use ArtMin96\FilamentStripeDashboard\Models\Charges;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class StripeDashboardResource extends Resource
{
    protected static ?string $model = Charges::class;

    public static function getWidgets(): array
    {
        return [
            AvailableBalance::class,
        ];
    }

    public static function form(Form $form): Form
    {
        return parent::form($form); // TODO: Change the autogenerated stub
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('charge_id')
                ->label(__('filament-stripe-dashboard::stripe-dashboard.columns.id'))
                ->searchable(isIndividual: true)
                ->toggleable(),
            TextColumn::make('amount')
                ->label(__('filament-stripe-dashboard::stripe-dashboard.columns.amount'))
                ->getStateUsing(function ($record): string {
                    return FilamentStripeDashboard::formatMoney($record->currency, $record->amount);
                })
                ->searchable(isIndividual: true)
                ->toggleable(),
            TextColumn::make('created')
                ->label(__('filament-stripe-dashboard::stripe-dashboard.columns.created'))
                ->formatStateUsing(function (string $state): string {
                    return Carbon::createFromTimestamp($state)->toDateTimeString();
                })
                ->toggleable(),
            BadgeColumn::make('status')
                ->label(__('filament-stripe-dashboard::stripe-dashboard.columns.status'))
                ->colors([
                    'success' => 'succeeded',
                    'pending' => 'secondary',
                    'disputed' => 'warning',
                    'failed' => 'danger',
                ])
                ->formatStateUsing(function (string $state): string {
                    return Str::ucfirst($state);
                })
                ->toggleable(),
        ])
            ->actions([
                ViewAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCharges::route('/'),
            'view' => ViewCharges::route('/{record}'),
        ];
    }

    protected static function getNavigationIcon(): string
    {
        return config('filament-stripe-dashboard.menu_icon') ?: 'heroicon-o-cash';
    }

    protected static function getNavigationLabel(): string
    {
        return __('filament-stripe-dashboard::stripe-dashboard.navigation_label');
    }
}
