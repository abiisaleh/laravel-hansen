<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratKeteranganResource\Pages;
use App\Filament\Resources\SuratKeteranganResource\RelationManagers;
use App\Models\SuratKeterangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratKeteranganResource extends Resource
{
    protected static ?string $model = SuratKeterangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $pluralLabel = 'Surat Keterangan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_diterima')
                    ->required(),
                Forms\Components\TextInput::make('asal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('perihal')
                    ->required()
                    ->maxLength(100),
                Forms\Components\FileUpload::make('file')
                    ->required()
                    ->downloadable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('asal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('perihal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_diterima')
                    ->date()
                    ->sortable(),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListSuratKeterangans::route('/'),
            'create' => Pages\CreateSuratKeterangan::route('/create'),
            'edit' => Pages\EditSuratKeterangan::route('/{record}/edit'),
        ];
    }
}
