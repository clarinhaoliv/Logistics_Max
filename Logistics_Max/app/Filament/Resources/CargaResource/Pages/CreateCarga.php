<?php

namespace App\Filament\Resources\CargaResource\Pages;
use Illuminate\Support\Facades\Log;
use App\Filament\Resources\CargaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCarga extends CreateRecord
{
    protected static string $resource = CargaResource::class;

    protected function beforeCreate(): void
    {
        $this->data['destino'] = trim($this->data['destino']);
        $this->data['tipo_movimento'] = trim($this->data['tipo_movimento']);
    }

    protected function afterCreate(): void
    {
        Log::info('Uma nova carga foi criado no sistema.');
    }
}
