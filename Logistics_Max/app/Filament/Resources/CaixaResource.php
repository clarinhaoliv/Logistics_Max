<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CaixaResource\Pages;
use App\Filament\Resources\CaixaResource\RelationManagers;
use App\Models\Caixa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CaixaResource extends Resource
{
    protected static ?string $model = Caixa::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationLabel = 'Caixas';

    protected static ?string $modelLabel = 'Caixa';

    protected static ?string $pluralModelLabel = 'Caixas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo_caixa')
                ->label('Código da Caixa')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('peso_carga')
                ->label('Peso da Carga')
                ->numeric()
                ->required(),

            Forms\Components\Select::make('unidade_peso')
                ->label('Unidade do Peso')
                ->options([
                    // As chaves devem ser EXATAMENTE iguais aos valores do ENUM da migration
                    'Grama'      => 'Grama',
                    'Quilograma' => 'Quilograma',
                    'Tonelada'   => 'Tonelada',
                ])
                ->required(),

            // Mantido numeric() para evitar textos bagunçados na sua coluna string
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
                Tables\Columns\TextColumn::make('codigo_caixa')->searchable(),
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
            'index' => Pages\ListCaixas::route('/'),
            'create' => Pages\CreateCaixa::route('/create'),
            'edit' => Pages\EditCaixa::route('/{record}/edit'),
        ];
    }
}
