<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['schedule_id', 'patient_name'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
