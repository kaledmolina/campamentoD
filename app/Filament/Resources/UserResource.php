<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Campistas';

    protected static ?string $modelLabel = 'Campista';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre Completo'),
                TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Select::make('document_type')
                    ->options([
                        'CC' => 'Cédula de Ciudadanía',
                        'TI' => 'Tarjeta de Identidad',
                        'PA' => 'Pasaporte',
                        'Otro' => 'Otro',
                    ])
                    ->label('Tipo de Documento'),
                TextInput::make('document_number')
                    ->unique(ignoreRecord: true)
                    ->label('Número de Documento'),
                TextInput::make('phone')
                    ->tel()
                    ->label('Celular'),
                TextInput::make('zone')
                    ->label('Zona'),
                TextInput::make('congregacion')
                    ->label('Congregación'),
                TextInput::make('age')
                    ->numeric()
                    ->label('Edad'),
                Toggle::make('is_admin')
                    ->label('Es Administrador'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->label('Nombre'),
                TextColumn::make('document_number')->searchable()->label('Documento'),
                TextColumn::make('zone')->sortable()->label('Zona'),
                TextColumn::make('congregacion')->searchable()->label('Congregación'),
                TextColumn::make('total_paid')
                    ->label('Total Abonado')
                    ->money('COP'),
                TextColumn::make('balance')
                    ->label('Pendiente')
                    ->money('COP')
                    ->color(fn($state) => $state > 0 ? 'danger' : 'success'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
