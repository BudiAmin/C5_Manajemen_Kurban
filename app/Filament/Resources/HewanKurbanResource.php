<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HewanKurbanResource\Pages;
use App\Filament\Resources\HewanKurbanResource\RelationManagers;
use App\Models\HewanKurban;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Storage;

class HewanKurbanResource extends Resource
{
    protected static ?string $model = HewanKurban::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Verifikasi Transaksi'; // nama yang muncul di sidebar
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ID_Detail')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('ID_User')
                    ->numeric(),
                Forms\Components\TextInput::make('Titip_bayar')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Total_Hewan')
                    ->numeric(),
                Forms\Components\TextInput::make('Total_Harga')
                    ->numeric(),
                Forms\Components\TextInput::make('Status')
                    ->required()
                    ->maxLength(255)
                    ->default('Pending'),
                Forms\Components\TextInput::make('Bukti_Bayar')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama User')
                    ->sortable(),
                Tables\Columns\TextColumn::make('detail.ketersediaan.Jenis_Hewan')
                    ->label('Jenis Hewan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('Total_Hewan')
                    ->label('Total Hewan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('Total_Harga')
                    ->label('Total Harga')
                    ->sortable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Status')
                    ->searchable(),
                ImageColumn::make('Bukti_Bayar')
                    ->label('Bukti Pembayaran')
                    ->disk('public')
                    ->getStateUsing(fn($record) => $record->Bukti_Bayar ? 'pembayaran/' . $record->Bukti_Bayar : null)
                    ->width(100)
                    ->height(100)
                    ->square(),

            ])
            ->actions([
                // Tombol Verifikasi
                Action::make('verifikasi')
                    ->label('Verifikasi')
                    ->color('success')
                    ->requiresConfirmation()
                    ->disabled(fn($record) => in_array($record->Status, ['Terverifikasi', 'Ditolak'])) // disable jika sudah dipilih
                    ->action(function ($record) {
                        $record->Status = 'Terverifikasi';
                        $record->save();
                    }),

                // Tombol Tolak
                Action::make('tolak')
                    ->label('Tolak')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->disabled(fn($record) => in_array($record->Status, ['Terverifikasi', 'Ditolak'])) // disable jika sudah dipilih
                    ->action(function ($record) {
                        $record->Status = 'Ditolak';
                        $record->save();
                    }),
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
            'index' => Pages\ListHewanKurbans::route('/'),
            'create' => Pages\CreateHewanKurban::route('/create'),
            'edit' => Pages\EditHewanKurban::route('/{record}/edit'),
        ];
    }
}
