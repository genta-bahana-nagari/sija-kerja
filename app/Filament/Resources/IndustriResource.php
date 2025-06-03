<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustriResource\Pages;
use App\Filament\Resources\IndustriResource\RelationManagers;
use App\Models\Industri;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IndustriResource extends Resource
{
    protected static ?string $model = Industri::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Data Industri';
    
    protected static ?string $pluralLabel = 'Daftar Data Industri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('foto')
                    ->label('Foto Industri')
                    ->image()
                    ->disk('public')
                    ->directory('foto_industri') 
                    ->imagePreviewHeight('150')
                    ->loadingIndicatorPosition('left')
                    ->uploadProgressIndicatorPosition('left')
                    ->removeUploadedFileButtonPosition('right')
                    ->downloadable()
                    ->openable()
                    ->columnSpanFull()
                    ->required(), 
                TextInput::make('nama')->required()->label('Nama Industri'),
                Textarea::make('bidang_usaha')->required()->label('Bidang Usaha'),
                Textarea::make('alamat')->required()->label('Alamat Industri'),
                TextInput::make('kontak')->label('Kontak'),
                TextInput::make('email')->email()->label('Email'),
                TextInput::make('website')->label('Website Industri'),
                Select::make('guru_pembimbing')
                    ->relationship('guru', 'nama')
                    ->required()
                    ->label('Guru Pembimbing'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto Industri')
                    ->height(40)
                    ->circular(),
                TextColumn::make('nama')->label('Nama Industri')
                    ->searchable(),
                TextColumn::make('bidang_usaha')->label('Bidang Usaha')->limit(25)->searchable(),
                TextColumn::make('alamat')->label('Alamat')->limit(25),
                TextColumn::make('kontak')->label('Kontak'),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('website')->label('Website')->searchable(),
                TextColumn::make('guru.nama')->label('Guru Pembimbing')->searchable(),
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
            'index' => Pages\ListIndustris::route('/'),
            'create' => Pages\CreateIndustri::route('/create'),
            'edit' => Pages\EditIndustri::route('/{record}/edit'),
        ];
    }
}
