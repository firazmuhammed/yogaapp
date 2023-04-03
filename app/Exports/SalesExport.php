<?php

namespace App\Exports;

use App\Models\Orders;
use App\Models\Products;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($startDate, $endDate ,$distinctCategories ,$distinctProducts)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->distinctProducts = $distinctProducts;
        $this->distinctCategories = $distinctCategories;
    }

    public function collection()
    {
          return Orders::select('orders.id','users.name as username','users.email as useremail','orders.order_amount','orders.order_status')
                       ->join('users','users.id','=','orders.user_id')
                       ->whereDate('orders.created_at','>=',$this->startDate)
                       ->whereDate('orders.created_at','<=',$this->endDate)
                       ->where('orders.order_status','=', 'Delivered')
                       ->where('orders.payment_status','=', 'Paid') 
                       ->whereIn('orders.id',$this->distinctCategories)
                       ->whereIn('orders.id',$this->distinctProducts)->get(); 
    }

    public function headings(): array
    {
        return ["Order ID", "Name", "Email","Amount","Status"];
    }
}
