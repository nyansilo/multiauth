<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HodReceivedOrder extends Notification
{
    use Queueable;
    protected $placedOrder;
    protected $staffUser; 

    /**
     * Create a new notification instance.
     */
    public function __construct($placedOrder,  $staffUser)
    {
        $this->placedOrder =   $placedOrder;
        $this->staffUser   =   $staffUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    

    public function toDatabase($notifiable)
    {

        //dd($notifiable);
        return [
            'orderNo'         => $this->placedOrder->id,
            'orderDate'       => $this->placedOrder->created_at->diffForHumans(),
            'staffFullName'   => $this->staffUser->fullName,
            'staffPhoto'      => $this->staffUser->profile_picture,
            
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
