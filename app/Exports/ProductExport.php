<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection,withHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Product ID',
            'Name',
            'Price',
            'Old Price',
            'Currency',
            'Category',
            'Sub Category',
            'Sub Sub Category',
            'Available',
            'Picture',
            'Vendor',
            'Created At',
            'Updated At'
        ];
    }
}
