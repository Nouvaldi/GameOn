<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'title' => 'Dread Out 2',
            'category_id' => 1,
            'image' => 'dreadout2.jpg',
            'discount' => 60,
            'price' => 108000,
            'total' => 108000 - (108000 * (60/100)),
            'desc' => 'A third-person horror adventure that draws inspiration from Indonesian urban legend. Play as Linda, a high school student with the ability to sense and see ghosts. This spine-chilling sequel expands on the cult hit original, making DreadOut 2 another terrifying addition to the horror genre',
            'size' => 15.34,
            'spec_id' => 3,
            'developer' => 'Digital Happiness',
            'publisher' => 'Digital Happiness'
        ]);

	    DB::table('games')->insert([
            'title' => 'Dread Out',
            'category_id' => 1,
            'image' => 'Dreadout_header.jpg',
            'discount' => 0,
            'price' => 95000,
            'total' => 95000 - (95000 * (0/100)),
            'desc' => 'DreadOut is a third person supernatural horror game where you play as Linda, a high school student trapped in an old abandoned town. Equipped with her trusty smart-phone, she will battle against terrifying encounters and solve mysterious puzzles which will ultimately determine her fate.',
            'size' => 13.41,
            'spec_id' => 2,
            'developer' => 'Digital Happiness',
            'publisher' => 'Digital Happiness'
        ]);

	    DB::table('games')->insert([
            'title' => 'Pamali',
            'category_id' => 1,
            'image' => 'pamali.jpg',
            'discount' => 100,
            'price' => 50000,
            'total' => 50000 - (50000 * (100/100)),
            'desc' => 'A narrative horror game set in the daily lives of Indonesian society. Interact with various mystical objects as you explore haunted places, unravel their lingering mysteries, and experience how Indonesian myth, taboo and culture, combined with your choices, shape the course of your nights.',
            'size' => 17.79,
            'spec_id' => 2,
            'developer' => 'StoryTale Studios',
            'publisher' => 'StoryTale Studios'
        ]);

	    DB::table('games')->insert([
            'title' => 'Just Dessert',
            'category_id' => 3,
            'image' => 'Just-Deserts-Featured.jpg',
            'discount' => 0,
            'price' => 90000,
            'total' => 90000 - (90000 * (0/100)),
            'desc' => 'Just Deserts is a sci-fi action dating sim where you play as a soldier who must protect a city from mysterious alien attack, while at the same time you will also be seeking to capture the heart of your dream girl(s)! Theme song by Vesuvia [Ecky], vocal track by iMochi',
            'size' => 9.12,
            'spec_id' => 1,
            'developer' => 'Vifth Floor',
            'publisher' => 'Sekai Project'
        ]);

	    DB::table('games')->insert([
            'title' => 'Coffee Talk',
            'category_id' => 3,
            'image' => 'coffee-talk.jpg',
            'discount' => 40,
            'price' => 84000,
            'total' => 84000 - (84000 * (40/100)),
            'desc' => 'Coffee Talk is a coffee brewing and heart-to-heart talking simulator about listening to fantasy-inspired modern peoples’ problems, and helping them by serving up a warm drink or two',
            'size' => 8.11,
            'spec_id' => 1,
            'developer' => 'Toge Productions',
            'publisher' => 'Toge Productions'
        ]);

	    DB::table('games')->insert([
            'title' => 'Ghost Parade',
            'category_id' => 2,
            'image' => 'ghost-parade.jpg',
            'discount' => 0,
            'price' => 170000,
            'total' => 170000 - (170000 * (0/100)),
            'desc' => 'There’s something spooky in the woods... And it needs your help! Team up with 30 ghostly companions, each one lending a unique ability. Explore this spine-tingling scrolling action adventure and work together to get everyone safely home.',
            'size' => 14.54,
            'spec_id' => 2,
            'developer' => 'Lentera Nusantara',
            'publisher' => 'Aksys Games'
        ]);

	    DB::table('games')->insert([
            'title' => 'Motte Island',
            'category_id' => 2,
            'image' => 'Motte-Island-Header.jpg',
            'discount' => 10,
            'price' => 46000,
            'total' => 46000 - (46000 * (10/100)),
            'desc' => 'This is a 2D top-down horror game. If you enjoy adventures, top-down game with a hint of horror in it, Motte Island is for you. It has numerous features including but not limited to various puzzles and mini games contained within. It is as exciting as exploring an actual paradise island.',
            'size' => 16.74,
            'spec_id' => 1,
            'developer' => 'Gamebell Studio',
            'publisher' => 'One Aperture'
        ]);

	    DB::table('games')->insert([
            'title' => 'Celestian Tales: Old North',
            'category_id' => 4,
            'image' => 'Celestian-Tales-Old-North.jpg',
            'discount' => 30,
            'price' => 84000,
            'total' => 84000 - (84000 * (30/100)),
            'desc' => 'Celestian Tales: Old North is a refreshing take on the classic turn-based Japanese style RPG. Scrapping away the cliché of a destined person or a boy/girl-saving-the-world, the story is tailored for a mature audience and questions the bare morals of a human being.',
            'size' => 11.11,
            'spec_id' => 2,
            'developer' => 'Ekuator Games',
            'publisher' => 'Digital tribe'
        ]);
    }
}
