<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function form(Form $form): Form
        {
            return $form->schema([
                Select::make('questionnaire_id')
                    ->relationship('questionnaire', 'title')
                    ->required()
                    ->label('Questionnaire associé'),
    
                TextInput::make('question_text')
                    ->required()
                    ->label('Intitulé de la question'),
    
                Select::make('type')
                    ->options([
                        'boolean' => 'Vrai / Faux',
                        'multiple_choice' => 'Choix multiple',
                        'text' => 'Texte libre',
                    ])
                    ->required()
                    ->label('Type de question'),
    
                Repeater::make('options')
                    ->schema([
                        TextInput::make('option')->label('Option'),
                    ])
                    ->hidden(fn ($get) => $get('type') !== 'multiple_choice')
                    ->label('Options (choix multiple)'),
            ]);
        }
    
        public static function table(Table $table): Table
        {
            return $table->columns([
                TextColumn::make('question_text')->sortable()->searchable()->label('Question'),
                TextColumn::make('type')->sortable()->label('Type'),
                TextColumn::make('questionnaire.title')->label('Questionnaire'),
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
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
