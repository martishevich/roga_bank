<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;
use PDF;
use App\Mail\StatementEmail;
use App\Transaction;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $statementTransaction = Transaction::transaction($this->user->account_card['0']->card_number);
        $pdf = PDF::loadView('pdf.statement', compact('statementTransaction'))->setPaper('a4');
        $objDemo = new \stdClass();
        $objDemo->first_name = $this->user->firstName;
        $objDemo->last_name = $this->user->lastName;
        Mail::to($this->user->mail['0']->mail)->send(new StatementEmail($objDemo, $pdf));
    }
}
