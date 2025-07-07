<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model {
    use HasFactory;

    // El nombre de la clase debe coincidir con el nombre de la tabla en plural por convención, pero aquí lo dejamos como singular para que coincida con el ejemplo original.
    // Si la tabla no sigue la convención de pluralización, se puede especificar el nombre de la tabla manualmente:
    // protected $table = 'job_listings'; // Descomentar si la tabla se llama 'job_listings' en lugar de 'job_listing'.
    protected $table = "job_listing";

    protected $fillable = ['title', 'salary']; // Son sólo los campos que se pueden asignar masivamente para evitar problemas de seguridad.
}

// class Job {
//     public static function all(): array {
//         return [
//             [
//                 'id' => 1,
//                 'title' => 'Director',
//                 'salary' => '$50,000'
//             ],
//             [
//                 'id' => 2,
//                 'title' => 'Programmer',
//                 'salary' => '$40,000'
//             ],
//             [
//                 'id' => 3,
//                 'title' => 'Teacher',
//                 'salary' => '$20,000'
//             ]
//             ];
//     }

//     public static function find(int $id): array
//     {
//         $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);
//         //$job = collect($jobs)->firstWhere('id', $id);

//         if(! $job){
//             abort(404);
//         }
//
//         return $job;
//     }
// }
