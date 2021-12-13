<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GetReservations extends Command
{
    public $resArray = [];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'will be get all reservations from godaddy';

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
     *
     * @return int
     */
    public function handle()
    {
        $reservations = Http::asForm()->post('https://tawfeg.com/api.php', [
            'token' => '7318C4A2ABEFEDFE3890A1D23CB1CADA73D3B9E03EF64847FF5B393EB6199435',
        ]);

        DB::beginTransaction();
        try {
            $users = User::all()->pluck('id')->toArray();
            $this->userExists($reservations->collect()->get('data'), $users);
            //DB::delete('delete from reservations');
            Reservation::where('id' , '>' , 0)->delete();
            Reservation::insert($reservations->collect()->get('data'));
            DB::commit();
            $this->info('reservations created successful');
        }catch (\Exception $ex){
            DB::rollBack();
            $this->info($ex);
        }
    }

    public function userExists($reservations, $users)
    {
        foreach ($reservations as $reservation) {

            if (!in_array(intval($reservation['user_id']), $users)) {

                $user = Http::asForm()->post('https://tawfeg.com/api.php', [
                    'token' => '7318C4A2ABEFEDFE3890A1D23CB1CADA73D3B9E03EF64847FF5B393EB6199435',
                    'user_id' => $reservation['user_id']
                ])->json()['data'];
                User::insert(
                    [
                        'id' => intval($user['id']),
                        'name' => $user['user_name'],
                        'email' => $user['user_email'],
                        'phone' => '0' . $user['phone'],
                        'role' => $user['role'],
                        'email_verified_at' => now()->format('Y-m-d H:s:i'),
                        'password' => $user['password'],
                        'created_at' => $user['create_at'],
                        'updated_at' => $user['create_at']
                    ]);
                $users[] = intval($user['id']);
            }
        }
    }
}
