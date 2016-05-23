<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDibbsAddNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Adding Dibbs */
        $rows = DB::select('SELECT id FROM users;');

        foreach($rows as $row){
            $userID = $row->id;
            $wishes = DB::select('
            SELECT *
            FROM wishes w
            WHERE user_id IN (
	            SELECT user_id
	            FROM assoc_users_groups
	            WHERE group_id IN (
		            SELECT group_id
		            FROM assoc_users_groups
		            WHERE user_id = ?
	            ) AND group_id != 1
            ) AND user_id != ? AND has_dibbs_id = 0
            ORDER BY RAND()
            LIMIT 2
        ;', [$userID, $userID]);

            foreach($wishes as $wish){
                DB::statement('UPDATE wishes SET has_dibbs_id = ? WHERE wish_id = ?;',
                    [$userID, $wish->wish_id]);
            }
        }

        /* Adding Notifications */

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
