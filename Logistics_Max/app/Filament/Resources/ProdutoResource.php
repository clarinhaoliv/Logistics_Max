<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutoResource\Pages;
use App\Filament\Resources\ProdutoResource\RelationManagers;
use App\Models\Produto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class ProdutoResource extends Resource
{
    protected static ?string $model = Produto::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Produtos';

    protected static ?string $modelLabel = 'Produto';

    protected static ?string $pluralModelLabel = 'Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('fornecedores_id')
                    ->label('Fornecedores')
                    ->relationship('fornecedores', 'nome')
                    ->required()
                    ->searchable()
                    ->preload(),

                Forms\Components\TextInput::make('nome')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('codigo_produto')
                    ->label('Código do Produto')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('preco')
                    ->label('Preço')
                    ->numeric()
                    ->required()
                    ->prefix('R$'),

                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('codigo_produto')->searchable(),
                Tables\Columns\TextColumn::make('fornecedores.nome')->label('Fornecedores')->searchable(),
                Tables\Columns\TextColumn::make('preco')->money('BRL', true)->sortable(),
                Tables\Columns\TextColumn::make('quantidade')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
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
            'index' => Pages\ListProdutos::route('/'),
            'create' => Pages\CreateProduto::route('/create'),
            'edit' => Pages\EditProduto::route('/{record}/edit'),
        ];
    }
}
