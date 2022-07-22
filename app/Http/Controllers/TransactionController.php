<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Services\FillTransactionFromCsv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index ()
    {
        return view('import_csv');

    }

    public function store(TransactionRequest $request){

        if($request->hasFile('csv')){
            $file = $request->file('csv');
            $fileName = 'csv.'.$file->guessExtension();
            Storage::disk('public')->putFileAs('csvFiles',$file,$fileName);

            $request->session()->flash('status','File was uploaded');

            $path ='public/storage/csvFiles/'.$fileName;
            $fillTransactionCsv = new FillTransactionFromCsv($path);
            $fillTransactionCsv->importFile();
        }

        return back();
    }
}
