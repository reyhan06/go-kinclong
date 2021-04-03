<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Book;

class Schedule extends Model
{
    // use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id',
        'book_code',
        'duration',
        'start_at',
        'end_at',
        'reserved',
    ];

    /**
     * Get the book that owns the schedule.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get duration (in minutes) between two datetimes
     *
     * @param string $start_at
     * @param string $end_at
     * @return int
     */
    public static function getDuration($start_at, $end_at)
    {
        $start_at = new Carbon(strtotime($start_at));
        $end_at = new Carbon(strtotime($end_at));

        return $start_at->diffInMinutes($end_at);
    }
}
