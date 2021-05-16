<?php

namespace App\Notifications;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;

class TodayBooks extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The new book
     *
     * @var App\Models\Book
     */
    private $books;

    /**
     * Create a new notification instance.
     *
     * @param Illuminate\Support\Collection $book Collection of App\Models\Book
     * @return void
     */
    public function __construct(Collection $books)
    {
        $this->books = $books;
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
        $books = $this->books->where('customer_id', $notifiable->id);
        $url = route('books.index');

        return (new MailMessage)
                ->greeting('Jadwal Bookingan Anda telah tiba!')
                ->line('Anda memiliki '. $books->count() .' bookingan yang siap dilayani hari ini. Silahkan klik tombol di bawah ini untuk melihat rinciannya')
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
        $books = $this->books->where('customer_id', $notifiable->id);
        return [
            'message_title' => 'Jadwal Bookingan Anda telah tiba!',
            'message_description' => 'Anda memiliki '. $books->count() .' bookingan yang siap dilayani hari ini!',
            'icon_html' => '<div class="avatar bg-light-warning">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crosshair avatar-icon"><circle cx="12" cy="12" r="10"></circle><line x1="22" y1="12" x2="18" y2="12"></line><line x1="6" y1="12" x2="2" y2="12"></line><line x1="12" y1="6" x2="12" y2="2"></line><line x1="12" y1="22" x2="12" y2="18"></line></svg>
                                </div>
                            </div>',
            'url' => route('books.index'),
        ];
    }
}
