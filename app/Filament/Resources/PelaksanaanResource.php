<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelaksanaanResource\Pages;
use App\Filament\Resources\PelaksanaanResource\RelationManagers;
use App\Models\Pelaksanaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PelaksanaanResource extends Resource
{
    protected static ?string $model = Pelaksanaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('Tanggal_Pendaftaran'),
                Forms\Components\DatePicker::make('Tanggal_Penutupan'),
                Forms\Components\TextInput::make('Ketuplak')
                    ->maxLength(255),
                Forms\Components\TextInput::make('Lokasi')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('Penyembelihan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Tanggal_Pendaftaran')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Tanggal_Penutupan')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Ketuplak')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Lokasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Penyembelihan')
                    ->date()
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
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPelaksanaans::route('/'),
            'create' => Pages\CreatePelaksanaan::route('/create'),
            'edit' => Pages\EditPelaksanaan::route('/{record}/edit'),
        ];
    }
}
