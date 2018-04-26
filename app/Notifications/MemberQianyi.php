<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Qianyi;
use Mail;

class MemberQianyi extends Notification implements ShouldQueue
{
    use Queueable;

    public $qianyi;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Qianyi $qianyi)
    {
        $this->qianyi = $qianyi;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
        return ['database','mail'];
    }

    public function toDatabase($notifiable)
    {

        // 存入数据库里的数据
        return [
            'title'=>$this->qianyi->name.'提出了迁党申请,请前往迁党管理中处理',
            'link' =>'qianyis.index',
            'qianyi_id' => $this->qianyi->id,
            'qianyi_name' => $this->qianyi->name,
            'from_user_id' => $this->qianyi->from_user_id,
            'from_user_name' => $this->qianyi->from_user_name,
            'to_user_name' => $this->qianyi->to_user_name,
            'to_user_id' => $this->qianyi->to_user_id,
            'member_id' => $this->qianyi->member_id,
            'created_at' => $this->qianyi->created_at,
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $title = $this->qianyi->name.'提出了迁党申请,请前往迁党管理中处理';

        return (new MailMessage)
                    ->subject('吕梁共产党员')
                    ->line($title);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
