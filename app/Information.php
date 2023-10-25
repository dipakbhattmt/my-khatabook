<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Information extends Model
{
    protected $guarded = [];

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

}
