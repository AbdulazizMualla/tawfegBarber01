<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Service extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add all service from database';


    private $services = [
        [ "service"=>" دقن","minute"=>"30","created_at"=>"2021-11-05 22:21:08","updated_at"=>"2021-11-05 22:21:08"],
        [ "service"=>"شعر","minute"=>"30","created_at"=>"2021-11-05 22:21:08","updated_at"=>"2021-11-05 22:21:08"],
        [ "service"=>" دقن و شعر","minute"=>"60","created_at"=>"2021-11-05 22:21:08","updated_at"=>"2021-11-05 22:21:08"],
        [ "service"=>"دقن وشعر وجراتين","minute"=>"90","created_at"=>"2021-11-05 22:21:08","updated_at"=>"2021-11-05 22:21:08"],
        [ "service"=>"تجهيز عريس","minute"=>"120","created_at"=>"2021-11-05 22:22:49","updated_at"=>"2021-11-05 22:22:49"]
    ];
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
     * @return string
     */
    public function handle()
    {
        try {
            \App\Models\Service::insert($this->services);
            return $this -> info('reasons created successfully');
        } catch (\Exception $ex){
            return $this -> info($ex);
        }
    }
}
