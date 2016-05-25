<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\UtilityController as UC;
use App\Http\Requests;


class AjaxController extends Controller
{
    static function messagesSearchUsers(){
        $input = '%'.trim(request()->input('input')).'%';
        $output = [
            'input' => request()->input('input'),
            'users' => [],
            'groups'=> []
        ];


        if (strlen(trim(request()->input('input'))) > 0){
            $output['users'] = DB::select('
                SELECT CONCAT(first_name, " ", last_name) AS name,
                prof_pic_filename, "user" AS chat_type, id AS chat_id
                FROM users
                WHERE CONCAT(first_name, " ", last_name) LIKE ?
                ORDER BY last_name ASC
        ;', [$input]);
        }


       $output['groups'] = DB::select('
            SELECT name, "group" AS chat_type, group_id AS chat_id
            FROM groups
            WHERE name LIKE ? AND group_id IN (
                SELECT group_id
                FROM assoc_users_groups
                WHERE user_id = ?
            )
        ;', [$input, auth()->user()->id]);

        return json_encode($output);
    }


    static function messagesUpdateChat(){
        $input = request()->all();
        $output = [
            'chatName' => ''
        ];

        if ($input['chat-type'] === 'user'){
            $output['chatName'] = DB::select('
                SELECT CONCAT(first_name, " ", last_name) AS chat_name
                FROM users
                WHERE id = ?
            ;', [$input['chat-id']])[0]->chat_name;

        }elseif ($input['chat-type'] === 'group'){
            $output['chatName'] = DB::select('
                SELECT name AS chat_name
                FROM groups
                WHERE group_id = ?
            ;', [$input['chat-id']])[0]->chat_name;
        }

        /*==================================== messages */

        if ($input['chat-type'] === 'user'){
            $output['messages'] = DB::select('
            SELECT m.message, m.from_id,CONCAT(u.first_name, " ", u.last_name) AS from_name,
            u.prof_pic_filename AS from_filename, m.updated_at, m.message_id, "user" AS chat_type,
            ? AS chat_id
            FROM messages m
            INNER JOIN users u
                ON m.from_id = u.id
            WHERE (m.from_id = ? AND m.to_user_id = ?) OR
            (m.from_id = ? AND m.to_user_id = ?)
            ORDER BY m.message_id DESC
            LIMIT 20
        ;', [$input['chat-id'], auth()->user()->id, $input['chat-id'], $input['chat-id'], auth()->user()->id]);

        }elseif ($input['chat-type'] === 'group'){
            $output['messages'] = DB::select('
            SELECT m.message, m.from_id,CONCAT(u.first_name, " ", u.last_name) AS from_name,
            u.prof_pic_filename AS from_filename, m.message_id, m.updated_at, m.message_id, "group" AS chat_type,
            ? AS chat_id
            FROM messages m
            INNER JOIN users u
                ON m.from_id = u.id
            WHERE m.to_group_id = ?
            ORDER BY m.message_id DESC
            LIMIT 20
        ;', [$input['chat-id'], $input['chat-id']]);
        }

        foreach($output['messages'] as $message){
            $message->updated_at = UC::toMessageDateTime($message->updated_at);
        }

        return json_encode($output);
    }

    static function messagesLoadOlderMessages(){
        $input = request()->all();
        $output = [];

        if ($input['chat-type'] === 'user') {
            $output['messages'] = DB::select('
            SELECT m.message, m.from_id,CONCAT(u.first_name, " ", u.last_name) AS from_name,
            u.prof_pic_filename AS from_filename, m.updated_at, m.message_id, "user" AS chat_type,
            ? AS chat_id
            FROM messages m
            INNER JOIN users u
                ON m.from_id = u.id
            WHERE ((m.from_id = ? AND m.to_user_id = ?) OR (m.from_id = ? AND m.to_user_id = ?)) AND m.message_id < ?
            ORDER BY m.message_id DESC
            LIMIT 20
        ;', [$input['chat-id'], auth()->user()->id, $input['chat-id'], $input['chat-id'], auth()->user()->id, $input['message-id']]);

        }elseif ($input['chat-type'] === 'group'){
            $output['messages'] = DB::select('
            SELECT m.message, m.from_id,CONCAT(u.first_name, " ", u.last_name) AS from_name,
            u.prof_pic_filename AS from_filename, m.message_id, m.updated_at, m.message_id, "group" AS chat_type,
            ? AS chat_id
            FROM messages m
            INNER JOIN users u
                ON m.from_id = u.id
            WHERE m.to_group_id = ? AND m.message_id < ?
            ORDER BY m.message_id DESC
            LIMIT 20
        ;', [$input['chat-id'], $input['chat-id'], $input['message-id']]);
        }

        foreach($output['messages'] as $message){
            $message->updated_at = UC::toMessageDateTime($message->updated_at);
        }

        return json_encode($output);
    }

    static function messagesSendMessage(){

        $input = request()->all();
        $output = [];

        $toType = ($input['chat-type'] === 'user' ? "to_user_id" : "to_group_id");
        DB::statement("
            INSERT INTO messages (from_id, $toType, message) VALUES (?, ?, ?)
        ;", [auth()->user()->id, $input['chat-id'], $input['message']]);

        if ($input['chat-type'] === 'user') {
            $output['messages'] = DB::select('
            SELECT m.message, m.from_id,CONCAT(u.first_name, " ", u.last_name) AS from_name,
            u.prof_pic_filename AS from_filename, m.updated_at, m.message_id, "user" AS chat_type,
            ? AS chat_id
            FROM messages m
            INNER JOIN users u
                ON m.from_id = u.id
            WHERE ((m.from_id = ? AND m.to_user_id = ?) OR (m.from_id = ? AND m.to_user_id = ?)) AND m.message_id > ?
            ORDER BY m.message_id DESC
            LIMIT 20
        ;', [$input['chat-id'], auth()->user()->id, $input['chat-id'], $input['chat-id'], auth()->user()->id, $input['message-id']]);

        }elseif ($input['chat-type'] === 'group'){
            $output['messages'] = DB::select('
            SELECT m.message, m.from_id,CONCAT(u.first_name, " ", u.last_name) AS from_name,
            u.prof_pic_filename AS from_filename, m.message_id, m.updated_at, m.message_id, "group" AS chat_type,
            ? AS chat_id
            FROM messages m
            INNER JOIN users u
                ON m.from_id = u.id
            WHERE m.to_group_id = ? AND m.message_id > ?
            ORDER BY m.message_id DESC
            LIMIT 20
        ;', [$input['chat-id'], $input['chat-id'], $input['message-id']]);
        }

        foreach($output['messages'] as $message){
            $message->updated_at = UC::toMessageDateTime($message->updated_at);
        }

        return json_encode($output);
    }

    static function messagesAutoUpdateChat(){
        $input = request()->all();
        $output = [];

        if ($input['chat-type'] === 'user') {
            $output['messages'] = DB::select('
            SELECT m.message, m.from_id,CONCAT(u.first_name, " ", u.last_name) AS from_name,
            u.prof_pic_filename AS from_filename, m.updated_at, m.message_id, "user" AS chat_type,
            ? AS chat_id
            FROM messages m
            INNER JOIN users u
                ON m.from_id = u.id
            WHERE ((m.from_id = ? AND m.to_user_id = ?) OR (m.from_id = ? AND m.to_user_id = ?)) AND m.message_id > ?
            ORDER BY m.message_id DESC
            LIMIT 20
        ;', [$input['chat-id'], auth()->user()->id, $input['chat-id'], $input['chat-id'], auth()->user()->id, $input['message-id']]);

        }elseif ($input['chat-type'] === 'group'){
            $output['messages'] = DB::select('
            SELECT m.message, m.from_id,CONCAT(u.first_name, " ", u.last_name) AS from_name,
            u.prof_pic_filename AS from_filename, m.message_id, m.updated_at, m.message_id, "group" AS chat_type,
            ? AS chat_id
            FROM messages m
            INNER JOIN users u
                ON m.from_id = u.id
            WHERE m.to_group_id = ? AND m.message_id > ?
            ORDER BY m.message_id DESC
            LIMIT 20
        ;', [$input['chat-id'], $input['chat-id'], $input['message-id']]);
        }

        foreach($output['messages'] as $message){
            $message->updated_at = UC::toMessageDateTime($message->updated_at);
        }

        return json_encode($output);
    }
}















































