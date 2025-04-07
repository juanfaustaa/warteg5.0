<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\MsMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = MsMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('menuname')
                    ->label('Menu Name')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('menuimage')
                    ->label('Menu Image')
                    ->image()
                    ->directory('msmenus')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('menuprice')
                    ->label('Menu Price')
                    ->required()
                    ->numeric()
                    ->columnSpanFull()
                    ->prefix('Rp'),
                Forms\Components\Select::make('menucategoryid')
                    ->label('Menu Category')
                    ->required()
                    ->columnSpanFull()
                    ->relationship('MsMenuCategory', 'menucategoryname'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('menuname')
                    ->label('Menu Name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('menuimage')
                    ->label('Menu Image'),
                Tables\Columns\TextColumn::make('menuprice')
                    ->label('Menu Price')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('MsMenuCategory.menucategoryname')
                    ->label('Menu Category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
