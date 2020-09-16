<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('states')->insert([[
            'state_initial' => 'AL',
            'state_fullname' => 'Alabama',
        ],
        [
            'state_initial' => 'AK',
            'state_fullname' => 'Alaska ',
        ],
        [
            'state_initial' => 'AZ',
            'state_fullname' => 'Arizona',
        ],
        [
            'state_initial' => 'CA',
            'state_fullname' => 'California',
        ],
        [
            'state_initial' => 'CO',
            'state_fullname' => 'Colorado',
        ],
        [
            'state_initial' => 'CT',
            'state_fullname' => 'Connecticut',
        ],
        [
            'state_initial' => 'DE',
            'state_fullname' => 'Delaware',
        ],
        [
            'state_initial' => 'FL',
            'state_fullname' => 'Florida',
        ],
        [
            'state_initial' => 'GA',
            'state_fullname' => 'Georgia',
        ],
        [
            'state_initial' => 'HI',
            'state_fullname' => 'Hawaii',
        ],
        [
            'state_initial' => 'ID',
            'state_fullname' => 'Idaho',
        ],
        [
            'state_initial' => 'IL',
            'state_fullname' => 'Illinois',
        ],
        [
            'state_initial' => 'IN',
            'state_fullname' => 'Indiana',
        ],
        [
            'state_initial' => 'KS',
            'state_fullname' => 'Kansas',
        ],
        [
            'state_initial' => 'LA',
            'state_fullname' => 'Louisiana',
        ],
        [
            'state_initial' => 'ME',
            'state_fullname' => 'Maine',
        ],
        [
            'state_initial' => 'MD',
            'state_fullname' => 'Maryland',
        ],
        [
            'state_initial' => 'GA',
            'state_fullname' => 'Michigan',
        ],
        [
            'state_initial' => 'MI',
            'state_fullname' => 'Michigan',
        ],
        [
            'state_initial' => 'NV',
            'state_fullname' => 'Nevada',
        ],
        [
            'state_initial' => 'NJ',
            'state_fullname' => 'New Jersey',
        ],
        [
            'state_initial' => 'NY',
            'state_fullname' => 'New York',
        ]]
    );
    }
}
