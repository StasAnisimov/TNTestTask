<?php

namespace App\Worker;

use App\Worker\Interfaces\DrawInterface,
    App\Worker\Interfaces\TalkWithManagerInterface;

class Designer extends AbstractWorker implements DrawInterface, TalkWithManagerInterface
{
}