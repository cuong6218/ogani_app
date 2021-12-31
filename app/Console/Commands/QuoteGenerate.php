<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class QuoteGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:add';

    /**
     * The console command description.
     *
     * @var string
     */
    private $quotes = array(
        "People don't want to go to the dump and have a picnic, they want to go out to a beautiful place and enjoy their day. And so I think our job is to try to take the environment, take what the good Lord has given us, and expand upon it or enhance it, without destroying it.",
        "There are always new places to go fishing. For any fisherman, there's always a new place, always a new horizon.",
        "The proper function of man is to live, not to exist. I shall not waste my days in trying to prolong them. I shall use my time.",
        "Yesterday's the past, tomorrow's the future, but today is a gift. That's why it's called the present.",
        "The youth is the hope of our future."
    );
    protected $description = 'Generate some dumpest quotes!!!';

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
        DB::table('dumpest_quotes')->insert(['quote' => $this->quotes[rand(0, 4)], 'created_at' => date('Y-m-d h:i:s', time())]);
        $this->info("generate data success!");
    }
}
