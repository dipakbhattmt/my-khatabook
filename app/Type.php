<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Type extends Model
{
    //protected $fillable = ['name', 'consumer_number', 'user_id'];
    protected $guarded = [];

    public function activity()
    {
        $this->month = Carbon::now()->month;
        $this->year = Carbon::now()->year;
        return $this->hasMany(Activity::class)
            ->where('user_id', Auth::id())
            ->whereMonth('paid_at', $this->month)
            ->whereYear('paid_at', $this->year);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class)
            ->where('user_id', Auth::id());
    }

    public function information()
    {
        return $this->belongsTo(Information::class);
    }

    /**
     * @return array
     *
     * This purifies the data received from the user.
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }


}
