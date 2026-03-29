<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model {
    
    // Table name in database
    protected $table = 'tbluserjob';
    
    // Primary key
    protected $primaryKey = 'jobid';
    
    // Fields that can be filled
    protected $fillable = [
        'jobname'
    ];

    // Disable timestamps (no created_at/updated_at)
    public $timestamps = false;
}