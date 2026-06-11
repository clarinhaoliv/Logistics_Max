<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FornecedoresResource\Pages;
use App\Filament\Resources\FornecedoresResource\RelationManagers;
use App\Models\Fornecedores;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FornecedoresResource extends Resource
{
    protected static ?string $model = Fornecedores::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Fornecedores';

    protected static ?string $modelLabel = 'Fornecedor';

    protected static ?string $pluralModelLabel = 'Fornecedores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                ->required(),

            Forms\Components\TextInput::make('contato')
                ->label('Contato')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('cnpj')
                ->label('CNPJ')
                ->required()
                ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contato')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cnpj')
                    ->label('CNPJ')
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
            'index' => Pages\ListFornecedores::route('/'),
            'create' => Pages\CreateFornecedores::route('/create'),
            'edit' => Pages\EditFornecedores::route('/{record}/edit'),
        ];
    }
}
