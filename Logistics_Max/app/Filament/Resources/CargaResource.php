<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CargaResource\Pages;
use App\Filament\Resources\CargaResource\RelationManagers;
use App\Models\Carga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CargaResource extends Resource
{
    protected static ?string $model = Carga::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationLabel = 'Cargas';

    protected static ?string $modelLabel = 'Carga';

    protected static ?string $pluralModelLabel = 'Cargas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_pallet')
                ->label('Pallet')
                ->relationship('pallets', 'codigo_pallet')
                ->searchable()
                ->preload()
                ->nullable(),

            Forms\Components\Select::make('id_caixa')
                ->label('Caixa')
                ->relationship('caixas', 'codigo_caixa')
                ->searchable()
                ->preload()
                ->nullable(),

            Forms\Components\TextInput::make('destino')
                ->label('Destino')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('status')
                ->options([
                    'Recebido' => 'Recebido',
                    'Em Processamento' => 'Em Processamento',
                    'Expedido' => 'Expedido',
                ])
                ->required(),

            Forms\Components\TextInput::make('tipo_movimento')
                ->label('Tipo de Movimento')
                ->required()
                ->maxLength(255),

            Forms\Components\DateTimePicker::make('data_movimento')
                ->label('Data do Movimento')
                ->required(),

            Forms\Components\TextInput::make('quantidade_movimento')
                ->label('Quantidade')
                ->numeric()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('destino')->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('tipo_movimento'),
                Tables\Columns\TextColumn::make('quantidade_movimento'),
                Tables\Columns\TextColumn::make('data_movimento')->dateTime(),
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
            'index' => Pages\ListCargas::route('/'),
            'create' => Pages\CreateCarga::route('/create'),
            'edit' => Pages\EditCarga::route('/{record}/edit'),
        ];
    }
}
