<?php

namespace Database\Seeds;

use App\Models\Model;
use App\Models\Setting\Currency;
use Illuminate\Database\Seeder;

class Currencies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->create();

        Model::reguard();
    }

    private function create()
    {
        $company_id = $this->command->argument('company');

        $rows = [
            [
                'company_id' => $company_id,
                'name' => trans('demo.currencies_npr'),
                'code' => 'NPR',
                'rate' => '1.00',
                'enabled' => '1',
                'precision' => config('money.NPR.precision'),
                'symbol' => config('money.NPR.symbol'),
                'symbol_first' => config('money.NPR.symbol_first'),
                'decimal_mark' => config('money.NPR.decimal_mark'),
                'thousands_separator' => config('money.NPR.thousands_separator'),
            ]
        ];

        foreach ($rows as $row) {
            Currency::create($row);
        }
    }
}
