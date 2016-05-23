<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuggestionsAndNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $suggestions = [
            [
                'title' => 'Entity',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/Entity-Nailed/dp/B00005YIUU%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00005YIUU'
                    ],
                    [
                        'type' => 'note',
                        'note' => 'I listened to this album and it is simply amazing'
                    ],
                    [
                        'type' => 'note',
                        'note' => 'If you can only get one song, then the first is definitely the best'
                    ]
                ]
            ],
            [
                'title' => '50 Assorted Disposable Shot cups',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/50-assorted-Colors-Disposable-Plastic-Bomber/dp/B00D5X8UAQ%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00D5X8UAQ'
                    ],
                    [
                        'type' => 'note',
                        'note' => 'This might be nice for a party'
                    ]
                ]
            ],
            [
                'title' => 'Black Nylon 3-Strand Twist Rope',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/Black-Nylon-3-Strand-Twist-Domestic/dp/B01D9649QW%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB01D9649QW'
                    ],
                    [
                        'type' => 'note',
                        'note' => 'This is what I think of when I think of manly gifts'
                    ]
                ]
            ],
            [
                'title' => 'Dog quote Plaque',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/Wooden-Plaque-Dog-Doesnt-Probably/dp/B00AJKVZYQ%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00AJKVZYQ'
                    ],
                    [
                        'type' => 'note',
                        'note' => 'I thought this would be nice in someones kitchen'
                    ]
                ]
            ],
            [
                'title' => 'Butterfly Sticker Decal ',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/Angela-Butterfly-Sticker-Laptop-Window/dp/B00NROLZV4%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00NROLZV4'
                    ]
                ]
            ],
            [
                'title' => 'The Sims 2: Bon Voyage',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/The-Sims-Voyage-CD-Rom-Expansion-Pack/dp/B000PS1HNQ%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB000PS1HNQ'
                    ],
                    [
                        'type' => 'note',
                        'note' => 'I can play this for hours'
                    ]
                ]
            ],
            [
                'title' => 'King Of The Tenors',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'https://www.amazon.com/gp/product/B000V67452?ie=UTF8&SubscriptionId=AKIAJRIN3UCFCQCAUXAA&camp=2025&creative=165953&creativeASIN=B000V67452&linkCode=sp1&tag=randamazprod-20'
                    ],
                    [
                        'type' => 'note',
                        'note' => 'I listen to this every sunday and it soothes my troubles away'
                    ]
                ]
            ],
            [
                'title' => 'Magnetic Grinder',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/Marilyn-Publicity-Titanium-Magnetic-Grinder/dp/B015BOBMS8%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB015BOBMS8'
                    ]
                ]
            ],
            [
                'title' => 'Simple Crocheting',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/Simple-Crocheting-Complete-How-Crochet/dp/1250016215%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3D1250016215'
                    ],
                    [
                        'type' => 'note',
                        'note' => 'This is a fantastic guide!'
                    ]
                ]
            ],
            [
                'title' => 'First Verse',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'https://www.amazon.com/First-Verse-Second-Book-ebook/dp/B011DL90QY?ie=UTF8&SubscriptionId=AKIAJRIN3UCFCQCAUXAA&camp=2025&creative=165953&creativeASIN=B011DL90QY&linkCode=sp1&tag=randamazprod-20'
                    ]
                ]
            ],
            [
                'title' => 'Gaming Mousepad',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/MSD-Natural-Rubber-Gaming-Mousepad/dp/B01DLHJXH4%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB01DLHJXH4'
                    ]
                ]
            ],
            [
                'title' => 'Ambom Short-Sleeve T Shirt For Toddler',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/Ambom-Atlanta-Short-Sleeve-Toddlers-Toddler/dp/B016UJ57FW%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB016UJ57FW'
                    ]
                ]
            ],
            [
                'title' => 'Gloves in a bottle',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/Gloves-Bottle-Shielding-Lotion-2oz/dp/B000UBM1BA%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB000UBM1BA'
                    ],
                    [
                        'type' => 'note',
                        'note' => 'This keeps my sanity in check. Perfect for anyone with dry skin'
                    ]
                ]
            ],
            [
                'title' => 'Chessmaster 10th Edition - PC',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/Chessmaster-10th-Edition-PC/dp/B00023XXMM%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00023XXMM'
                    ],
                    [
                        'type' => 'note',
                        'note' => 'It is a constructive video game...'
                    ]
                ]
            ],
            [
                'title' => 'Air Filters',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/20x20X1-MERV-Air-Filter-Pack/dp/B013Q218PO%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB013Q218PO'
                    ]
                ]
            ],
            [
                'title' => 'Guayaki Yerba mate organic energy shot',
                'notes' => [
                    [
                        'type' => 'url',
                        'note' => 'http://www.amazon.com/Guayaki-Yerba-organic-energy-Tangerine/dp/B0191XC9DW%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB0191XC9DW'
                    ]
                ]
            ]
        ];

        $groupRows = DB::select('SELECT group_id FROM groups;');
        foreach($groupRows as $groupRow){
            $groupID = $groupRow->group_id;
            $userRows = DB::select('SELECT user_id FROM assoc_users_groups WHERE group_id = ?;', [$groupID]);
            $userIDs = [];
            foreach($userRows as $userRow){
                $userIDs[] = $userRow->user_id;
            }
            foreach($userIDs as $userID){
                do{
                    $targetID = $userIDs[array_rand($userIDs)];
                }while($targetID === $userID);
                if (rand(0,5) === 1){
                    $suggestion = $suggestions[array_rand($suggestions)];
                    DB::insert('
                      INSERT INTO suggestions (for_id, by_id, title) VALUES (?, ?, ?)
                    ;', [$targetID, $userID, $suggestion['title']]);
                    foreach($suggestion['notes'] as $note){
                        DB::insert('
                          INSERT INTO notes (suggestion_id, note_type, note)
                          VALUES ((SELECT MAX(suggestion_id) FROM suggestions), ?, ?)
                    ;', [$note['type'], $note['note']]);
                    }
                }

            }




        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
