<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Service,
    Review
};

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
        'date',
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
     * Get the review associated with the book.
     */
    public function review()
    {
        return $this->hasOne(Review::class);
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
                $next_possible_states = [$state[2], $state[3], $state[4]]; // processed, failed, canceled
                break;

            default:
                break;
        }

        return $next_possible_states;
    }
}
