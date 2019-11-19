<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarcodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barcodes = [
            [
                'code' => '6917790974517',
                'msg' => 'Acceptable in your bin!
Made from mostly paper, the high-quality materials used in cartons make them very desirable for remanufacturing into new products. Empty and rinse the cartoon Try to remove any plastic tap around it, if applicable. Toss in your recyclable bin (:',
            ],
            [
                'code' => '6221011000344',
                'msg' => 'Acceptable in your bin!
Empty and rinse the bottle Try to remove any crunchy plastic wrapping around the bottle top, if applicable.
Make sure to remove any solution remains!
Toss in your recyclable bin (:'
            ],
            [
                'code' => '6223001360056',
                'msg' => 'Acceptable in your bin!
Empty and rinse the bottle Try to remove any crunchy plastic wrapping around the bottle top, if applicable.
Make sure to remove any solution remains!
Toss in your recyclable bin (:'
            ],
            [
                'code' => '6223001361817',
                'msg' => 'Acceptable in your bin!
Empty and rinse the bottle Try to remove any crunchy plastic wrapping around the bottle top, if applicable.
Make sure to remove any solution remains!
Toss in your recyclable bin (:'
            ],
            [
                'code' => '6772504416765',
                'msg' => 'Acceptable in your bin!
Made from mostly paper, these products are very desirable for remanufacturing into new products. There is also the cover to consider, since it may contain plastic, cloth, leather, or other non-paper bookbinding materials. 
Toss in your recyclable bin (:'
            ],
            [
                'code' => '6221031490132',
                'msg' => 'Trash it !
Cannot go into your recycle bin, since most of these bags are made from aluminum laminated with polypropylene, also known as metalized polypropylene, or low-density polyethylene film.
Do not Toss in your recyclable bin ):'
            ],
            [
                'code' => '6224009136124',
                'msg' => 'Trash it !
Not acceptable in your bin. As the soft plastic around are not acceptable in our recycling configurations.
Do not Toss in your recyclable bin ):'
            ],
            [
                'code' => '6224008904021',
                'msg' => 'Trash it !
Cannot go into your recycle bin, since most of these bags are made from aluminum laminated with polypropylene, also known as metalized polypropylene, or low-density polyethylene film.
Do not Toss in your recyclable bin ):'
            ],
            [
                'code' => '6221031490354',
                'msg' => 'Trash it !
Cannot go into your recycle bin, since most of these bags are made from aluminum laminated with polypropylene, also known as metalized polypropylene, or low-density polyethylene film.
Do not Toss in your recyclable bin ):'
            ],
            [
                'code' => '6221048720659',
                'msg' => 'Acceptable in your bin!
Made from mostly paper, the high-quality materials used in cartons make them very desirable for remanufacturing into new products. Empty and rinse the cartoon Try to remove any plastic tap around it, if applicable. Toss in your recyclable bin (:'
            ],
            [
                'code' => '6293517508105',
                'msg' => 'Trash it !
Not acceptable in your bin. deodorant sprays are considered hazardous waste.
Don not toss in your recyclable bin ):'
            ],
            [
                'code' => '3610340552380',
                'msg' => 'Acceptable in your bin!
Empty and rinse the bottle Try to remove any crunchy plastic wrapping around the bottle top, if applicable.
Make sure to remove any solution remains!
Toss in your recyclable bin (:'
            ],
            [
                'code' => '6223000760413',
                'msg' => 'Trash it !
Cannot go into your recycle bin, since most of these bags are made from aluminum laminated with polypropylene, also known as metalized polypropylene, or low-density polyethylene film.
Do not Toss in your recyclable bin ):'
            ],
            [
                'code' => '6223001386469',
                'msg' => 'Acceptable in your bin!
Acceptable in your bin if the product has limited grease. Remove any solution scraps.
Toss in your recyclable bin (:'
            ],
            [
                'code' => '6949777620117',
                'msg' => 'Acceptable in your bin!
Make sure to remove any product remains.
Toss in your recyclable bin (:'
            ],
            [
                'code' => '6221048322129',
                'msg' => 'Acceptable in your bin if the product has limited grease. Remove any solution scraps.
Toss in your recyclable bin (:'
            ],
            [
                'code' => '6300020153941',
                'msg' => 'Trash it !
Not acceptable in your bin. deodorant sprays are considered hazardous waste.
Don not toss in your recyclable bin ):'
            ],
            [
                'code' => '5321122310095',
                'msg' => 'Acceptable in your bin!
Made from mostly paper , these products are very desirable for remanufacturing into new products. There is also the cover to consider, since it may contain plastic, cloth, leather, or other non-paper bookbinding materials. 
Toss in your recyclable bin (:'
            ],
            [
                'code' => '6221133001700',
                'msg' => 'Acceptable in your bin!
Made from mostly paper , these products are very desirable for remanufacturing into new products. There is also the cover to consider, since it may contain plastic, cloth, leather, or other non-paper bookbinding materials. 
Toss in your recyclable bin (:'
            ],
            [
                'code' => '6223001876045',
                'msg' => 'Acceptable in your bin!
Cartons like those used for milk, juice, soy or grain milk and soup are recyclable.
Make sure to remove any food remains!
Toss in your recyclable bin (:'
            ],
        ];

        foreach ($barcodes as $barcode)
            DB::table('barcodes')->insert($barcode);
    }
}
