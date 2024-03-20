<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // añadimos datos predefinidos por nosotros en la base de datos en la tabla boards
        \App\Models\Board::create(['title' => 'board01']);

        // añadimos datos predefinidos por nosotros en la base de datos en la tabla trellolists
        \App\Models\Trellolist::create(['title' => 'trellolist01']);
        \App\Models\Trellolist::create(['title' => 'trellolist02']);

        // añadimos datos predefinidos por nosotros en la base de datos en la tabla Cards
        \App\Models\Card::create(['title' => 'Card01', 'content' => 'Content Card01', 'trellolist_id' => 1]);
        \App\Models\Card::create(['title' => 'Card02', 'content' => 'Content Card02', 'trellolist_id' => 1]);
        \App\Models\Card::create(['title' => 'Card03', 'content' => 'Content Card03', 'trellolist_id' => 1]);

        \App\Models\Card::create(['title' => 'Card04', 'content' => 'Content Card04', 'trellolist_id' => 2]);
        \App\Models\Card::create(['title' => 'Card05', 'content' => 'Content Card05', 'trellolist_id' => 2]);

        // añadimos datos predefinidos por nosotros en la base de datos en la tabla Label
        \App\Models\Label::create(['title' => 'label01']);
        \App\Models\Label::create(['title' => 'label02']);
        \App\Models\Label::create(['title' => 'label03']);

        // añadimos datos predefinidos por nosotros en la base de datos en la tabla card_labels
        \App\Models\card_label::create(['card_id' => 1, 'label_id' => 1]);
        \App\Models\card_label::create(['card_id' => 2, 'label_id' => 2]);
        \App\Models\card_label::create(['card_id' => 3, 'label_id' => 3]);

        \App\Models\card_label::create(['card_id' => 4, 'label_id' => 1]);
        \App\Models\card_label::create(['card_id' => 4, 'label_id' => 2]);
        \App\Models\card_label::create(['card_id' => 5, 'label_id' => 1]);
        \App\Models\card_label::create(['card_id' => 5, 'label_id' => 3]);
    }
}
