<?php

namespace App\Filament\Resources\TransactionHeaderResource\Pages;

use App\Filament\Resources\TransactionHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionHeaders extends ListRecords
{
    protected static string $resource = TransactionHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
