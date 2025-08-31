<?php

namespace App\Console\Commands;

use App\Models\User;
use Hash;
use Illuminate\Console\Command;

class InstallAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install System Admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $user = new User([
            'name' => 'BMS Admin',
            'email' => 'bms@yopmail.com',
            'phone_no' => '1234567890',
            'password' => Hash::make('secret'),
            'user_type' => 1 // 1 for admin, 0 for user
        ]);
        if ($user->save()) {
            $this->info('Admin user created successfully.');
        } else {
            $this->error('Failed to create admin user.');
        }
    }
}
