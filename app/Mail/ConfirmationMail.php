<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Appointment;
use App\User;

class ConfirmationMail extends Mailable
{
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $booking, $user;


    public function __construct(Appointment $booking, User $user)
    {
        $this->booking = $booking;            
        $this->user = $user;
             
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirm_booking')
                    ->subject('Appointment Confirmed')
                    ->with([
                        'date'=>  $this->booking->appointment_date,
                        'time' => $this->booking->appointment_time,
                        'name' => $this->user->name,
                        
                    ]);
    }
}
