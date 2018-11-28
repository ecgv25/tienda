<?php
namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }
    
    public function export()
    {
        return $this->excel->download(new YourExport, 'users.xlsx');
    }
    
    public function import()
    {
        return $this->excel->import(new YourImport, 'users.xlsx');
    }
}
