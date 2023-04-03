<?php

namespace App\Imports;

use App\Models\TempImages;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImageImport implements ToModel,WithStartRow
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
        return new TempImages([
           'sku'  => $row['0'],
           'image'   => $row['1'],
        ]);
    }
}
