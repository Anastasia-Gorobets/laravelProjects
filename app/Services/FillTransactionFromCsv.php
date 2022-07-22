<?php


namespace App\Services;


use App\Models\Transaction;

class FillTransactionFromCsv
{

    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function importFile()
    {
        Transaction::truncate(); //clear all table data
        $csvData = fopen(base_path($this->path), 'r');
        $transRow = true;

        while (($data = fgetcsv($csvData, null, ',')) !== false) {
            if (!$transRow) {
                Transaction::create([
                    'transaction_date' => $data['0'],
                    'price' => $data['1'],
                    'payment_type' => $data['2'],
                    'name' => $data['3'],
                    'city' => $data['4'],
                    'us_zip' => $data['5'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);

    }


}
