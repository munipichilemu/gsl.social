<?php

namespace Database\Factories;

use App\Models\Beneficiario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

/**
 * @extends Factory<Beneficiario>
 */
class BeneficiarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $country = new Country('list');

        return [
            'rut' => fake()->rut(),
            'names' => fake()->firstName . ' ' . fake()->firstName,                // 2 nombres. TODO: Fijar el género antes de crear los nombres, y hacer un random entre 1 y 3 nombres.
            'lastname_1' => fake()->lastName(),
            'lastname_2' => fake()->lastName(),
            'address' => explode(',', fake()->address())[0],            // Nos quedamos con el nombre de la calle y el número de casa.
            'phone' => fake()->numberBetween(111111111, 999999999),     // Esto nos genera toda la parte que no involucra el prefijo universal.
            'nationality' => fake()->randomKey($country->getList()),               // Obtenemos la lista de países del paquete del listado de países, pero solo usamos sus keys.
            'annotations' => fake()->text()
        ];
    }
}
