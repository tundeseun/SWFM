<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'code' => $row[1],
            'brand_id' => $row[2],
            'category_id' => $row[3],
            'unit_id' => $row[4],
            'quantity' => $row[5],
        ]);
    }
}
