<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\sendEmailTest;
use App\Jobs\SendEmailJob;

use Carbon\Carbon;

class sendMailController extends Controller
{
 	public function getSendMail () {
 		$details['email'] = 'cuong1997565@gmaiil.com';
 		dispatch(new sendEmailTest($details));
 	}

 	public function getSendEmailJob () {
 		// $job = (new SendEmailJob())->delay(Carbon::now()->addSeconds(5));
 		$job = (new SendEmailJob());
 		dispatch($job);
 		return 'Email is Send Properly';
 	}
}
