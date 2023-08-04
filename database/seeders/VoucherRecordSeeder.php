<?php

namespace Database\Seeders;


use App\Models\VoucherRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VoucherRecord::factory(20)->create();
        foreach (VoucherRecord::all() as $key => $VoucherRecord) {
            $voucher =  $VoucherRecord->Vouncher;
            $voucher->total +=  $VoucherRecord->cost;
            $voucher->net_total = $voucher->total  + ($voucher->total * ($voucher->tax / 100));
            $voucher->update();
        }
    }
}
