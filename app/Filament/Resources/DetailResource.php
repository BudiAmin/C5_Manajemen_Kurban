<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailResource\Pages;
use App\Filament\Resources\DetailResource\RelationManagers;
use App\Models\Detail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailResource extends Resource
{
    protected static ?string $model = Detail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Details Hewan Kurban';

    protected static ?string $modelLabel = 'Detail Hewan';

    protected static ?string $pluralModelLabel = 'Daftar Detail Hewan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_ketersediaan')
                    ->label('Jenis Hewan')
                    ->relationship('ketersediaan', 'Jenis_Hewan')
                    ->required(),

                Forms\Components\TextInput::make('Bobot')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('Harga')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('Jumlah')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('ketersediaan.Jenis_Hewan')
                    ->label('Jenis Hewan'),
                Tables\Columns\TextColumn::make('Bobot')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Harga')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Jumlah')
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
            'index' => Pages\ListDetails::route('/'),
            'create' => Pages\CreateDetail::route('/create'),
            'edit' => Pages\EditDetail::route('/{record}/edit'),
        ];
    }
}
