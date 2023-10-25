<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    protected $with = ['type', 'activity', 'tasks', 'budget', 'income'];
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function activity(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    public function type(): HasMany
    {
        return $this->hasMany(Type::class)->orderBy('name');
    }

    public function budget(): HasOne
    {
        return $this->hasOne(Budget::class);
    }

    public function income(): HasMany
    {
        return $this->hasMany(Income::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function isAdmin(): bool
    {
        return $this->admin;
    }

    public function activityForDay(int $day): Collection
    {
        $date = Carbon::now();
        return $this->getBaseActivityQuery($date->month, $date->year)->whereDay('paid_at', $day)->get();
    }

    public function activityForMonth($month = null, $year = null): Collection
    {
        return $this->getBaseActivityQuery($month, $year)->get();
    }

    public function getBaseActivityQuery($month = null, $year = null): HasMany
    {

        return $this->activity()
            ->whereMonth('paid_at', $month)
            ->whereYear('paid_at', $year);
    }
}
