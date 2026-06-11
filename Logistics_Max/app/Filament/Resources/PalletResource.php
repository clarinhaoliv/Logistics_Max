<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PalletResource\Pages;
use App\Filament\Resources\PalletResource\RelationManagers;
use App\Models\Pallet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PalletResource extends Resource
{
    protected static ?string $model = Pallet::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationLabel = 'Pallets';

    protected static ?string $modelLabel = 'Pallet';

    protected static ?string $pluralModelLabel = 'Pallets';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo_pallet')
                ->label('Código do Pallet')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('peso_carga')
                ->label('Peso da Carga')
                ->numeric()
                ->required(),

            Forms\Components\Select::make('unidade_peso')
                ->label('Unidade do Peso')
                ->options([
                    'Grama'      => 'Grama',
                    'Quilograma' => 'Quilograma',
                    'Tonelada'   => 'Tonelada',
                ])
                ->required(),

            Forms\Components\TextInput::make('altura')
                ->label('Altura (m)')
                ->placeholder('Ex: 0.60')
                ->numeric() 
                ->required(),

            Forms\Components\TextInput::make('largura')
                ->label('Largura (m)')
                ->placeholder('Ex: 1.20')
                ->numeric() 
                ->required(),

            Forms\Components\TextInput::make('profundidade')
                ->label('Profundidade (m)')
                ->placeholder('Ex: 4.80')
                ->numeric() 
                ->required(),

            Forms\Components\Select::make('status')
                ->options([
                    'Recebido' => 'Recebido',
                    'Em Processamento' => 'Em Processamento',
                    'Expedido' => 'Expedido',
                ])
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo_pallet')->searchable(),
                Tables\Columns\TextColumn::make('peso_carga'),
                Tables\Columns\TextColumn::make('unidade_peso'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListPallets::route('/'),
            'create' => Pages\CreatePallet::route('/create'),
            'edit' => Pages\EditPallet::route('/{record}/edit'),
        ];
    }
}
