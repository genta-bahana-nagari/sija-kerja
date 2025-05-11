<?php

namespace App\Filament\Resources\PKLResource\Pages;

use App\Filament\Resources\PKLResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPKLS extends ListRecords
{
    protected static string $resource = PKLResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make()->label('Tambah Data PKL'),
        ];
    }
}
