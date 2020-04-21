<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'phone_number', 'address',
        'bio', 'professional_summary', 'hourly_rate'
    ];
    /**
     * Create One to one relationship with users table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
