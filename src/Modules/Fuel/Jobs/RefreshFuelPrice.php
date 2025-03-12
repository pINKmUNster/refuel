<?php

namespace Module\Fuel\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

final class RefreshFuelPrice implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {

    }
}
