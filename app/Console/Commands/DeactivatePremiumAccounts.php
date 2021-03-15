<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PremiumAccount;
use App\Models\PremiumDeactivationJob;
use App\Models\User;
use Carbon\Carbon;

class DeactivatePremiumAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deactivate:premium';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate premium accounts which have been scheduled for deletion.';

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
        $currentTime = Carbon::now();
        $jobs = PremiumDeactivationJob::where('deactivation_date', '<', $currentTime)->get();
        $counter = 0;
        foreach($jobs as $job){
            $premium = PremiumAccount::where('id', '=', $job->premium_id)->first();
            $premium->active = false;
            $premium->deactivation_job = null;
            $premium->next_payment = $currentTime;
            $premium->update();
            $job->delete();
            $counter++;
        }
        $this->info("Deactivated " . $counter . " premium accounts.");
    }
}
