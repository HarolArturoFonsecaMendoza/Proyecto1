<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tarea;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarea>
 */
class TareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tarea::class;

    /** 
     *  $table->string('nombre');
            *$table->string('descripcion');
            *$table->string('estado');
            *$table->date('fecha_inicio');
            *$table->date('fecha_fin');
        */
    public function definition(): array
    {
        $opcionesTexto = ['En proceso', 'Pendiente', 'Casi terminado',
        'Terminado'];
        $opcionesTareas= ['Creacion', 'Diseño', 'Codificacion',
        'Revision','Apoyo'];
        return [

            'nombre'=>fake()->randomElement($opcionesTareas),
            'descripcion'=>fake()->text(),
            'estado'=>fake()->randomElement( $opcionesTexto), 
             'fecha_inicio'=>fake()->dateTimeBetween('-30 days', '+30 days'),
             'fecha_fin'=>fake()->dateTimeBetween('+30 days', '+60 days'),
             'usuario_id'=>fake()->numberBetween(1,50), 'proyecto_id'=>fake()->numberBetween(1,50)
        ];
    }
}
