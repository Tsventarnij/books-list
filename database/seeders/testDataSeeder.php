<?php

namespace Database\Seeders;

use App\Service\BooksParser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class testDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new BooksParser();
        $data = json_decode(Storage::disk('local')->get('json/books-data-source.json'));
        $service->importData($data);
    }
}
