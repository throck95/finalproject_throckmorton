<?php
use Illuminate\Database\Seeder;
use App\User as User;

class UserTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->delete();
        User::create(array(
            'fname' => 'Tyler',
            'mname' => 'Martin',
            'lname' => 'Throckmorton',
            'email' => 'tylerthrock95@gmail.com',
            'phone' => '5139673116',
            'password' => Hash::make('dennisiscool')
        ));
        User::create(array(
            'fname' => 'Robin',
            'mname' => 'Martin',
            'lname' => 'Throckmorton',
            'email' => 'robin@strategichrinc.com',
            'phone' => '5136979855',
            'password' => Hash::make('throckmortonr9855')
        ));
        User::create(array(
            'fname' => 'John',
            'mname' => 'Denton',
            'lname' => 'Throckmorton',
            'email' => 'john@strategichrinc.com',
            'phone' => '5137065907',
            'password' => Hash::make('throckmortonj5907')
        ));
        User::create(array(
            'fname' => 'Virginia',
            'lname' => 'Hurst',
            'email' => 'hurst@gmail.com',
            'phone' => '5136978031',
            'password' => Hash::make('hurstv8031')
        ));
        User::create(array(
            'fname' => 'Jill',
            'lname' => 'Martin',
            'email' => 'jm7artin@yahoo.com',
            'phone' => '9418227966',
            'password' => Hash::make('martinj7966')
        ));
        User::create(array(
            'fname' => 'Ed',
            'lname' => 'Parrish',
            'email' => 'parrished@gmail.com',
            'phone' => '3173760845',
            'password' => Hash::make('parrishe0845')
        ));
    }
}