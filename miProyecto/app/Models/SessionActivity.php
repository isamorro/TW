<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionActivity extends Model
{
    protected $table = 'sessions_activities';

    protected $fillable = [
        'activity_id',
        'installation_id',
        'date',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function installation()
    {
        return $this->belongsTo(Installation::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'session_id');
    }

    // Plazas libres en esta sesión
    public function plazasDisponibles()
    {
        return $this->activity->capacity - $this->reservations()->where('status', 'active')->count();
    }
}