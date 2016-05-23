<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Http\Controllers\UtilityController as UC;

class AddRulesAddAssignments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Adding Rules for every group */

        $priceRules = [
            'Price range: $5-$10',
            'Price range: $10-$20',
            'Price range: $10-$50',
            'Price range: $20-$30',
            'Price range: $50-100',
        ];
        $otherRules = [
            'No food/candy unless specifically on wish list',
            'No dangerous materials e.g. Explosives/blades',
            'Must be wrapped'
        ];
        $univRules = [
            'Derogatory items are banned (unless its REALLY REALLY funny)',
            'Gifts must be present in some fashion at event',
            'Sexual favors are NOT permitted'
        ];

        $rows = DB::select("SELECT group_id FROM groups;");
        foreach($rows as $row){
            $groupRules = $univRules;
            array_push($groupRules, $otherRules[array_rand($otherRules)]);
            array_push($groupRules, $priceRules[array_rand($priceRules)]);
            foreach($groupRules as $r){
                DB::insert('INSERT INTO rules (group_id, rule) VALUES (?, ?);', [$row->group_id, $r]);
            }
        }





        /* Adding assignments for every group */
        $rows = DB::select("SELECT group_id FROM groups;");
        foreach($rows as $row){
            UC::makeAssignments($row->group_id);
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
