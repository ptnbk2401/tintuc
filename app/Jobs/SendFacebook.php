<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendFacebook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (! app()->environment('production')) {
            Log::info("Facebook Posting");
            return;
        }

        $fb = new \Facebook\Facebook([
          'app_id' => config('services.facebook.app_id'),
          'app_secret' => config('services.facebook.app_secret'),
          'default_graph_version' => 'v2.10',
          'default_access_token' => config('services.facebook.access_token'),
        ]);

        $linkData = [
         'link' => $this->post->url,
        //  'message' => $this->toMessage($this->post)
        ];


        try {
         $response = $fb->post('/me/feed',$linkData);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            return false;
         exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            return false;
         exit;
        }
        return true;
    }
    
}
