<?php

namespace Database\Seeders;

use App\Models\{
    Plan,
    Tenant
};
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '23882706000120',
            'name' => 'Ichaves',
            'url' => 'Ichaves',
            'email' => 'itamar@ichaves.com.br',
        ],
    
    [
            'cnpj' => '23882706000122',
            'name' => 'Loja',
            'url' => 'Loja',
            'email' => 'loja@ichaves.com.br',
    ]);
    }
}
