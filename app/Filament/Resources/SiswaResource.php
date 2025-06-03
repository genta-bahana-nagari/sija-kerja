<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationLabel = 'Data Siswa';
    
    protected static ?string $pluralLabel = 'Daftar Data Siswa';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('foto')
                    ->label('Foto Siswa')
                    ->image()
                    ->disk('public')
                    ->directory('foto_siswa') 
                    ->imagePreviewHeight('150')
                    ->loadingIndicatorPosition('left')
                    ->uploadProgressIndicatorPosition('left')
                    ->removeUploadedFileButtonPosition('right')
                    ->downloadable()
                    ->openable()
                    ->columnSpanFull()
                    ->required(), 
                
                TextInput::make('nama')->required()->label('Nama Siswa'),
                
                TextInput::make('nis')->required()->unique()->label('NIS'),
                
                Select::make('gender')
                    ->options(['L' => 'Laki-laki', 'P' => 'Perempuan'])
                    ->label('Jenis Kelamin')
                    ->required(),
                
                Textarea::make('alamat')->required()->label('Alamat'),
                
                TextInput::make('kontak')->required()->label('Kontak'),
                
                TextInput::make('email')->email()->required()->label('Email')->unique(),
                
                Select::make('status_pkl')
                    ->options([false => 'Belum diterima PKL', true => 'Sudah diterima PKL'])
                    ->default(false)
                    ->required()
                    ->label('Status PKL'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto Siswa')
                    ->height(40)
                    ->circular(),
                TextColumn::make('nama')->label('Nama')
                    ->searchable(),
                TextColumn::make('nis')->label('NIS')
                    ->searchable(),
                TextColumn::make('ketGender')
                    ->label('Jenis Kelamin'),
                TextColumn::make('alamat')->label('Alamat'),
                TextColumn::make('kontak')->label('Kontak'),
                TextColumn::make('email')->label('Email')
                    ->searchable(),
                IconColumn::make('status_pkl')
                    ->label('Status Lapor PKL')
                    ->alignCenter()
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
