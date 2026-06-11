<?php

namespace App\Filament\Resources\FornecedoresResource\Pages;

use App\Filament\Resources\FornecedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateFornecedores extends CreateRecord
{
    protected static string $resource = FornecedoresResource::class;
    protected function beforeCreate(): void
    {
        if (empty($this->data['nome'])) {
            Notification::make()
                ->title('Nome obrigatório')
                ->body('Informe o nome do Fornecedor.')
                ->danger()
                ->send();

            $this->halt();
        }
    }
}
