<?php

namespace App\Factory\Interfaces;

use App\Worker\Interfaces\WorkerInterface;

interface WorkerFactoryInterface
{
    public function createWorker(string $workerName): WorkerInterface;
}