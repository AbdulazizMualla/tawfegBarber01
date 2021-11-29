<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GodaddyGetUsers extends Command
{
    public $allUsers = [];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command to connection to godaddy hosting and get data users or user or reservations';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $users = Http::asForm()->post('https://tawfeg.com/api.php' , [
            'token' => '7318C4A2ABEFEDFE3890A1D23CB1CADA73D3B9E03EF64847FF5B393EB6199435',
            'users' => true
        ]);
        $this->getUserFromUsers($users->collect()->get('data'));
       DB::beginTransaction();
        try {
            User::insert($this->allUsers);
            DB::commit();
            $this->info('users created successfully');
        }catch (\Exception $ex){
            DB::rollBack();
            $this->info($ex);
        }

    }

    protected function getUserFromUsers($users)
    {
      foreach ($users as $user){
          array_push($this->allUsers ,  $this->setUserData($user));
      }

    }

    public function setUserData($user){

        return [
            'id' => intval($user['id']),
            'name' => $user['user_name'],
            'email' => $user['user_email'],
            'phone' => '0'.$user['phone'],
            'role' => $user['role'],
            'email_verified_at' => now()->format('Y-m-d H:s:i'),
            'password' => $user['password'],
            'created_at' => $user['create_at'],
            'updated_at' => $user['create_at']

        ];
    }


}
