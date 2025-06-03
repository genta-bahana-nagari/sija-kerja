<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PKLResource\Pages;
use App\Filament\Resources\PKLResource\RelationManagers;
use App\Models\PKL;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PKLResource extends Resource
{
    protected static ?string $model = PKL::class;

    protected static ?string $navigationLabel = 'Data PKL';
    
    protected static ?string $pluralLabel = 'Daftar Data PKL';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('siswa_id')
                    ->relationship('siswa', 'nama')
                    ->label('Nama Siswa')
                    ->required(),
                Select::make('industri_id')
                    ->relationship('industri', 'nama')
                    ->required(),
                Select::make('guru_id')
                    ->relationship('guru', 'nama')
                    ->label('Nama Guru Pembimbing')
                    ->required(),
                DatePicker::make('mulai')->required()->label('Tanggal Mulai'),
                DatePicker::make('selesai')->label('Tanggal Selesai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa.nama')->label('Nama')->searchable(),
                TextColumn::make('industri.nama')->label('Industri')->searchable(),
                TextColumn::make('guru.nama')->label('Guru Pembimbing')->searchable(),
                TextColumn::make('mulai')->label('Tanggal Mulai'),
                TextColumn::make('selesai')->label('Tanggal Selesai'),
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
            'index' => Pages\ListPKLS::route('/'),
            'create' => Pages\CreatePKL::route('/create'),
            'edit' => Pages\EditPKL::route('/{record}/edit'),
        ];
    }
}
