<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionHeaderResource\Pages;
use App\Models\TransactionHeader;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use App\Filament\Resources\TransactionDetailsResource\Pages\ListTransactionDetails;

class TransactionHeaderResource extends Resource
{
    protected static ?string $model = TransactionHeader::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('transactionid')
                    ->label('Transaction ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('transactiondate')
                    ->label('Transaction Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('paymentstatus')
                    ->label('Payment Status')
                    ->badge()
                    ->colors([
                        'success' => fn($state): bool => $state === 'SUCCESS',
                        'warning' => fn($state): bool => $state === 'PENDING',
                        'danger' => fn($state): bool => $state === 'FAILED',
                    ]),
                Tables\Columns\TextColumn::make('MsUser.username')
                    ->label('Customer Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtotal')
                    ->label('Subtotal')
                    ->getStateUsing(fn ($record) => $record->subtotal)
                    ->numeric()
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('See Transaction')
                ->color('success')
                ->url(function (TransactionHeader $record) {
                    return static::getUrl('TransactionHeader-TransactionDetails.index', [
                        'parent' => $record->transactionid,
                    ]);
                }),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactionHeaders::route('/'),
            'create' => Pages\CreateTransactionHeader::route('/create'),
            'edit' => Pages\EditTransactionHeader::route('/{record}/edit'),
            'TransactionHeader-TransactionDetails.index' => ListTransactionDetails::route('/{parent}/TransactionHeader'),
        ];
    }
}
