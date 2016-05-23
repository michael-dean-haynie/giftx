<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE groups (
	            group_id INT AUTO_INCREMENT PRIMARY KEY,
	            name VARCHAR(255),
	            event_date DATE,
	            group_key VARCHAR(255),
	            group_leader_id INT,
	            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ;');

        DB::statement('
            CREATE TABLE rules (
	            rule_id INT AUTO_INCREMENT PRIMARY KEY,
	            group_id INT,
	            rule VARCHAR(255),
	            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
      )
        ;');

        DB::statement('
            CREATE TABLE assignments (
	            assignment_id INT AUTO_INCREMENT PRIMARY KEY,
	            group_id INT,
	            from_id INT,
	            to_id INT,
	            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ;');

        DB::statement('
            CREATE TABLE assoc_users_groups (
	            assoc_id INT AUTO_INCREMENT PRIMARY KEY,
	            user_id INT,
	            group_id INT,
	            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ;');

        DB::statement('
            CREATE TABLE suggestions (
	            suggestion_id INT AUTO_INCREMENT PRIMARY KEY,
	            for_id INT,
	            by_id INT,
	            title VARCHAR(255),
	            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ;');

        DB::statement('
            CREATE TABLE wishes (
	            wish_id INT AUTO_INCREMENT PRIMARY KEY,
	            user_id INT,
	            has_dibbs_id INT DEFAULT 0,
	            priority INT,
	            title VARCHAR(2000),
	            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ;');

        DB::statement('
            CREATE TABLE notes (
	            note_id INT AUTO_INCREMENT PRIMARY KEY,
	            wish_id INT,
				suggestion_id INT,
	            note_type VARCHAR(255),
	            note VARCHAR(255),
	            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ;');

        DB::statement('
            CREATE TABLE messages (
	            message_id INT AUTO_INCREMENT PRIMARY KEY,
	            from_id INT,
	            seen INT,
	            to_user_id INT,
	            to_group_id INT,
	            message VARCHAR(500),
	            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ;');

        DB::statement('
            CREATE TABLE notifications (
	            notification_id INT AUTO_INCREMENT PRIMARY KEY,
	            user_id INT,
	            seen INT,
	            notification VARCHAR(255),
	            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  	            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TABLE groups;');
        DB::statement('DROP TABLE rules;');
        DB::statement('DROP TABLE assignments;');
        DB::statement('DROP TABLE assoc_users_groups;');
        DB::statement('DROP TABLE suggestions;');
        DB::statement('DROP TABLE wishes;');
        DB::statement('DROP TABLE notes;');
        DB::statement('DROP TABLE messages;');
        DB::statement('DROP TABLE notifications;');

    }
}
