<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Schedule,
    Service,
    Review,
    User
};
use Str;

class Book extends Model
{
    // use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'service_id',
        'invoice_number',
        'customer_name',
        'customer_phone',
        'vehicle_type',
        'vehicle_license_plate',
        'service_name',
        'service_vehicle',
        'service_size',
        'service_service',
        'service_type',
        'service_cost',
        'state',
        'receipt',
        'schedule_start_at',
        'schedule_end_at',
        'cancel_note'
    ];

    /**
     * All values for time (schedule).
     *
     * @var array
     */
    const TIMES = [
        '09:00',
        '09:30',
        '10:00',
        '10:30',
        '11:00',
        '11:30',
        '12:00',
        '12:30',
        '13:00',
        '13:30',
        '14:00',
        '14:30',
        '15:00',
        '15:30',
        '16:00',
        '16:30',
        '17:00',
        '17:30',
        '18:00',
        '18:30',
        '19:00',
        '19:30',
        '20:00',
        '20:30',
    ];

    /**
    * All values of state attribute.
    *
    * @var array
    */
    const STATE = [
        'new',
        'processed',
        'finished',
        'failed',
        'canceled'
    ];

    /**
     * Get the service that owns the book.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the customer that owns the book.
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    /**
     * Get the schedule associated with the book.
     */
    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }

    /**
     * Get the review associated with the book.
     */
    public function review()
    {
        return $this->hasOne(Review::class);
    }

    /**
     * Determine status of the book.
     *
     * @return string
     */
    public function getStatusAttribute()
    {
        return $this->state === 'new'
            ? 'baru dan sedang menunggu konfirmasi'
            : 'terkonfirmasi dan menunggu jadwal tiba';
    }

    /**
     * Determine if the status is new.
     *
     * @return bool
     */
    public function getIsNewAttribute()
    {
        return $this->state === 'new';
    }

    /**
     * Determine if the status is processed.
     *
     * @return bool
     */
    public function getIsProcessedAttribute()
    {
        return $this->state === 'processed';
    }

    /**
     * Determine if the status is processed.
     *
     * @return bool
     */
    public function getIsFinishedAttribute()
    {
        return $this->state === 'finished';
    }

    /**
     * Determine if the status is processed.
     *
     * @return bool
     */
    public function getIsCanceledAttribute()
    {
        return in_array($this->state, ['canceled', 'failed']);
    }

    /**
     * Determine if the status is processed and will be executed today.
     *
     * @return bool
     */
    public function getIsExecutedAttribute()
    {
        return $this->state === 'processed' && date('Y-m-d', strtotime($this->schedule_start_at)) == date('Y-m-d');
    }

    /**
     * Determine if the status is processed and will be executed today.
     *
     * @return bool
     */
    public function getIsFinishedOrCanceledAttribute()
    {
        return in_array($this->state, ['finished', 'canceled', 'failed']);
    }

    /**
     * Determine if the status is processed and will be executed today.
     *
     * @return bool
     */
    public function getNeedsToBeReviewedAttribute()
    {
        return $this->state === 'finished' && $this->review()->count() === 0;
    }

    /**
     * Determine if the status is processed and will be executed today.
     *
     * @return bool
     */
    public function getCanBeCanceledAttribute()
    {
        return ! in_array($this->state, ['finished', 'canceled', 'failed']) && is_null($this->cancel_note);
    }

    /**
     * Determine if the book can be finished.
     *
     * @return bool
     */
    public function getCanBeFinishedAttribute()
    {
        $allowed_date = date('Y-m-d') == date('Y-m-d', strtotime($this->schedule_start_at));
        $allowed_time = date('H:i') >= date('H:i', strtotime($this->schedule_start_at));
        return $this->state === 'processed' && $allowed_date && $allowed_time;
    }

    /**
     * Determine icon of the book.
     *
     * @return bool
     */
    public function getIconAttribute()
    {
        switch ($this->state) {
            case 'new':
                return '
                    <a href="'. route('books.show', $this->id) .'" class="avatar bg-light-primary">
                        <div class="avatar-content" data-toggle="tooltip" data-placement="right" title="" data-original-title="Baru">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square font-medium-3"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </div>
                    </a>
                ';
            case 'processed':
                return '
                    <a href="'. route('books.show', $this->id) .'" class="avatar bg-light-warning">
                        <div class="avatar-content" data-toggle="tooltip" data-placement="right" title="" data-original-title="Diproses">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader font-medium-3"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                        </div>
                    </a>
                ';
            case 'finished':
                return '
                    <a href="'. route('books.show', $this->id) .'" class="avatar bg-light-success">
                        <div class="avatar-content" data-toggle="tooltip" data-placement="right" title="" data-original-title="Selesai">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square font-medium-3"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        </div>
                    </a>
                ';
            case 'canceled':
                return '
                    <a href="'. route('books.show', $this->id) .'" class="avatar bg-light-danger">
                        <div class="avatar-content" data-toggle="tooltip" data-placement="right" title="" data-original-title="Batal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square font-medium-3"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                        </div>
                    </a>
                ';
            case 'failed':
                return '
                    <a href="'. route('books.show', $this->id) .'" class="avatar bg-light-danger">
                        <div class="avatar-content" data-toggle="tooltip" data-placement="right" title="" data-original-title="Batal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square font-medium-3"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                        </div>
                    </a>
                ';

            default:
                return '';
        }
    }

    /**
     * Get all possible values of service_vehicle attribute
     *
     * @return array
     */
    public static function getServiceVehiclePossibleValues()
    {
        return Service::VEHICLE;
    }

    /**
     * Get all possible values of service_size attribute
     *
     * @return array
     */
    public static function getServiceSizePossibleValues()
    {
        return Service::SIZE;
    }

    /**
     * Get all possible values of service_service attribute
     *
     * @return array
     */
    public static function getServiceServicePossibleValues()
    {
        return Service::SERVICE;
    }

    /**
     * Get all possible values of service_type attribute
     *
     * @return array
     */
    public static function getServiceTypePossibleValues()
    {
        return Service::TYPE;
    }

    /**
     * Get all next possible states of state attribute
     *
     * @return array
     */
    public function getNextPossibleStates()
    {
        $current_state = $this->attributes['state'];
        // 0 => 'new', 1 => 'processed', 2 => 'finished', 3 => 'failed', 4 => 'canceled'
        $states = self::STATE;
        $next_possible_states = [];

        if (! in_array($current_state, $states)) {
            return $next_possible_states;
        }

        switch ($current_state) {
            case $states[0]: // new
                $next_possible_states = [$state[1], $state[4]]; // processed, canceled
                break;
            case $states[1]: // processed
                $next_possible_states = [$state[2], $state[3], $state[4]]; // finished, failed, canceled
                break;

            default:
                break;
        }

        return $next_possible_states;
    }

    /**
     * Get all values for time (schedule).
     *
     * @param string $time (h:i) (above or equal this time)
     * @return array
     */
    public static function getTimes($time = null)
    {
        $times = self::TIMES;
        if ($time != null) {
            if ($key = array_search($time, $times)) {
                $times = array_slice($times, $key);
            }
        }
        return $times;
    }
}
