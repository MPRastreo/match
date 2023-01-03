<?php

namespace App\Console\Commands;

use App\Http\Controllers\NotificationsController;
use App\Models\Notifications;
use App\Models\Quotation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class NotificationsAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        date_default_timezone_set('America/Mexico_City');

        $DateAndTime = date('Y-m-d', time());

        $quotation = Quotation::all();

        Notifications::query()->delete();

        //Function que compara la fecha de la solicitud vs la fecha actual
        foreach ($quotation as $quo) {

            if ($quo->date >= $DateAndTime && $quo->status == "Requested") {

                $requested = new NotificationsController();

                $requested->asignacion($quo);
            }elseif ($quo->date >= $DateAndTime && $quo->status == "Assign") {
                $requested = new NotificationsController();

                $requested->notificarAssign($quo);
            }
        }
    }
}
