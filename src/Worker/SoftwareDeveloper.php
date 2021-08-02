<?php

namespace App\Worker;


use App\Worker\Interfaces\TalkWithManagerInterface,
    App\Worker\Interfaces\TestCodeInterface,
    App\Worker\Interfaces\WriteCodeInterface;

class SoftwareDeveloper extends AbstractWorker implements WriteCodeInterface, TestCodeInterface, TalkWithManagerInterface
{
}