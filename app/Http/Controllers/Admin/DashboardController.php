<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Products;
use App\Models\BulkProducts;
use App\Models\Orders;
use App\Models\OrderDetails;


class DashboardController extends Controller
{
    /**
     * * Author : Firaz
     * Display dashboard
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * return all dashboard data
     *
     * @author  <Firaz>
     * @return  dashboard
     */
     public function index(Request $request)
     {
        
    
     
         return view('admin.dashboard');
     }
     public function createPDF() {
       die("kk");
        $data = Orders::all();
        dd("kk");
        // share data to view
        view()->share('employee',$data);
        $pdf = PDF::loadView('pdf_view', $data);
  
        // download PDF file with download method
        return response()->download($pdf);
      }
     

}
