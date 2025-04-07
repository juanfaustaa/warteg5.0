<?php

namespace App\Filament\Resources\TransactionDetailsResource\Pages;

use App\Filament\Resources\TransactionDetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Models\TransactionDetail;

class ListTransactionDetails extends ListRecords
{
    protected static string $resource = TransactionDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        $transactionid = request()->route('parent');

        return TransactionDetail::query()->where('transactionid', $transactionid);
    }
}
