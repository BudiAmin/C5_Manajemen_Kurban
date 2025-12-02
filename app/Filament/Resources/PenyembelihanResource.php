<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenyembelihanResource\Pages;
use App\Models\Penyembelihan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class PenyembelihanResource extends Resource
{
    protected static ?string $model = Penyembelihan::class;

    protected static ?string $navigationIcon = 'heroicon-o-scissors';
    protected static ?string $navigationGroup = 'Manajemen Kurban';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // Select::make('hewan_kurban.users.name') 
                //     ->label('Pemilik Hewan')
                //     ->default('-'),

                // Di Form Field
                Select::make('id_hewan')
                    ->label('Pemilik Hewan')
                    ->relationship('pemilik', 'name')
                    ->required(),


                Select::make('id_pelaksanaan')
                    ->label('Penanggung Jawab')
                    ->relationship('pelaksanaan', 'Ketuplak')
                    ->required(),

                // Select::make('id_distribusi')
                //     ->label('Distribusi Daging')
                //     ->relationship('distribusi', 'Penerima')
                //     ->required(),

                FileUpload::make('dokumentasi_penyembelihan')
                    ->label('Dokumentasi Penyembelihan')
                    ->disk('public')
                    ->directory('penyembelihan')
                    ->visibility('public')
                    ->image()
                    ->imageEditor()
                    ->required(),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('hewan.Jenis_Hewan')
                    ->label('Jenis Hewan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('hewan.user.name')
                    ->label('Pemilik Hewan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('pelaksanaan.Ketuplak')
                    ->label('Penanggung Jawab'),

                // TextColumn::make('distribusi.Penerima')
                //     ->label('Distribusi'),

                ImageColumn::make('dokumentasi_penyembelihan')
                    ->label('Foto')
                    ->disk('public')
                    ->square(),

                TextColumn::make('created_at')
                    ->label('Penyembelihan')
                    ->dateTime('d M Y'),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenyembelihans::route('/'),
            'create' => Pages\CreatePenyembelihan::route('/create'),
            'edit' => Pages\EditPenyembelihan::route('/{record}/edit'),
        ];
    }
}
