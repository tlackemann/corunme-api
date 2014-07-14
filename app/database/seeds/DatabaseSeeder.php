<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('RoleTableSeeder');
		$this->call('UserTableSeeder');
	}

}

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $role = new Role;
		$role->name = 'User';
		$role->save();

		$role = new Role;
		$role->name = 'Admin';
		$role->save();
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User;
		$user->role_id = 1;
		$user->username = 'tlackemann';
		$user->password = Hash::make('sparta56tl');
		$user->email = 'tommylackemann@gmail.com';

		$user->save();
    }

}