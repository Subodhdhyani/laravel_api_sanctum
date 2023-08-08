<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\employee;

class employees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emp = new employee;
        $emp->name ="Subodh";
        $emp->age ="24";
        $emp->department ="It";
        $emp->job_title ="Software Engineer";
        $emp->email ="sam@gmail.com";
        $emp->contact ="8476802900";
        $emp->salary ="45000";
        $emp->address ="Nainital";
        $emp->save();
    }
}
