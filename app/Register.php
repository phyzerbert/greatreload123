<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $guarded = [];

    public function phone_model() {
        return $this->belongsTo(PhoneModel::class);
    }
}
