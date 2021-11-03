<?php

namespace App\Listeners;

use App\Events\logHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class storeUserLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  logHistory  $event
     * @return void
     */
    public function handle(logHistory $event)
    {
//        $current_timestamp = Carbon::now()->toDateTimeString();
//        $userInfor = $event->loginHistory;
//        $saveHistory  = DB::table('login_history')->insert([
//            'user_id' => auth()->id(),
//            'user_agent' => request()->header('User-Agent'),
//            'ip_address' => request()->ip(),
//            'email' =>  $userInfor->email,
//            'name' =>  $userInfor->name,
//        ]);
//
//        return $saveHistory;

        $event->loginHistory->insert([

            'user_id' => auth()->id(),
            'user_agent' => request()->header('User-Agent'),
            'ip_address' => request()->ip(),
            'email' => request()->input('email'),
            'name' => auth()->user()->name,

        ]);

    }
}
