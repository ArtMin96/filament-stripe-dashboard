<?php

namespace ArtMin96\FilamentStripeDashboard\Filament\Resources\StripeDashboardResource\Pages;

use ArtMin96\FilamentStripeDashboard\Filament\Resources\StripeDashboardResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class ListCharges extends ListRecords
{
    protected static string $resource = StripeDashboardResource::class;

    protected function getHeaderWidgets(): array
    {
        return StripeDashboardResource::getWidgets();
    }

    protected function getTitle(): string
    {
        return __('filament-stripe-dashboard::stripe-dashboard.list_title');
    }

    protected function isTablePaginationEnabled(): bool
    {
        return true;
    }

    protected function paginateTableQuery(Builder $query): Paginator
    {
//        $this->setPage(2, $this->getTablePaginationPageName());
//        dd($this->nextPage($this->getTablePaginationPageName()));
        return $query->simplePaginate($this->getTableRecordsPerPage() == -1 ? $query->count() : $this->getTableRecordsPerPage());
    }
}
