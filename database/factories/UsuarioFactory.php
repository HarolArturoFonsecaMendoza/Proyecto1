<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Usuario::class;
     /*$table->string('nombre');
      *$table->string('correo_electronico')->unique(); */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->firstName(),
            'correo_electronico'=>fake()->unique()->freeEmail()
        ];
    }
}
