<?php

namespace App\Worker\Interfaces;


interface WorkerInterface
{
    public function canDo(string $jobName): bool;

    public function getAvailableTypeOfWorks(): string;
}