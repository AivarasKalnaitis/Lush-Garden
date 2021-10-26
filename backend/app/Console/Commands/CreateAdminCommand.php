<?php

namespace App\Console\Commands;

use App\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Class CreateAdminCommand
 * @package App\Console\Commands
 */
class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backend:new-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new admin user.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = $this->getAdminName();
        $email = $this->getAdminEmail();
        $password = $this->getAdminPassword();

        Admin::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $this->info('Admin user created.');
    }

    /**
     * @return string
     */
    private function getAdminName(): string
    {
        $name = $this->ask('Enter admin name');
        $validator = Validator::make(['name' => $name], [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first('name'));

            return $this->getAdminName();
        }

        return $name;
    }

    /**
     * @return string
     */
    private function getAdminEmail(): string
    {
        $mail = $this->ask('Enter admin email');
        $validator = Validator::make(['email' => $mail], [
            'email' => 'required|email|string|max:255|unique:admins',
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first('email'));

            return $this->getAdminEmail();
        }

        return $mail;
    }

    /**
     * @return string
     */
    private function getAdminPassword(): string
    {
        $password = $this->secret('Enter admin password');
        $passwordConfirm = $this->secret('Repeat password');

        $validator = Validator::make([
            'password' => $password,
            'password_confirmation' => $passwordConfirm,
        ], [
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first('password'));

            return $this->getAdminPassword();
        }

        return Hash::make($password);
    }


}
