<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model {
    use HasFactory;
    protected $table = "job_listing";
    protected $fillable = ['title', 'salary']; // Son sólo los campos que se pueden asignar masivamente para evitar problemas de seguridad.

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}

// El nombre de la clase debe coincidir con el nombre de la tabla en plural por convención, pero aquí lo dejamos como singular para que coincida con el ejemplo original.
// Si la tabla no sigue la convención de pluralización, se puede especificar el nombre de la tabla manualmente:
// protected $table = 'job_listings'; // Descomentar si la tabla se llama 'job_listings' en lugar de 'job_listing'.
