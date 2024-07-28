<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangeAllUserPasswordsToPassword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Retrieve all users
        $users = DB::table('users')->get();

        // Update each user's password
        foreach ($users as $user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['password' => Hash::make('password')]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // The down method is intentionally left blank because this migration is irreversible
        // or you could throw an exception to make sure it is not executed
        throw new \Exception('This migration cannot be reversed.');
    }
}
