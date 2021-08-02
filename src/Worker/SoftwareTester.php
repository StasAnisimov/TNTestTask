<?php

namespace App\Worker;

use App\Worker\Interfaces\SetTaskInterface,
    App\Worker\Interfaces\TalkWithManagerInterface,
    App\Worker\Interfaces\TestCodeInterface;

class SoftwareTester extends AbstractWorker implements TestCodeInterface, TalkWithManagerInterface, SetTaskInterface
{
}