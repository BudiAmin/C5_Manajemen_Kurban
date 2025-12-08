<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\HewanKurban;
use App\Models\Penyembelihan;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\PenyembelihanResource\Pages;

class PenyembelihanResource extends Resource
{
    protected static ?string $model = Penyembelihan::class;

    protected static ?string $navigationIcon = 'heroicon-o-scissors';
    protected static ?string $navigationGroup = 'Manajemen Kurban';

    protected static ?string $navigationLabel = 'Penyembelihan Kurban';

  
    protected static ?string $modelLabel = 'Penyembelihan';

    
    protected static ?string $pluralModelLabel = 'Daftar Penyembelihan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // Select::make('hewan_kurban.users.name') 
                //     ->label('Pemilik Hewan')
                //     ->default('-'),

                Select::make('id_hewan')
                    ->label('Hewan (Nama Pemilik)')
                    ->options(function () {
                        return HewanKurban::with('user') 
                            ->get()
                            ->pluck('user.name', 'ID_Hewan');
                    })
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

                TextColumn::make('hewan.detail.ketersediaan.Jenis_Hewan')
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
