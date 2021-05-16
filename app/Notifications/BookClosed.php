<?php

namespace App\Notifications;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookClosed extends Notification implements ShouldQueue
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
                ->greeting('Bookingan Telah selesai!')
                ->line('Anda memiliki 1 bookingan yang telah selesai. Mohon berikan ulasan terbaik Anda dengan klik tombol di bawah ini')
                ->action('Review Bookingan', $url);
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
            'message_title' => 'Bookingan Telah selesai!',
            'message_description' => 'Ayo berikan ulasan terbaikmu!',
            'icon_html' => '<div class="avatar bg-light-success">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square avatar-icon"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                </div>
                            </div>',
            'url' => route('books.show', $this->book->id),
        ];
    }
}
