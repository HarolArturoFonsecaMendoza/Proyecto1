<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use APP\Models\Proyecto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Proyecto::class;

     /*
     $table->string('nombre');
            $table->string('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');*/
    public function definition(): array
    {
        $opcionesProyectos= ['Juegos', 'Paginas Web', 'Aplicaciones',
        'Revision'];
        return [
            'nombre'=>fake()->randomElement($opcionesProyectos),
            'descripcion'=>fake()->paragraph(),
            'fecha_inicio'=>fake()->dateTimeBetween('-30 days', '+30 days'),
            'fecha_fin'=>fake()->dateTimeBetween('+30 days', '+60 days')
        ];
    }
}
