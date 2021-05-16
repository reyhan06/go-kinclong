<?php

namespace App\Notifications;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBook extends Notification implements ShouldQueue
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
                ->greeting('Bookingan Baru!')
                ->line('Anda memiliki 1 bookingan baru!')
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
            'message_title' => 'Bookingan Baru!',
            'message_description' => 'Anda memiliki 1 bookingan baru!',
            'icon_html' => '<div class="avatar bg-light-primary">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square avatar-icon"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                </div>
                            </div>',
            'url' => route('books.show', $this->book->id),
        ];
    }
}
