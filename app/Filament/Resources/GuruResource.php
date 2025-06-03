<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Data Guru';
    
    protected static ?string $pluralLabel = 'Daftar Data Guru';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required()->label('Nama Guru'),
                TextInput::make('nip')->required()->unique()->label('NIP'),
                Select::make('gender')
                    ->options(['L' => 'Laki-laki', 'P' => 'Perempuan'])
                    ->label('Jenis Kelamin')
                    ->required(),
                Textarea::make('alamat')->required()->label('Alamat'),
                TextInput::make('kontak')->label('Kontak'),
                TextInput::make('email')->email()->label('Email'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama')
                    ->searchable(),
                TextColumn::make('nip')->label('NIP')
                    ->searchable(),
                TextColumn::make('ketGender')
                    ->label('Jenis Kelamin'),
                TextColumn::make('alamat')->label('Alamat'),
                TextColumn::make('kontak')->label('Kontak'),
                TextColumn::make('email')->label('Email')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()->label('Lihat Detail'),
                    Tables\Actions\EditAction::make()->label('Ubah Data'),
                    Tables\Actions\DeleteAction::make()->label('Hapus Data'),
                ])
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
