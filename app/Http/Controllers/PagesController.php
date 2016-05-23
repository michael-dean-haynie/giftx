<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \App\Http\Controllers\UtilityController as UC;
use DB;

class PagesController extends Controller
{
    static function prepareDataModel(Array $dataNames, $userID = null){
        $dataModel = [];
        if(in_array('user-wish-list', $dataNames) || in_array('auth-user-data', $dataNames)){
            $dataModel['userWishes'] = DB::select("SELECT * FROM wishes WHERE user_id = ? ORDER BY priority ASC;", [auth()->user()->id]);
            $dataModel['userNotes'] = DB::select("
                SELECT notes.note_id, notes.wish_id, notes.suggestion_id, notes.note_type,
                notes.note, notes.updated_at, notes.created_at
                FROM notes
                INNER JOIN wishes
                  ON notes.wish_id = wishes.wish_id AND wishes.user_id = ?
            ;", [auth()->user()->id]);
            $dataModel['userGroups'] = DB::select('
                SELECT g.group_id, g.name, g.event_date, g.group_key,
                g.group_leader_id, g.created_at, g.updated_at,
                CONCAT(u.first_name, " ", u.last_name) AS group_leader_name,
                u.prof_pic_filename AS group_leader_filename,
                (SELECT COUNT(*) FROM assoc_users_groups WHERE assoc_users_groups.group_id = g.group_id) AS member_count
                FROM groups g
                INNER JOIN assoc_users_groups aug
                  ON aug.group_id = g.group_id AND aug.user_id = ?
                INNER JOIN users u
                  ON u.id = g.group_leader_id
                ORDER BY g.event_date ASC
            ;', [auth()->user()->id]);
            $dataModel['userAssignments'] = DB::select('
                SELECT a.assignment_id, a.group_id, a.from_id, a.to_id, a.created_at, a.updated_at,
                u.prof_pic_filename AS assignment_filename, CONCAT(u.first_name, " ", u.last_name) AS assignment_name,
                g.name AS group_name
                FROM assignments a
                INNER JOIN users u
                  ON a.to_id = u.id AND a.from_id = ?
                INNER JOIN groups g
                  ON g.group_id = a.group_id
            ;', [auth()->user()->id]);
            $dataModel['userDibbs'] = DB::select('
                SELECT w.*, u.prof_pic_filename, CONCAT(u.first_name, " ", u.last_name) AS user_name
                FROM wishes w
                INNER JOIN users u
                    ON w.user_id = u.id
                WHERE has_dibbs_id = ?
            ;', [auth()->user()->id]);
            $dataModel['userDibbNotes'] = DB::select('
                SELECT n.*
                FROM notes n
                WHERE wish_id IN (
                    SELECT wish_id
                    FROM wishes
                    WHERE has_dibbs_id = ?
                )
            ;', [auth()->user()->id]);
        }

        if (in_array('other-user-data', $dataNames)){
            $dataModel['otherUser'] = DB::select('SELECT * FROM users WHERE id = ?', [$userID])[0];
            $dataModel['otherUserWishes'] = DB::select("
                SELECT wishes.*, (
                    SELECT CONCAT(users.first_name, ' ', users.last_name)
                    FROM users
                    WHERE users.id = wishes.has_dibbs_id
                ) AS has_dibbs_name
                FROM wishes WHERE user_id = ? ORDER BY priority ASC
            ;", [$userID]);
            $dataModel['otherUserNotes'] = DB::select("
                SELECT notes.note_id, notes.wish_id, notes.suggestion_id, notes.note_type,
                notes.note, notes.updated_at, notes.created_at
                FROM notes
                INNER JOIN wishes
                  ON notes.wish_id = wishes.wish_id AND wishes.user_id = ?
            ;", [$userID]);
            $dataModel['otherUserGroups'] = DB::select('
                SELECT g.group_id, g.name, g.event_date, g.group_key,
                g.group_leader_id, g.created_at, g.updated_at,
                CONCAT(u.first_name, " ", u.last_name) AS group_leader_name,
                u.prof_pic_filename AS group_leader_filename,
                (SELECT COUNT(*) FROM assoc_users_groups WHERE assoc_users_groups.group_id = g.group_id) AS member_count
                FROM groups g
                INNER JOIN assoc_users_groups aug
                  ON aug.group_id = g.group_id AND aug.user_id = ?
                INNER JOIN users u
                  ON u.id = g.group_leader_id
                ORDER BY g.event_date ASC
            ;', [$userID]);
        }

        if (in_array('userGroups', $dataNames)){
            $dataModel['userGroups'] = DB::select('
                SELECT g.group_id, g.name, g.event_date, g.group_key,
                g.group_leader_id, g.created_at, g.updated_at,
                CONCAT(u.first_name, " ", u.last_name) AS group_leader_name,
                u.prof_pic_filename AS group_leader_filename,
                (SELECT COUNT(*) FROM assoc_users_groups WHERE assoc_users_groups.group_id = g.group_id) AS member_count
                FROM groups g
                INNER JOIN assoc_users_groups aug
                  ON aug.group_id = g.group_id AND aug.user_id = ?
                INNER JOIN users u
                  ON u.id = g.group_leader_id
                ORDER BY g.event_date ASC
            ;', [auth()->user()->id]);
        }

        if (in_array('group-data', $dataNames)){
            $groupID = $dataNames['groupID'];
            $dataModel['members'] = DB::select('
                SELECT id, CONCAT(u.first_name, " ", u.last_name) AS user_name, prof_pic_filename
                FROM users u
                INNER JOIN assoc_users_groups aug
                    ON u.id = aug.user_id AND aug.group_id = ?
            ;', [$groupID]);
        }

        return $dataModel;
    }

    static function test($userID = null){
//        $dataModel = PagesController::prepareDataModel(['auth-user-data']);

//        echo "<pre>" . print_r(($dataModel['userWishes']), true) . "</pre>";
//        echo "<pre>" . print_r(($dataModel['userNotes']), true) . "</pre>";
//        echo "<pre>" . print_r(($dataModel['userGroups']), true) . "</pre>";
//        echo "<pre>" . print_r(($dataModel['userAssignments']), true) . "</pre>";
//        echo "<pre>" . print_r(($dataModel['userDibbs']), true) . "</pre>";
//        echo "<pre>" . print_r(($dataModel['userDibbNotes']), true) . "</pre>";

        $dataModel = PagesController::prepareDataModel(['group-data'], $userID);
                echo "<pre>" . print_r($dataModel, true) . "</pre>";

    }

    static function testCroppie(){
        return view('pages.test-croppie');
    }

    /*
    |----------------------------
    | GET
    |----------------------------
    */

    static function getTempHome(){
        return view('pages.temp-home');
    }

    static function getProfile(){
        $dataModel = PagesController::prepareDataModel(['auth-user-data']);
        $dataModel['amn'] = 'profile';

        return view('pages/profile')->with($dataModel);
    }

    static function getEditProfile(){
        $dataModel = PagesController::prepareDataModel(['default-data']);
        return view('pages/edit-profile')->with($dataModel);
    }

    static function getResetPassword(){
        $dataModel = PagesController::prepareDataModel(['default-data']);
        return view('pages/reset-password')->with($dataModel);
    }

    static function getEditPicture(){
        $dataModel = PagesController::prepareDataModel(['default-data']);
        return view('pages/edit-picture')->with($dataModel);
    }

    static function getCropPicture(){
        $dataModel = PagesController::prepareDataModel(['default-data']);
        return view('pages/crop-picture')->with($dataModel);
    }

    static function getMessages(){
        $dataModel = PagesController::prepareDataModel(['auth-user-data']);
        $dataModel['amn'] = 'messages';
        return view('pages/messages')->with($dataModel);
    }

    static function getUser($userID){
        if($userID == auth()->user()->id) return redirect(url('/profile'));
        $dataModel = PagesController::prepareDataModel(['other-user-data'], $userID);
        return view('pages/user')->with($dataModel);
    }

    static function getAddWish(){
        $dataModel = PagesController::prepareDataModel(['default-data']);
        return view('pages/add-wish')->with($dataModel);
    }

    static function getEditWish($wishID){
        $dataModel = PagesController::prepareDataModel(['default-data']);
        $dataModel['wish'] = DB::select('SELECT * FROM wishes WHERE wish_id = ?;', [$wishID])[0];
        $dataModel['notes'] = DB::select('SELECT * FROM notes WHERE wish_id = ?;', [$wishID]);
        return view('pages/edit-wish')->with($dataModel);
    }

    static function getDeleteWish($wishID){
        $dataModel = PagesController::prepareDataModel(['default-data']);
        $dataModel['wish'] = DB::select('SELECT * FROM wishes WHERE wish_id = ?;', [$wishID])[0];
        return view('pages/delete-wish')->with($dataModel);
    }

    static function getCallDibbs($wishID){
        $dataModel = PagesController::prepareDataModel(['default-data']);
        $dataModel['wish'] = DB::select('SELECT * FROM wishes WHERE wish_id = ?;', [$wishID])[0];
        return view('pages/call-dibbs')->with($dataModel);
    }

    static function getGiveUpDibbs($wishID){
        $dataModel = PagesController::prepareDataModel(['default-data']);
        $dataModel['wish'] = DB::select('SELECT * FROM wishes WHERE wish_id = ?;', [$wishID])[0];
        return view('pages/give-up-dibbs')->with($dataModel);
    }

    static function getGroups(){
        $dataModel = PagesController::prepareDataModel(['userGroups']);
        return view('pages/groups')->with($dataModel);
    }

    static function getCreateGroup(){
        $dataModel = PagesController::prepareDataModel(['default-data']);
        return view('pages/create-group')->with($dataModel);
    }

    static function getGroup($groupID){
        $dataModel = PagesController::prepareDataModel(['group-data', 'groupID' => $groupID]);
//        echo "<pre>" . print_r($dataModel, true) . "</pre>";
//        return;
        return view('pages/group')->with($dataModel);
    }


    /*
    |----------------------------
    | POST
    |----------------------------
    */

    public function postEditProfile(){
        $input = request()->all();

        /* Validate Input*/
        $defaultRules = [
            'first-name' => 'required|max:255',
            'last-name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ];
        $newRules = [
            'first-name' => 'required|max:255',
            'last-name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ];
        $emailIsNew = (request()->user()->email != $input['email']);
        if ($emailIsNew) {
            $this->validate(request(), $newRules);
        } else {
            $this->validate(request(), $defaultRules);
        }

        /* Update users Table*/
        DB::update('
            UPDATE users SET first_name = ?, last_name = ?, email = ?
            WHERE id = ?
        ;', [$input['first-name'], $input['last-name'], $input['email'], auth()->user()->id]);

        return redirect()->back()->with('status', 'Your Profile is up to date!');
    }

    public function postResetPassword(){
        $input = request()->all();

        /* Validate Input*/
        $this->validate(request(),[
            'password' => 'required|min:6|confirmed',
        ]);

        /* Update users Table*/
        DB::update('
            UPDATE users SET password = ?
            WHERE id = ?
        ;', [bcrypt($input['password']), auth()->user()->id]);

        return redirect(url('/edit-profile'))->with('status', 'Your password has been successfully updated!');
    }

    public function postEditPicture(){
        $file = request()->file('file');

        /* Validate Input*/
        $this->validate(request(),[
            'file' => 'required|image',
        ]);

        /* Determine new name */
        $newName = 'user'.auth()->user()->id.'.'.$file->getClientOriginalExtension();

        /* Move file */
        $file = $file->move(public_path()."/img/profile", $newName);

        /* How I did it ^ in artisthomepage2 */
//        $file = $file->move(/*public_path() . '\*/'items', $newName);

        /* Update users Table*/
        DB::update('
            UPDATE users SET prof_pic_filename = ?
            WHERE id = ?
        ;', [$newName, auth()->user()->id]);

        /* Redirect User to crop page */
        return redirect(url('/crop-picture'));
    }

    public function postDeletePicture(){
        /* Delete Picture */
        if (file_exists(public_path().'/img/profile/'.auth()->user()->prof_pic_filename)){
            unlink(public_path().'/img/profile/'.auth()->user()->prof_pic_filename);
        }
        return redirect()->back()->with('status',
            "I thought you looked great, but whatevs...");
    }

    static function postCropPicture(){
        $input = request()->all();

        /* Get filtered data */
        $filteredData=substr($input['cropped-image'], strpos($input['cropped-image'], ",")+1);

        /* Decode Data */
        $decodedData=base64_decode($filteredData);

        /* Get user prof_pic_filename */
        $profPicFilename = auth()->user()->prof_pic_filename;

        /* Set New Filename */
        $newFilename = 'user'.auth()->user()->id.'.png';

        /* Test for and delete old file */
        if (file_exists(public_path()."/img/profile/".$newFilename/*$profPicFilename*/)){
            unlink(public_path()."/img/profile/".$newFilename);
        }

        /* Create file write to it and close it */
        $fp = fopen(public_path()."/img/profile/".$newFilename, 'wb' );
        fwrite( $fp, $decodedData);
        fclose( $fp );

        /* Update user table*/
        DB::statement('UPDATE users SET prof_pic_filename = ? WHERE id = ?;', [$newFilename, auth()->user()->id]);

        return redirect(url('/edit-picture'))->with('status', 'Update complete! You look great!');
    }

    public function postAddWish(){
        $this->validate(request(),[
            'title' => 'required|max:255'
        ],[],[
            'title' => 'Title'
        ]);

        $input = request()->all();
//        echo "<pre>" . print_r($input, true) . "</pre>";
//        return;


        // add wish
        DB::statement('INSERT INTO wishes (user_id, priority, title) VALUES (?, ?, ?);', [auth()->user()->id, $input['priority'], $input['title']]);
        $wishID = DB::select('SELECT MAX(wish_id) AS wish_id FROM wishes;')[0]->wish_id;
        foreach(array_keys($input) as $key){
            if (strlen($input[$key]) > 0){
                if (substr($key, 0, 4) == 'link'){
                    DB::statement('INSERT INTO notes (wish_id, note_type, note) VALUES (?, ?, ?);', [$wishID, 'url', $input[$key]]);
                } elseif(substr($key, 0, 4) == 'note'){
                    DB::statement('INSERT INTO notes (wish_id, note_type, note) VALUES (?, ?, ?);', [$wishID, 'note', $input[$key]]);
                }
            }
        }


        return redirect()->back()->with('status', 'The wish-list has been updated!');
    }

    public function postEditWish(){
        $validWishes = DB::select('SELECT wish_id FROM wishes WHERE user_id = ?;', [auth()->user()->id]);
        $validString = '';
        foreach($validWishes as $wish){
            $validString .= ",".$wish->wish_id;
        }
        $validString = subStr($validString,1);


        $this->validate(request(),[
            'title' => 'required|max:255',
            'wish-id' => 'in:'.$validString
        ],[],[
            'title' => 'Title',
            'wish-id' => 'Wish ID'
        ]);

        $input = request()->all();

        // update wish
        DB::statement('UPDATE wishes SET title = ?, priority = ? WHERE wish_id = ?;', [$input['title'], $input['priority'], $input['wish-id']]);

        // delete old notes
        DB::statement('DELETE FROM notes WHERE wish_id = ?;', [$input['wish-id']]);

        // add new notes
        foreach(array_keys($input) as $key){
            if (strlen($input[$key]) > 0){
                if (substr($key, 0, 4) == 'link'){
                    DB::statement('INSERT INTO notes (wish_id, note_type, note) VALUES (?, ?, ?);', [$input['wish-id'], 'url', $input[$key]]);
                } elseif(substr($key, 0, 4) == 'note'){
                    DB::statement('INSERT INTO notes (wish_id, note_type, note) VALUES (?, ?, ?);', [$input['wish-id'], 'note', $input[$key]]);
                }
            }
        }

        return redirect()->back()->with('status', 'The wish-list has been updated!');
    }

    public function postDeleteWish(){
        $validWishes = DB::select('SELECT wish_id FROM wishes WHERE user_id = ?;', [auth()->user()->id]);
        $validString = '';
        foreach($validWishes as $wish){
            $validString .= ",".$wish->wish_id;
        }
        $validString = subStr($validString,1);


        $this->validate(request(),[
            'wish-id' => 'in:'.$validString
        ],[],[
            'wish-id' => 'Wish ID'
        ]);

        $input = request()->all();

        // delete wish
        DB::statement('DELETE FROM wishes WHERE wish_id = ?;', [$input['wish-id']]);

        // delete notes
        DB::statement('DELETE FROM notes WHERE wish_id = ?;', [$input['wish-id']]);

        return redirect(url('/add-wish'))->with('status', 'The wish-list has been updated!');
    }

    public function postGiveUpDibbs(){
        $validWishes = DB::select('SELECT wish_id FROM wishes WHERE has_dibbs_id = ?;', [auth()->user()->id]);
        $validString = '';
        foreach($validWishes as $wish){
            $validString .= ",".$wish->wish_id;
        }
        $validString = subStr($validString,1);


        $this->validate(request(),[
            'wish-id' => 'in:'.$validString
        ],[],[
            'wish-id' => 'Wish ID'
        ]);

        $input = request()->all();

        // give up dibbs
        DB::statement('UPDATE wishes SET has_dibbs_id = 0 where wish_id = ?;', [$input['wish-id']]);

        return redirect(url('/add-wish'))->with('status', 'The wish-list has been updated!');
    }

    public function postCallDibbs(){
        $input = request()->all();

        // give up dibbs
        DB::statement('UPDATE wishes SET has_dibbs_id = ? where wish_id = ?;', [auth()->user()->id, $input['wish-id']]);

        return redirect(url('/add-wish'))->with('status', 'The wish-list has been updated!');
    }

    public function postCreateGroup(){

        $this->validate(request(),[
            'name' => 'required|max:255',
            'date' => ['required', 'Regex:/^[0-9]{4}\/[0-1][0-9]\/[0-3][0-9]$/'],
            'key' => 'required|max:255'
        ],[],[
            'wish-id' => 'Wish ID'
        ]);

        $input = request()->all();

        /* add row to groups*/
        DB::statement('INSERT INTO groups (name, event_date, group_key, group_leader_id) VALUES (?,?,?,?);',
            [$input['name'], $input['date'], $input['key'], auth()->user()->id]);

        /* get group id*/
        $groupID = DB::select('SELECT MAX(group_id) AS group_id FROM groups;')[0]->group_id;

        /* add row to assoc_users_groups */
        DB::statement('INSERT INTO assoc_users_groups (user_id, group_id) VALUES (?,?);',
            [auth()->user()->id, $groupID]);

        return redirect(url('/group/'.$groupID));
    }



}
