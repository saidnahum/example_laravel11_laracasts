Diferencia entre prop y attributes
- Prop: Es un valor que se pasa al componente y se usa dentro de él.
- Attributes: Son atributos HTML que se pasan al componente y se aplican al elemento HTML generado

Cuando se utilizan los dos puntos(:) antes de un prop por ejemplo (:active) trata al prop como una expresión y no como un estring, asi se pueden pasar propr booleanos

- MVC
Modelo: Representa la persistencia de los datos y el modelo de negocio
Vista:
Controlador

- Migraciones
php artisan migrate:fresh corre todas las migraciones eliminando todos los datos de la db y atualizando solo el archivo de migraciones


class Job extends Model { // El nombre de la clase debe coincidir con el nombre de la tabla en plural por convención, pero aquí lo dejamos como singular para que coincida con el ejemplo original.
    // Si la tabla no sigue la convención de pluralización, se puede especificar el nombre de la tabla manualmente:
    // protected $table = 'job_listings'; // Descomentar si la tabla se llama 'job_listings' en lugar de 'job_listing'.
    protected $table = "job_listing";

    protected $fillable = ['title', 'salary']; // Son sólo los campos que se pueden asignar masivamente para evitar problemas de seguridad.
}

Las factories se utilizan para generar datos de exemplo para la DB

// Crear varios elementos en la DB con factory
App\Models\User::factory()->create();

$job = App\Models\Job::first();
$job->employer;
$job->employer->name;

Para crear una relación entre 2 tablas se debe gerar una table pivote que junte a dichas tablas.

-El problema N1+ radica en que cada recorrido de cada registros genera una query, entonces si tienes
100 registros se generarán 100 queries, es por eso qu entra el LazyLoading.

$jobs = Job::all(); // Hace una query por cada indice de employer
$jobs = Job::with('employer')->get(); // Hace una sola query recorriend cada indice de employer

-En el archivo App/Providers/AppServiceProvider.php se configuran las opciones de laravel

-Para agregar paginación al fetch de los datos se utiliza lo siguiente
$jobs = Job::with('employer')->paginate(5);
$jobs = Job::with('employer')->simplePaginate(5); // Sólo genera los botones de Anterior y Siguiente
$jobs = Job::with('employer')->cursorPaginate(5); // Genera las queries al hacer hover sobre los links de paginación (Prevous, Next)

- $job = Job::findOrFail($id) Sirve para que al buscar un id que no exista no devuelva null y se estropee la app
