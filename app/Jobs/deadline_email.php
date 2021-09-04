<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class deadline_email implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
//        $data = ['name' => 'Test'];
        Mail::send('side_project.index', $data, function ($message) {
            $message->to('your@email')->subject('This is test email');
        });
        Log::info('Your email has been sent successfully!');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Log::info('succes',$this->data);
    }
}
