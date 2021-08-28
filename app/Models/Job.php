<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'last_date'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usersApplied()
    {
        return $this->belongsToMany(User::class, 'jobs_users')->withTimestamps();
    }

    public function usersFavorite()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function isApplied($user = null){
        $user = $user ?? auth()->user();
        return $user->jobsApplied->contains('id' , $this->id);
    }

    public function isSaveByUserAlready(User $user = null)
    {
        $user = $user ?? auth()->user();
        return $this->usersFavorite->contains('id', $user->id);
    }


}
