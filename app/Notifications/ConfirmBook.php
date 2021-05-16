<?php

namespace App\Notifications;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmBook extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The new book
     *
     * @var App\Models\Book
     */
    private $book;

    /**
     * Create a new notification instance.
     *
     * @param App\Models\Book $book
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = route('books.show', $this->book->id);

        return (new MailMessage)
                ->greeting('Bookingan Telah terkonfirmasi!')
                ->line('Anda memiliki 1 bookingan yang telah terkonfirmasi. Silahkan klik tombol di bawah ini untuk melihat rincian dan invoice-nya')
                ->action('Lihat Bookingan', $url);
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
            'message_title' => 'Bookingan Telah terkonfirmasi!',
            'message_description' => 'Anda memiliki 1 bookingan yang telah terkonfirmasi!',
            'icon_html' => '<div class="avatar bg-light-warning">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up avatar-icon"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                </div>
                            </div>',
            'url' => route('books.show', $this->book->id),
        ];
    }
}
