<?php

namespace App\Jobs;

use App\Mail\AdminCreationMail;
use App\Models\InstitutionAdmin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAdminCreationMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $institutionAdmin;
    protected $password;

    /**
     * Create a new job instance.
     */
    public function __construct( InstitutionAdmin $institutionAdmin, $password )
    {
        $this->institutionAdmin = $institutionAdmin;
        $this->password         = $password;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to( $this->institutionAdmin->user->email )->send( new AdminCreationMail( $this->institutionAdmin, $this->password ) );
    }
}
