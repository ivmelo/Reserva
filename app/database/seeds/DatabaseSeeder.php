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

		// $this->call('UserTableSeeder');
		DB::table('reservations')->delete();
		DB::table('users')->delete();
		DB::table('items')->delete();

		
		$this->call('UserTableSeeder');
		$this->call('ItemTableSeeder');
		$this->call('ReservationTableSeeder');
		
	}

}

class ReservationTableSeeder extends Seeder {

	public function run() {
		$faker = Faker\Factory::create();

		$num_users = User::count();
		$num_items = Item::count();

		for ($i = 0; $i < 1000; $i++) { 
			$reservation = new Reservation();
			$reservation->user_id = $faker->numberBetween(1, $num_users);
			$reservation->item_id = $faker->numberBetween(1, $num_items);
			$reservation->start_date = $faker->datetime();
			$reservation->end_date = $faker->datetime();
			$reservation->message = $faker->text;
			$reservation->save();
		}

	}

}

Class ItemTableSeeder extends Seeder {

	public function run() {
		

		Item::create([
			'name' => 'Laptop',
			'amount' => 3,
			'description' => 'A laptop'
		]);

		Item::create([
			'name' => 'Mouse',
			'amount' => 4,
			'description' => 'A mouse'
		]);

		Item::create([
			'name' => 'Keyboard',
			'amount' => 2,
			'description' => 'A keyboard'
		]);

		Item::create([
			'name' => 'Projector',
			'amount' => 5,
			'description' => 'A projector'
		]);

		Item::create([
			'name' => 'Battery',
			'amount' => 2,
			'description' => 'A battery'
		]);

		Item::create([
			'name' => 'Charger',
			'amount' => 3,
			'description' => 'A charger'
		]);
	}
	
}

Class UserTableSeeder extends Seeder {
	
	public function run() {

		$faker = Faker\Factory::create();

		for ($i = 0; $i < 100; $i++) {
			$fname = $faker->firstName;
			$lname = $faker->lastName;
			$email = strtolower($fname) . '.' . strtolower($lname) . '@vieiralabs.com';
			User::create(array(
				'first_name' =>  $fname,
				'last_name' => $lname,
				'email' => $email,
				'password' => Hash::make(''),
				'is_admin' => '0'
			));
		}

		User::create(array(
			'first_name' =>  'Ivan',
			'last_name' => 'Melo',
			'email' => 'ivan@vieiralabs.com',
			'password' => Hash::make('password'),
			'is_admin' => '1'
		));

	}

}
