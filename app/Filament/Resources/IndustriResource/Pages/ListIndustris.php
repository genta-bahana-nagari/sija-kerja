<?php

namespace App\Filament\Resources\IndustriResource\Pages;

use App\Filament\Resources\IndustriResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIndustris extends ListRecords
{
    protected static string $resource = IndustriResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make()->label('Tambah Industri'),
        ];
    }
}
