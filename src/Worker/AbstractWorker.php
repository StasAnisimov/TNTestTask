<?php

namespace App\Worker;

use App\Worker\Interfaces\DrawInterface,
    App\Worker\Interfaces\SetTaskInterface,
    App\Worker\Interfaces\TalkWithManagerInterface,
    App\Worker\Interfaces\TestCodeInterface,
    App\Worker\Interfaces\WorkerInterface,
    App\Worker\Interfaces\WriteCodeInterface;

abstract class AbstractWorker implements WorkerInterface
{
    const JOBS_LIST = [
        'draw' => DrawInterface::class,
        'writeCode' => WriteCodeInterface::class,
        'talkWithManager' => TalkWithManagerInterface::class,
        'testCode' => TestCodeInterface::class,
        'setTask' => SetTaskInterface::class
    ];

    public function canDo(string $jobName): bool
    {
        $result = false;

        if(isset(self::JOBS_LIST[$jobName])) {
            $job = self::JOBS_LIST[$jobName];
            $result = $this instanceof $job;
        }

        return $result;
    }

    public function getAvailableTypeOfWorks(): string
    {
        $availableTypeOfWorks = "\n";

        if($this instanceof DrawInterface) {
            $availableTypeOfWorks .= "Drawing \n";
        }
        if ($this instanceof WriteCodeInterface) {
            $availableTypeOfWorks .= "Writing code \n";
        }
        if ($this instanceof TalkWithManagerInterface) {
            $availableTypeOfWorks .= "Talking with manager \n";
        }
        if ($this instanceof TestCodeInterface) {
            $availableTypeOfWorks .= "Testing code \n";
        }
        if ($this instanceof SetTaskInterface) {
            $availableTypeOfWorks .= "Setting tasks \n";
        }

        return $availableTypeOfWorks;
    }
}