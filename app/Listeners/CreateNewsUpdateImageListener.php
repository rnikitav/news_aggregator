<?php

namespace App\Listeners;

use App\Models\News;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateNewsUpdateImageListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (isset($event->news) && $event->news instanceof News) {
            if (empty($event->news->img)){
                $event->news->img = 'img';
                $event->news->save();
            }
        }
    }
}
