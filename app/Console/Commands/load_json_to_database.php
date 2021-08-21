<?php

namespace App\Console\Commands;

use App\Models\TradeInfo;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class load_json_to_database extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'json:db {--filename=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Json to db. File should be in public/storage folder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filename = $this->option('filename');
        if ($filename){
            $name=$filename;
        } else {
            $name = $this->ask('Enter your json file name');
        }
        try {
            $all_data = Storage::disk('public')->get($name);
        } catch (FileNotFoundException $e){
            $this->info('Cannot find your json file. Please try again');
            return 0;
        }

        $all_data = json_decode($all_data, true);
        $this->info('Sending to database...');
        $chunk_data = array_chunk($all_data,500);
        $total = round((int)count($all_data)/500);
        $this->info('Sending to database...');
        foreach ($chunk_data as $count=>$chunk ) {
            $this->info('Progress: ' . floor(((($count+1) / $total) * 100)).'%');
            foreach ($chunk as $data){

                TradeInfo::create([
                    'date' => $data['date'],
                    'trade_code' => $data['trade_code'],
                    'high' => str_replace( ',', '', $data['high'] ) > 0 ? str_replace( ',', '', $data['high'] ) : 0.0,
                    'low' => str_replace( ',', '', $data['low'] )> 0 ? str_replace( ',', '', $data['low'] ) : 0.0,
                    'open' => str_replace( ',', '', $data['open'] ) > 0 ? str_replace( ',', '', $data['open'] ) : 0.0,
                    'close' => str_replace( ',', '', $data['close'] ) > 0 ? str_replace( ',', '', $data['close'] ) : 0.0,
                    'volume' => str_replace( ',', '', $data['volume'] ),
                ]);
            }

//            TradeInfo::insert($data);

        }
        $this->info('Completed');
        return 0;
    }
}
