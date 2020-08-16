<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionApply extends Model
{
    protected $table = 'admission_apply';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'enroll_in', 'details'];
}
