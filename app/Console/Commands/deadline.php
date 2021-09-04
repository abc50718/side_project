<?php

namespace App\Console\Commands;

use App\Item;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class deadline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is deadline notice';

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
     * @return mixed
     */
    public function handle()
    {
        $results = Item::where('notice', '=', '0')->orderby('deadline', 'desc')->get();
//        $results = Item::select('notice','users_id')->where('notice', '=', '0')->leftjoin('users', 'users.id', '=', 'items.users_id')->orderby('deadline', 'desc')->get();
//                $this->info(json_encode($results));
        $today = date('Y-m-d');
        foreach ($results as $Field) {
            switch ($Field['notice']) {
                case 0:
                    $day = (strtotime($Field['deadline']) - strtotime($today)) / (60 * 60 * 24);
                    switch ($day) {
                        case $Field['set_day'] > $day:
                        case $Field['set_day'] == $day:
                            $user_id = User::where('id', '=', $Field['users_id'])->get();
                            $email = $user_id[0]['email'];
                            Mail::raw('代辦事項即將到期通知', function ($message) use($email) {
                                $message->from('abc5071802@gmail.com', '系統寄信');
                                $message->to($email)->subject('代辦事項即將到期通知');
                            });
                            Item::where('id', '=', $Field['id'])->update(['notice' => 1]);
                            break;
                        default:
                            break;
                    }
                    break;
                default:
                    break;
            }
        }
//        $this->info($log);
    }
}
