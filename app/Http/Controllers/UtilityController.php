<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class UtilityController extends Controller
{
    static function makeAssignments($groupID){
        $assignments = [];
        // Get rows from db
        $users = DB::select('SELECT user_id FROM assoc_users_groups WHERE group_id = ?;', [$groupID]);

        // pull user ids into an array
        $userIDs = [];
        foreach($users as $user){
            $userIDs[] = $user->user_id;
        }

        // copy array
        $stillFree = $userIDs;

        // make assignments
        for($i = 0; $i < count($userIDs); $i++){

            // get random user id that is still free and not you
            do {
                $assignment = $stillFree[array_rand($stillFree)];
            } while ($assignment == $userIDs[$i]);

            // remove user from still free
            $keys = array_keys($stillFree);
            foreach($keys as $k){
                if ($stillFree[$k] == $assignment) unset($stillFree[$k]);
            }

            // actually make assignment
            $assignments[] = ['from_id' => $userIDs[$i], 'to_id' => $assignment];
        }

        // push assignments to db
        foreach($assignments as $a){
            DB::insert('
              INSERT INTO assignments (group_id, from_id, to_id) VALUES (?, ?, ?)
            ;', [$groupID, $a['from_id'], $a['to_id']]);
        }
    }

    static function dateStringToString($dbDate){
        return date('M jS, Y' ,strtotime($dbDate));
    }

    static function toMessageDateTime($dateTime){
        return date('g:i A m/d/y', strtotime($dateTime));
    }
}
