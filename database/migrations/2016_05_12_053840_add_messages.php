<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $ipsums = [
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
            "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
            "Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "Lorem ipsum dolor sit amet",
            "Ut enim ad minim veniam",
            "Excepteur sint",
            "Excepteur sint occaecat cupidatat non proident, sunt in culpa",
            "voluptate velit esse cillum dolore eu fugiat",
            "proident, sunt in culpa"
        ];

        for($round = 0; $round < 10; $round++){
            $users = DB::select('SELECT id FROM users;');
            foreach($users as $user){
                $toUsers = array_rand($users, 2);

                foreach($toUsers as $toUser){
                    DB::statement('
                        INSERT INTO messages (from_id, to_user_id, message) VALUES (?, ?, ?)
                    ;', [$user->id, $users[$toUser]->id, $ipsums[array_rand($ipsums)]]);
                }

                $groups = DB::select('
                    SELECT group_id
                    FROM assoc_users_groups
                    WHERE user_id = ?
                ;', [$user->id]);

                $toGroup = array_rand($groups);

                DB::statement('
                        INSERT INTO messages (from_id, to_group_id, message) VALUES (?, ?, ?)
                    ;', [$user->id, $groups[$toGroup]->group_id, $ipsums[array_rand($ipsums)]]);
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
