<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalPenyembelihResource\Pages;
use App\Filament\Resources\JadwalPenyembelihResource\RelationManagers;
use App\Models\JadwalPenyembelih;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalPenyembelihResource extends Resource
{
    protected static ?string $model = JadwalPenyembelih::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Foto_Dokumentasi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('Nama_Penyembelih')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('Waktu_Penyembelih'),
                Forms\Components\TextInput::make('Lokasi_Penyembelih')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ID_Operasional')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Foto_Dokumentasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Nama_Penyembelih')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Waktu_Penyembelih')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Lokasi_Penyembelih')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ID_Operasional')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListJadwalPenyembelihs::route('/'),
            'create' => Pages\CreateJadwalPenyembelih::route('/create'),
            'edit' => Pages\EditJadwalPenyembelih::route('/{record}/edit'),
        ];
    }
}
