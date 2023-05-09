<?php

namespace App\Listeners;

use App\Mail\NewMaintenanceEmail;
use App\Models\Admin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewMaintenanceRequestEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $admins = Admin::all();
        Mail::to($admins)->send(new NewMaintenanceEmail($event->maintenance));
    }
}
