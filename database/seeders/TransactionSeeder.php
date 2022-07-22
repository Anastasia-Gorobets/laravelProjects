<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Services\FillTransactionFromCsv;
class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fillTransactionCsv = new FillTransactionFromCsv('database/csv/transaction_report.csv');
        $fillTransactionCsv->importFile();
    }
}
