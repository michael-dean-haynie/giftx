<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersAddGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Add default users */
        DB::insert("
            INSERT INTO users (first_name, last_name, email, password, prof_pic_filename) VALUES
            ('Hello', 'World', 'hello@world.com', '" . bcrypt("helloworld") . "', 'null'),
            /* Marvel */
            ('Peter', 'Parker', 'peterparker@comic.com', '" . bcrypt("peterparker") . "', 'user2.png'),
            ('Scott', 'Lang', 'scottlang@comic.com', '" . bcrypt("scottlang") . "', 'user3.png'),
            ('Wade', 'Wilson', 'wadewilson@comic.com', '" . bcrypt("wadewilson") . "', 'user4.png'),
            ('Loki', 'Laufeyson', 'lokilaufeyson@comic.com', '" . bcrypt("lokilaufeyson") . "', 'user5.png'),
            /*        Mutants */
            ('Jean', 'Grey', 'jeangrey@comic.com', '" . bcrypt("jeangrey") . "', 'user6.png'),
            ('Ororo', 'Munroe', 'ororomunroe@comic.com', '" . bcrypt("ororomunroe") . "', 'user7.png'),
            ('Scott', 'Summers', 'scottsummers@comic.com', '" . bcrypt("scottsummers") . "', 'user8.png'),
            ('James', 'Howlett', 'jameshowlett@comic.com', '" . bcrypt("jameshowlett") . "', 'user9.png'),
            ('Max', 'Eisenhardt', 'maxeisenhardt@comic.com', '" . bcrypt("maxeisenhardt") . "', 'user10.png'),
            /*        Avengers */
            ('Tony', 'Stark', 'tonystark@comic.com', '" . bcrypt("tonystark") . "', 'user11.png'),
            ('Steve', 'Rogers', 'steverogers@comic.com', '" . bcrypt("steverogers") . "', 'user12.png'),
            ('Bruce', 'Banner', 'brucebanner@comic.com', '" . bcrypt("brucebanner") . "', 'user13.png'),
            ('Thor', 'Odinson', 'thorodinson@comic.com', '" . bcrypt("thorodinson") . "', 'user14.png'),
            ('Natasha', 'Romanova', 'natasharomanova@comic.com', '" . bcrypt("natasharomanova") . "', 'user15.png'),
            /* DC */
            ('Bruce', 'Wayne', 'brucewayne@comic.com', '" . bcrypt("brucewayne") . "', 'user16.png'),
            ('Clark', 'Kent', 'clarkkent@comic.com', '" . bcrypt("clarkkent") . "', 'user17.png'),
            ('Barry', 'Allen', 'barryallen@comic.com', '" . bcrypt("barryallen") . "', 'user18.png'),
            ('Hal', 'Jordan', 'haljordan@comic.com', '" . bcrypt("haljordan") . "', 'user19.png'),
            ('Oliver', 'Queen', 'oliverqueen@comic.com', '" . bcrypt("oliverqueen") . "', 'user20.png'),
            ('Jack', 'Napier', 'jacknapier@comic.com', '" . bcrypt("jacknapier") . "', 'user21.png'),
            ('Tim', 'Drake', 'timdrake@comic.com', '" . bcrypt("timdrake") . "', 'user22.png'),
            ('Lex', 'Luthor', 'lexluthor@comic.com', '" . bcrypt("lexluthor") . "', 'user23.png'),
            ('Selina', 'Kyle', 'selinakyle@comic.com', '" . bcrypt("selinakyle") . "', 'user24.png')
        ;");

        /* Add default groups */
        DB::insert("
            INSERT INTO groups (name, event_date, group_key, group_leader_id) VALUES
            ('Comic Characters', '2016-12-20', 'thisisthekey', 1),
            ('Marvel Gift Exchange', '2016-12-22', 'thisisthekey', 1),
            ('Avengers Secret Santa', '2016-12-15', 'thisisthekey', 1),
            ('X-mas-men ', '2016-12-15', 'thisisthekey', 1),
            ('DC United ', '2016-12-22', 'thisisthekey', 1),
            ('Bad-guys-have-feelings-too', '2016-12-25', 'thisisthekey', 1)

        ;");

        /* Add users to groups */
        DB::insert("
            INSERT INTO assoc_users_groups (user_id, group_id) VALUES
            /* Comic Characters */
            (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),
            (13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),

            /* Marvel Gift Exchange */
            (1,2),(2,2),(3,2),(4,2),(5,2),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),
            (13,2),(14,2),(15,2),

            /* Avengers Secret Santa */
            (1,3),(11,3),(12,3),(13,3),(14,3),(15,3),

            /* X-mas-men */
            (1,4),(6,4),(7,4),(8,4),(9,4),

            /* DC United */
            (1,5),(16,5),(17,5),(18,5),(19,5),(20,5),(21,5),(22,5),(23,5),(24,5),

             /* Bad-guys-have-feelings-too */
            (1,6),(5,6),(10,6),(21,6),(23,6)
        ;");
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
