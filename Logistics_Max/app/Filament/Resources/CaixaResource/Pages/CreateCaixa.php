<?php

namespace App\Filament\Resources\CaixaResource\Pages;
use Illuminate\Support\Facades\Log;
use App\Filament\Resources\CaixaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCaixa extends CreateRecord
{
    protected static string $resource = CaixaResource::class;

    protected function beforeCreate(): void
    {
        $this->data['codigo_caixa'] = strtoupper($this->data['codigo_caixa']);
    }

    protected function afterCreate(): void
    {
       Log::info('Uma nova caixa foi criado no sistema.');
    }
}
