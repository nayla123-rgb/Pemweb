<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PenugasanResource\Pages;
use App\Filament\Admin\Resources\PenugasanResource\RelationManagers;
use App\Models\Penugasan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Supir;


class PenugasanResource extends Resource
{
    protected static ?string $model = Penugasan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('supir_id')
                    ->label('Supir')
                    ->options(Supir::all()->pluck('nama', 'id')) // sesuaikan kolom nama supir
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_penugasan')
                    ->label('Tanggal Penugasan')
                    ->required(),

                Forms\Components\TextInput::make('rute')
                    ->label('Rute')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('kendaraan')
                    ->label('Kendaraan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('durasi')
                    ->label('Durasi')
                    ->required()
                    ->maxLength(50),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'selesai' => 'Selesai',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),

                Tables\Columns\TextColumn::make('supir.nama')
                    ->label('Supir')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_penugasan')
                    ->label('Tanggal Penugasan')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rute')->label('Rute')->sortable()->searchable(),

                Tables\Columns\TextColumn::make('kendaraan')->label('Kendaraan')->sortable()->searchable(),

                Tables\Columns\TextColumn::make('durasi')->label('Durasi'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'selesai',
                    ])
                    ->sortable(),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListPenugasans::route('/'),
            'create' => Pages\CreatePenugasan::route('/create'),
            'edit' => Pages\EditPenugasan::route('/{record}/edit'),
        ];
    }
}