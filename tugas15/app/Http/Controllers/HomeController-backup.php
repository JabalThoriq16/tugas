<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\DB;
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
        // $member = Member::with('user')->get();
        // $book = Book::with('publisher')->get();
        // $publisher = Publisher::all();

        //no 1
        $data = Member::select('*')
            ->join('users', 'users.member_id','=','members.id')
            ->get();

        //no 2
        $data2 = Member::select('*')
            ->leftjoin('users', 'users.member_id','=','members.id')
            ->where('users.id',NULL)
            ->get();

        $data3 = Transaction::select('members.id','members.name')
            ->rightjoin('members','members.id','=','transactions.member_id')
            ->where('transactions.member_id', NULL)
            ->get();

        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
            ->join('transactions','transactions.member_id','=','members.id')
            ->orderBy('members.id','asc')
            ->get();
        
        $data5 = Member::select('members.id', 'members.name', 'members.phone_number','transaction_details.transaction_id')
            ->join('transactions','transactions.member_id','=','members.id')
            ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
            ->groupBy('members.name','members.id', 'members.phone_number','transaction_details.transaction_id')
            ->havingraw('count(transactions.transaction_id)','>',1)
            ->orderBy('members.id','asc')
            ->get();

        $data6 = Member::select('members.id', 'members.name', 'members.phone_number','date_start','date_end')
            ->join('transactions','transactions.member_id','=','members.id')
            ->get();

        $data7 = Member::select('members.id', 'members.name', 'members.phone_number','date_start','date_end')
            ->join('transactions','transactions.member_id','=','members.id')
            ->whereraw('month(date_end)','=',6)
            ->get();

        $data8 = Member::select('members.id', 'members.name', 'members.phone_number','date_start','date_end')
            ->join('transactions','transactions.member_id','=','members.id')
            ->whereraw('month(date_start)','=',5)
            ->get();

        $data9 = Member::select('members.id', 'members.name', 'members.phone_number','date_start','date_end')
            ->join('transactions','transactions.member_id','=','members.id')
            ->whereraw('month(date_start)','=',6,'and','month(date_end)','=',6) 
            ->get();
        
        $data10 = Member::select('members.id', 'members.name', 'members.phone_number','date_start','date_end')
            ->join('transactions','transactions.member_id','=','members.id')
            ->where('members.alamat','LIKE','%bandung%') 
            ->get();
        $data11 = Member::select('members.id', 'members.name', 'members.phone_number','date_start','date_end')
            ->join('transactions','transactions.member_id','=','members.id')
            ->where('members.alamat','LIKE','%bandung%','and','mamber.gander','=','p') 
            ->get();
        
        $data12 = Member::select('members.id', 'members.name', 'members.phone_number','date_start','date_end')
            ->join('transactions','transactions.member_id','=','members.id')
            ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
            ->where('transaction_details.qty','>','1') 
            ->get();

        $data13 = Member::selectraw('members.id', 'members.name', 'members.phone_number','date_start','date_end','books.isbn','qty','title','price','(qty*price) as total')
            ->join('transactions','transactions.member_id','=','members.id')
            ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
            ->join('books','transaction_details.isbn','books.isbn')
            ->get();
        
        $data14 = Member::select('members.id', 'members.name', 'members.phone_number','date_start','date_end','books.isbn','qty','title','price','publishers.name','authors.name','catalogs.name')
            ->join('transactions','transactions.member_id','=','members.id')
            ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
            ->join('books','transaction_details.isbn','books.isbn')
            ->get();

        $data15 = Catalog::select('catalogs.id','catalogs.name')
            ->rightjoin('books','books.catalog_id','catalogs.id')
            ->get();

        $data16 = Book::select('books.isbn','title','books.publisher_id','books.author_id','books.catalog_id','qyt','price','publishers.name')
            ->leftjoin('publishers','publishers.id','books.publisher_id')
            ->get();

        $data17 = Book::select('*')
            ->where('author_id','=','PG05')
            ->get();
        
        $data18 = Book::select('*')
            ->where('price','>',10000)
            ->get();

        $data19 = Book::select('*')
            ->where('author_id','like','%051%','and','qyt','>','10')
            ->get();

        $data20 = Member::select('*')
            ->whereraw('month(date_start)','=',6)
            ->get();

        return $data5;
        return view('home');
    }
}
