<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormByUserSaved extends Model
{
    use HasFactory;

    protected $table = 'forms_by_users_saved';

    protected $fillable = [
        'user_id', 
        'nombre_pelicula',
        'foto_pelicula',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
