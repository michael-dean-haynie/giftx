<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWishesAndNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Add default wishes/notes */

        // Peter Parker
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (2, 3, 'The Amazing Spider-man (2012)');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/gp/product/B009B0JR2C/ref=pd_cbs__2'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Prefer it to be high def'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Prefer hard copy, but digital would be fine')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (2, 1, 'I need a super suit repair professional');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Needs to be available 24/7'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'If they can make small changes too, that''d be great')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (2, 2, 'Happy Pet Acrylic Reptile Terrarium Habitat');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Happy-Pet-Terrarium-scorpions-transparent/dp/B016XICZPU/ref=sr_1_cc_1?s=aps&ie=UTF8&qid=1462588821&sr=1-1-catcorr&keywords=spider+habitat'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'thisisanote'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'thisisanote')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (2, 3, 'Paul Freeman Introduces Marilyn Mason 11');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Paul-Freeman-Introduces-Marilyn-Mason/dp/B0006SSOTU%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB0006SSOTU')
            ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (2, 3, 'USB Flash Drive');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Generic-Doctor-Cartoon-Memory-Pendrive/dp/B00K50UKFK%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00K50UKFK'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I just never seem to have enough thumb drives'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'You could get me 10 of these and I would be very happy')
        ;");
        }
        // Scott Lang
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (3, 3, 'Ant-Man [Blu-ray]');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Ant-Man-Blu-ray-Paul-Rudd/dp/B00ZGDK2EU/ref=sr_1_1?ie=UTF8&qid=1462590504&sr=8-1&keywords=antman'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'MUST BE BLU-RAY')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (3, 3, 'I need a favor');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'may-or-may-not include breaking my friend out of jail'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'pizza will be provided'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'time sensitive (let me know ASAP)')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (3, 3, 'Bent');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'https://www.amazon.com/gp/product/B00CXVZ48W?ie=UTF8&SubscriptionId=AKIAJRIN3UCFCQCAUXAA&camp=2025&creative=165953&creativeASIN=B00CXVZ48W&linkCode=sp1&tag=randamazprod-20'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'message me for my account if you want to gift through amazon')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (3, 3, 'iPhone 6S PLUS Case');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/iPhone-Translucent-Transparent-Unique-Pattern/dp/B01972LGJA%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB01972LGJA'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Two or three would be great'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Also, some scratch resistant covers would go a long way')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (3, 3, '3 Bezel Insert for Omega Seamaster Planet Ocean 45 Oran');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Bezel-Insert-Omega-Seamaster-Planet/dp/B009Z2TURI%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB009Z2TURI'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'No idea what these are for but they look fun!'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'If you can find them in black that would be nice (not important)')
        ;");
        }
        // Wade Wilson
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (4, 2, 'Deadpool (2016)');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Deadpool-Ryan-Reynolds/dp/B01BHDEHKM/ref=sr_1_1?ie=UTF8&qid=1462591533&sr=8-1&keywords=deadpool+movie'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Yeah! Narcissism for the win!'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'My old lady keeled over so I have no one to make fun of')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (4, 3, 'Batteries');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I need every kind there is'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I need a lot of them (A LOT)')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (4, 1, 'I broke one of my swords, looking to upgrade');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'If you are knowledgeable in this area, message me please for specs'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Or if you can find the exact model of my old ones that would work too')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (4, 3, 'Trodat T5444 U. S. Stamp & Sign trodat Professional 5-in-1 Date Stamp, 1 1/8 x 2');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Trodat-T5444-Stamp-trodat-Professional/dp/B001HA5NYU%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB001HA5NYU')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (4, 3, 'Jewelry Box');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Mele-Maria-Fabric-Jewelry-Sections/dp/B00NX9BV62%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00NX9BV62'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Something like the link and image, but not specifically that'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Leather black would be better')
        ;");
        }
        // Loki Laufeyson
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (5, 3, 'thisisatitle');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Marvels-Avengers-Robert-Downey-Jr/dp/B009GEBBNQ/ref=sr_1_1?s=movies-tv&ie=UTF8&qid=1462592651&sr=1-1&keywords=avengers'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I indulge')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (5, 1, 'Do Not read this if you are Thor');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I mean to bring down my child hood brother and his pathetic fan-girls'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Join me in my quest and you will share my power!'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Lunch will be provided')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (5, 3, 'Non-woven Wallpaper');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I mean to redecorate my dwellings and lack a certain taste'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Message me if you have any ideas')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (5, 3, 'Blisstime® 6 String Acoustic Guitar Bone Bridge Saddle and Nut and 6pcs Guitar Bone Bridge Pins Made of Real Bone');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Blisstime%C2%AE-String-Acoustic-Guitar-Bridge/dp/B018SA2CPE%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB018SA2CPE')
            ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (5, 3, 'Floral Design Indian Bedspread Tapestry');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Popular-Handicrafts-Tapestries-Intricate-215cmsx230cms/dp/B010Q2EEH6%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB010Q2EEH6')
            ;");
        }
        // Jean Grey
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (6, 2, 'X-Men: The Last Stand (2006)');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/gp/product/B000JCK3ZG/ref=pd_cbs__1'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I do not even think I am in this movie, but logan is')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (6, 3, 'Shaker Cup for Protein Shakes');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Trimr-Squared-Biggest-Shaker-Protein/dp/B015JTCP8Q%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB015JTCP8Q'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Who said a lady cant get bigger?')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (6, 3, 'Multiple Stud Earrings Set');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Lux-Accessories-Dinosaur-Brontosaurus-Stegosaurus/dp/B018FBLDQU%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB018FBLDQU'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Any earing will do but I like these'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'They are for my kid so not too expensive ok?')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (6, 1, 'What to Expect When You"."''"."re Expecting (2012)');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/What-Expect-When-Youre-Expecting/dp/B0098VXN2Y%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB0098VXN2Y'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'This would just be nice to have, you know?'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'And the book too. That would be nice')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (6, 3, 'Tablet for my nephew');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES

            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Nothing very expensive'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Could be used or refurbished. It does not matter')
        ;");
        }
        // Ororo Munroe
        if(1) {
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (7, 3, 'Special MOKA Effect function 4 Head Confetti Launcher DMX Confetti Shooter Machine');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Special-MOKA-function-Confetti-Launcher/dp/B017XOH3PK%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB017XOH3PK'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Do not ask. I just need a confetti machine'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'thisisanote')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (7, 3, 'Drunken State University IPhone 6/6s/6 Plus/6s Plus Case');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Drunken-State-University-IPhone-Plus/dp/B01F53XN7S%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB01F53XN7S')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (7, 3, 'Viva Concertante!');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Concertante-Gompper-Dangerfield-Ching-Chu-Donatoni/dp/B00000DH66%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00000DH66'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'You should get yourself one too. They are really good')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (7, 3, 'A subscription to Jet Magizine');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I want this magazine on my doorstep every monday till I die')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (7, 3, 'I need a new microphone for my recording studio');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Shure-SM48-LC-Dynamic-Microphone-Cardioid/dp/B0002D0HY4%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB0002D0HY4'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'It does not have to be exactly that link but somewhere around that.'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'If it is not too much, I could use 3 of them.')
        ;");
        }
        // Scott Summers
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (8, 1, 'PS4 Console and Controller');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Freakz-Console-Controller-Underwater-playstation-4/dp/B00O7X4WVO%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00O7X4WVO'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Do not tell Jean'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Just tell me you got it at the party and then give it to me later')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (8, 3, 'Code: The Hidden Language of Computer Hardware and Software');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Code-Language-Computer-Hardware-Software/dp/0735611319%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3D0735611319'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Paper back is ok but I would prefer hard')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (8, 3, 'Jeans');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I need some new Jeans'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Size will not matter, I just need the material')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (8, 2, 'Fancy watch');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/White-Brown-Finsbury-Vivienne-Westwood/dp/B00MA0WZWE%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00MA0WZWE'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I want to be able to wear it most days but look nice'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Leather wrist (like in link but not exactly)')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (8, 3, 'Personal mug');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I want it to have my face on it'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Below it should read WORLDS BEST CYCLOPS')
        ;");
        }
        // James Howlett
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (9, 3, 'All of the Queen Albums');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I would like them all on CD')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (9, 1, 'Baby Clothes');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', '6-month to 9-month would be best'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Cute is great but durable is most important')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (9, 3, 'Shoe laces');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/OrthoStep-Waxed-Dress-Classic-Shoelaces/dp/B00TUD9S5Q%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00TUD9S5Q'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Just like the ones in the link but black')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (9, 2, 'Hand-held flashlight');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'It needs to be pretty bright'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Must take AA bateries. I have a bajilion I need to get through')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (9, 2, 'NHL 11 - Xbox 360');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/NHL-11-Xbox-360/dp/B003HF4QIM%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB003HF4QIM'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Either for x-box 360 or playstation 4')
        ;");
        }
        // Max Eisenhardt
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (10, 3, 'Rebound (DVD)');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Rebound-Kareem-Abdul-Jabbar/dp/B00021R7E4%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00021R7E4'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Not quite sure what it is about, but it looks awesome')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (10, 3, 'Running With Giants');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'https://www.amazon.com/gp/product/B01BJ7I9V4?ie=UTF8&SubscriptionId=AKIAJRIN3UCFCQCAUXAA&camp=2025&creative=165953&creativeASIN=B01BJ7I9V4&linkCode=sp1&tag=randamazprod-20'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Not just this one song, the whole album'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'CD or digital does not matter')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (10, 3, 'AdmireD: Interactive Reading and Writing (The Series of D Book 1)');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'https://www.amazon.com/AdmireD-Interactive-Reading-Writing-Book-ebook/dp/B00L2M7RVU?ie=UTF8&SubscriptionId=AKIAJRIN3UCFCQCAUXAA&camp=2025&creative=165953&creativeASIN=B00L2M7RVU&linkCode=sp1&tag=randamazprod-20'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'MUST BE FOR KINDLE'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'If it cant be kindle then iBooks might work')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (10, 3, 'Bluetooth Wireless headphones');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I would like to be able to use them with my iPad'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Comfort is more important than look')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (10, 3, 'House phone');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Preferably multiple satelites with bases'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'And if you could help me set it up that would be great!')
        ;");
        }
        // Tony Stark
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (11, 1, 'Walk Alongside (Kyushu Olle) (Instrumental)');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'https://www.amazon.com/gp/product/B00IJWS82S?ie=UTF8&SubscriptionId=AKIAJRIN3UCFCQCAUXAA&camp=2025&creative=165953&creativeASIN=B00IJWS82S&linkCode=sp1&tag=randamazprod-20'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'CDs are lame. Get it to me on a thumb drive')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (11, 1, 'Bathroom towel set');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Matching towels and curtains'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Preferably hot rod red')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (11, 1, 'Electric fan');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Nothing special or specific, just to keep me cool at night')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (11, 3, 'The Billion Dollar Spy');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/The-Billion-Dollar-Spy-Espionage/dp/0345805976%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3D0345805976'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I would like it in paper back or audiobook'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'If you can get a matching bookmark, do it')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (11, 3, 'An app of myself');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Make an app'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Name it after me'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Have it know everything about me (future, best moments etc...)'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Give this app to me')
        ;");
        }
        // Steve Rogers
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (12, 3, 'Dummy shield');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'It can be made of anything'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'It just needs to look and feel like my real one')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (12, 3, 'World Peace');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Why cant weeee be friends, why cant weeeee be friends....')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (12, 3, 'Galaxy Note 5 Case');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/UZZO-Flowing-Quicksand-Glitter-Transparent/dp/B01E15S8XA%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB01E15S8XA'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Not nessesarily the one in the link, but something like it'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Glitter is a MUST')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (12, 3, 'Propane Vapor Torch Kit');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Red-Dragon-VT-2-23-000-BTU/dp/B00004Z2FP%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00004Z2FP'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'This just looks fun'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I need it to be a welder too. If thats a thing?')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (12, 3, 'Disease Chart: COMPLICATIONS OF DIABETES');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/11-Post-It-Disease-Chart-COMPLICATIONS/dp/B003Y24Q7E%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB003Y24Q7E'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I would like to give this to my poor friend, born with diabetes'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'It will make him cry, and then we will laugh about it. Or at least I will. (Its my gift right?)')
        ;");
        }
        // Bruce Banner
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (13, 3, 'I am in constant need of purple stretchy pants');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Not quite sure where they come from but whenever I turn back, I am wearing them'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I am afraid one day my luck will run out and I would like to be prepared')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (13, 2, 'Kellogs Cereal Cinabuns');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Not a crazy amount, I just like a little'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Cinnamin toast crunch will hit the spot too')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (13, 2, 'Phone Case with bible verses on it');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/betrayed-children-MSD-Aluminium-Customized/dp/B00UF64QF4%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00UF64QF4'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'The color can be whatever'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I have an iPhone 6+')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (13, 2, 'Vegas');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'If someone would be drive me to vegas and back, I would be ok with getting nothing else'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'VIVA LAS VEGAS')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (13, 2, 'Steampunk Victorian Goggles');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Steampunk-Victorian-Goggles-welding-Glasses/dp/B00JRDDTKY%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00JRDDTKY'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I need 3 pairs of these for a cos-play'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'If you cant do 3, 1 is just fine')
        ;");
        }
        // Thor Odinson
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (14, 1, 'Fan girls');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I dont actually need fan-girls, I just know it will infuriate Loki'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Yes, I read his wish list')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (14, 2, 'Paul McCartney iPhone 5/5S Case');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Beatles-Back-Paul-McCartney-iPhone/dp/B00HFDRC2Y%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00HFDRC2Y'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Doesnt have to be Paul, anything Beatles will work')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (14, 3, 'Earths Best Organic Soup');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Earths-Best-Organic-Noodlemania-Ounce/dp/B001BM4NWM%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB001BM4NWM'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Its a mighty bold claim. Best soup in the earthen realm. I should like to try it'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Also, this elmo man, I should like an introduction')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (14, 2, '100 Ideas That Changed The World');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Historys-Greatest-Breakthroughs-Inventions-Theories/dp/B00E4ZV50Q%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00E4ZV50Q'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'If this book has any sequels I should like them as well')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (14, 1, 'Poptarts');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I have grown a liking toward these poptart foods'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I should like as many as your strongest man can carry')
        ;");
        }
        // Natasha Romanova
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (15, 3, 'Ive got red on my ledger');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Id like to clear it out')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (15, 2, 'Worm Factory 360');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Worm-Factory-WF360B-Composter-Black/dp/B002LH47PY%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB002LH47PY')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (15, 1, 'Pregnancy Starter Kit');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Mama-Mio-Your-Pregnancy-Starter/dp/B00HNU0W30%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00HNU0W30'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'No, it is not for me'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I will need 20 lbs of it')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (15, 2, 'Un-scented lotion');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'MUST ACTUALLY BE UNSCENTED'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'please test it before you wrap it')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (15, 3, 'Many Lives, Many Masters');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Many-Lives-Masters-Prominent-Psychiatrist/dp/0671657860%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3D0671657860'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Audio book is best, then paperback, then hardback')
        ;");
        }
        // Bruce Wayne
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (16, 3, 'My Parents');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', '...')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (16, 3, 'Bar Maid Glass Pro');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Bar-Maid-JUC-200-Output-Commercial/dp/B00PKS8R5C%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00PKS8R5C'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Like the one in the link, but I want to be able to activate it with my iPad'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', '2 of them would be great')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (16, 1, 'Curious George Goes to the Hospital');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Curious-George-Goes-Hospital-Rey/dp/0395070627%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3D0395070627'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'This is for the orphanage, it was my favorite book'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', '200 copies please and thank you')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (16, 2, 'Some female jewelry');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I like sending gifts but never have anything laying around'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'All different types')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (16, 2, 'Minivan Decals');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Anything that will make it look like I travel')
        ;");
        }
        // Clark Kent
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (17, 1, 'Keep calm and shirts');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I collect the keep calm shirts so I need every different one')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (17, 1, 'Dried Mango Furit from Thailand');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Best-Preserved-Salted-Sealed-Thailand/dp/B00U7LPYQC%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00U7LPYQC'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'This crap is amazing!'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', '20 pounds should do it')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (17, 1, 'Wooden Directors Film Movie Slateboard Clapper Board');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Neewer%C2%AE-Wooden-Directors-Slateboard-Clapper/dp/B00LEFQZ8Q%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00LEFQZ8Q'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I only want it if it makes a goo clapping sound'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Must actually pivot at the top ')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (17, 1, 'Pocket Knife');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'NOT MADE OF KRYPTONITE'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Needs to be really thin. This enough to fit in my suite inconspicuously')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (17, 1, 'Starwars lego sets');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I like the kind that have instructions to follow'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I already have the deathstar and millennium falcon')
        ;");
        }
        // Barry Allen
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (18, 1, 'Bruno Mars Wrist Watch');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/G-Store-Bruno-Marry-Uptown-lighters/dp/B01C856JYA%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB01C856JYA')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (18, 3, 'Sheezus [Explicit]');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'https://www.amazon.com/gp/product/B00IX13AAK?ie=UTF8&SubscriptionId=AKIAJRIN3UCFCQCAUXAA&camp=2025&creative=165953&creativeASIN=B00IX13AAK&linkCode=sp1&tag=randamazprod-20'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I want this on vinyl. Is that still possible?'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Whole album, not single')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (18, 1, 'Dont Rush Me Im Retired - Automotive Chrome License Plate Frame');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Dont-Rush-Retired-Automotive-Hilarious/dp/B00V7BQGRW%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00V7BQGRW'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I want one for every car, and I have 17')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (18, 3, 'Night Light for my kid');");

            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (18, 1, 'Adventure Is Out There Balloon Pattern TPU Case');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Adventure-There-Balloon-Pattern-iPhone/dp/B01DDB7MNK%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB01DDB7MNK'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Is it possible to get this for my iPad?'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I need scuff guards too')
        ;");
        }
        // Hal Jordan
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (19, 3, 'Piano');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Electric, not accustic'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I will need a bench and pedals')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (19, 3, 'Dishwasher');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'My old one was 3x3x4 feet and fit snugly under my sink'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Color can be anything but blue or pink')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (19, 3, 'Auto vacume machine');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'One of those vacumes that go around the house automatically vacuming'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Needs to handle tile well')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (19, 3, 'Stained Glass Leather Watch');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/0STG522-wizards-waverly-Stained-Leather/dp/B01EJLN1FQ%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB01EJLN1FQ')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (19, 3, '3-in-1 Personal Finance');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Personal-Finance-3-0-Mac-Download/dp/B01A6AVF8Y%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB01A6AVF8Y'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Mac or PC is fine whichever')
        ;");
        }
        // Oliver Queen
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (20, 2, 'Intimate Affairs (2001)');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Intimate-Affairs-Dermot-Mulroney/dp/B00170I7S4%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00170I7S4'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Not blueray')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (20, 2, 'NightFire Wailing Siren Hobby Kit ');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/NightFire-Wailing-Siren-Hobby-1751/dp/B00BKNVUT6%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00BKNVUT6'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'If it comes with instructions please make sure they arrive together'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Please be careful with handling. I should like to destroy it myself')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (20, 2, 'Nail Polish');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Not red, black, or purple. I have a ton of those'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Nothing glossy, just normal colors')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (20, 2, 'Neon Open sign');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Small enough to hang above my stove and under my pans'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Preferably an exotic color, like purple or pink (NOT GREEN)')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (20, 2, 'Craft supplies');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I need scissors and tape desperately'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I have enough glitter glue to last the armageddon')
        ;");
        }
        // Jack Napier
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (21, 1, 'Some men just want to watch the world burn...');");
        }
        // Tim Drake
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (22, 3, 'Yoda sign');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Star-Wars-Novelty-Decorative-Two-sided/dp/B0167K1SPM%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB0167K1SPM'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Id like this screwed to a pick to put in my front yard')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (22, 3, 'New rims for my ride');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'message me for specs on my sweet ride')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (22, 3, 'Rob (2012)');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Schneider-Cheech-Marin-Eugenio-Derbez/dp/B009VP69BE%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB009VP69BE')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (22, 3, 'Mini Refrigerator');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Small enough to fit under my desk at work'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Big enough to fit my lunch and a few drinks')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (22, 3, 'iPad');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I would like the latest one but that is not nessesary'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Black case would be nice')
        ;");
        }
        // Lex Luthor
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (23, 3, 'iWatch');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Needs to play music'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Needs to hold phone numbers')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (23, 3, 'Google Glass');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I wanna try this augmented reality stuff')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (23, 2, 'Hello Kitty phone case');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/iPhone-Handbag-Silcone-Tribe-Tiger-Silicone/dp/B017LOXJ8M%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB017LOXJ8M')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (23, 2, 'Billy Jealousy Beard Wash');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Billy-Jealousy-BJ-0666-Beard-Wash/dp/B00IO6WGRM%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00IO6WGRM'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I have decided to use this for the rest of my life, so no ammount is too much')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (23, 1, 'Lip Conditioner');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/MAC-Viva-Glam-Ricky-Conditioner/dp/B007AY2MHI%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB007AY2MHI'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I have decided to use this for the rest of my life, so no ammount is too much')
        ;");
        }
        // Selina Kyle
        if(1){
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (24, 1, 'Iron Bottom Cleaner Stick');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Cadie-CAD-814-Bottom-Cleaner-Stick/dp/B00CZGCJW4%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00CZGCJW4')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (24, 2, 'Personal Shaving Kit');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Personal-Shaving-Trimmer-Sideburn-Mustache/dp/B0176I8VQI%3FSubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB0176I8VQI'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'The extensions would be nice, but dont go crazy!'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Tweezers would go a long way')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (24, 2, 'Checkered Beagle Wall Tapestry');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'http://www.amazon.com/Society6-Checkered-Beagle-Tapestry-Medium/dp/B018L12OJO%3Fpsc%3D1%26SubscriptionId%3DAKIAJRIN3UCFCQCAUXAA%26tag%3Drandamazprod-20%26linkCode%3Dsp1%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB018L12OJO'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'This exact piece. No look alike. This one'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'I will buy half if it is too pricy. Message me.')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (24, 2, 'Power');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'url', 'https://www.amazon.com/gp/product/B01DFNTLQW?ie=UTF8&SubscriptionId=AKIAJRIN3UCFCQCAUXAA&camp=2025&creative=165953&creativeASIN=B01DFNTLQW&linkCode=sp1&tag=randamazprod-20')
        ;");
            DB::insert("INSERT INTO wishes (user_id, priority, title) VALUES (24, 2, 'Big Lunch box');");
            DB::insert("
          INSERT INTO notes (wish_id, note_type, note) VALUES
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Pink would be awesome'),
            ((SELECT MAX(wish_id) FROM wishes), 'note', 'Big enough it barely fist in the fridge')
        ;");
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
