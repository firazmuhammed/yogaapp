<?php

namespace App\Imports;

use App\Models\TempVariants;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class VariantsImport implements ToModel,WithStartRow
{
     public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TempVariants([
            'sku'  => $row['0'],
            'option'   => $row['1'],
            'option_value'  => $row['2'],
            'weight_in_gram'   => $row['3'],
            'metal_price'  => $row['4'],
            'default'   => $row['5']
        ]);
    }
}
