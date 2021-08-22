<?php

namespace App\Http\Traits;

trait UserTrait
{

    public function isSeeker()
    {
        return $this->user_type === 'seeker';
    }

    public function isEmployer()
    {
        return $this->user_type === 'employer';
    }

}
