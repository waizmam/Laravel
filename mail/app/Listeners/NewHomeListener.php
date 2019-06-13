<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\HomeEvent;

class NewHomeListener
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
     * @param  HomeEvent  $event
     * @return void
     */
    public function handle(HomeEvent $event)
    {
        info("Entrou no home 2 - NewHomeListener");
        info($event->text);
    }
}
