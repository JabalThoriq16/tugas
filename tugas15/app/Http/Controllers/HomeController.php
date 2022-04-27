<?php

namespace App\Http\Controllers;

// use DB;
use Illuminate\Http\Request;
use DB;
use App\Models\Member;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Catalog;
use App\Models\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $total_member =Member::count();
       $total_book =Book::count();
       $total_tarnsaction =Transaction::whereMonth('date_start' , date('m')) ->count();
       $total_publisher =Publisher::count();

       $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))
       ->groupBy('publisher_id')
       ->orderBy('publisher_id','asc')
       ->pluck('total');

       $label_donut= Publisher::orderBy('publishers.id', 'asc')->join('books','books.publisher_id', '=', 'publishers.id')->groupBy('publishers.name')->pluck('publishers.name');
       $label_bar= ['Trancation'];
       $data_label=[];

       foreach($label_bar as $key => $value){
        $data_bar[$key]['lebel']=$label_bar[$key];
        $data_bar[$key]['backgroundColor'] = 'rgba(60,141,188,0,9)';
        $data_month =[];

        foreach (range(1,12) as $month){
            $data_month[]=Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
        }
        $data_bar[$key]['data']=$data_month;
       }
       

    //    return $data_bar;
        return view('home', compact('total_member','total_book','total_tarnsaction','total_publisher','data_donut','label_donut','label_bar','data_label','data_bar','label_bar'));
    }
}
