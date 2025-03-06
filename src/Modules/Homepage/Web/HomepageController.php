<?php

namespace Module\Homepage\Web;

use Hybridly\Contracts\HybridResponse;
use function Hybridly\view;

final class HomepageController
{
    public function index(): HybridResponse
    {
        return view('homepage::index');
    }
}
