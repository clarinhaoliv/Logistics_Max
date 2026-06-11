<?php

namespace App\Filament\Resources\PalletResource\Pages;
use Illuminate\Support\Facades\Log;
use App\Filament\Resources\PalletResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePallet extends CreateRecord
{
    protected static string $resource = PalletResource::class;

    protected function beforeCreate(): void
    {
        $this->data['codigo_pallet'] = strtoupper($this->data['codigo_pallet']);
    }

    protected function afterCreate(): void
    {
        Log::info('Um novo pallet foi criado no sistema.');
            
    }

};
