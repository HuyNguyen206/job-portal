<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

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

    public function isApplied($user = null){
        $user = $user ?? auth()->user();
        return $user->jobsApplied->contains('id' , $this->id);
    }


}
