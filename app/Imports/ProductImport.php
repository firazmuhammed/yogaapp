<?php

namespace App\Imports;

use App\Models\CsvData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel ,WithStartRow
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
//       print_r($row);exit(0);
        return new CsvData([
         'sku'  => $row['0'],
         'product_name'   => $row['1'],
         'product_type'   => $row['2'],
         'metal_type'    => $row['3'],
         'metal_color'  => $row['4'],
         'gross_weight'   => $row['5'],
         'gold_net_weight'  => $row['6'],
         'metal_price'   => $row['7'],
         'gold_purity'   => $row['8'],
         'image'    => $row['9'],
         'quantity'  => $row['10'],
         'making_charge'   => $row['11'],
         'gst'   => $row['12'],
         'description'  => $row['13'],
         'gender'   => $row['14'],
         'occasion'   => $row['15'],
         'collection'    => $row['16'],
         'category'  => $row['17'],
         'diamond_in_ct'   => $row['18'],
         'diamond_in_gram'    => $row['19'],
         'diamond_stone_price'  => $row['20'],
         'diamond_shape'   => $row['21'],
         'diamond_color'   => $row['22'],
         'diamond_clarity'   => $row['23'],
         'diamond_setting'   => $row['24']
        ]);
    }
}
