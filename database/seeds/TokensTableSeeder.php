<?php

use Illuminate\Database\Seeder;

use App\Jobs\UpdateTokenInfo;

class TokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tokens = [
            'access' => env('ACCESS_TOKEN'),
            'points' => env('POINTS_TOKEN'),
        ];

        foreach($tokens as $type => $value)
        {
            UpdateTokenInfo::dispatch($type, $value);
        }
    }
}