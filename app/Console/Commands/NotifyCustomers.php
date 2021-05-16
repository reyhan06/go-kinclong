<?php

namespace App\Console\Commands;

use App\Models\{
    Book,
    User
};
use App\Notifications\TodayBooks;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class NotifyCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'book:notify-customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify customer if there is any book that will be executed today';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $books = Book::where('state', 'processed')->whereDate('schedule_start_at', today())->get();
        if($books->isEmpty()) {
            return 0;
        };
        $customer_ids = $books->pluck('customer_id')->unique();
        $customers = User::find($customer_ids->toArray());
        if ($customers->isEmpty()) {
            return 0;
        }
        Notification::send($customers, new TodayBooks($books));
    }
}
