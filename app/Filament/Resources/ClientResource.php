<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';




    protected static ?string $navigationLabel = 'العملاء';
    protected static ?string $title = 'العملاء';
    protected static ?string $label = 'عميل';
    protected static ?string $pluralLabel = 'العملاء';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('client_name')
                    ->label('اسم العميل'),

                Forms\Components\TextInput::make('client_phone')
                    ->label('رقم الهاتف'),
                Forms\Components\TextInput::make('storeName_ar')
                    ->label(' اسم المتجر بالعربية'),
                Forms\Components\TextInput::make('storeName_en')
                    ->label(' اسم المتجر بالانجليزية'),
                Forms\Components\TextInput::make('store_category')
                    ->label('فئة المتجر'),
                Forms\Components\TextInput::make('store_rate')
                    ->label('تقييم المتجر'),
                Forms\Components\SpatieMediaLibraryFileUpload::make('store_image')
                    ->collection('store_images')
                    ->label('صورة المتجر'),


                Forms\Components\Select::make('status')
                    ->hint("هل العميل مهتم أم لا؟!")
                    ->label('الحالة')
                    ->options([
                        'لم يتم التواصل' => 'لم يتم التواصل',
                        'مهتم' => 'مهتم',
                        'غير مهتم' => 'غير مهتم',
                    ])
                    ->placeholder('حالة العميل')




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_name')
                    ->label(' اسم العميل')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('client_phone')
                    ->label('رقم الجوال')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('storeName_ar')
                    ->label('اسم المتجر بالعربي')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('store_category')
                    ->label("فئة المتجر")
                    ->sortable()
                    ->searchable()


            ])
            ->filters([
                //
            ])

        ;
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
