<?php

namespace App\Helper;


class TaskStatus
{
    const Pending = 'pending';
    const InProgress = 'in_progress';
    const Finished = 'finished';

    const arr=array(
        'pending' => 'Pending',
        'in_progress' => 'InProgress',
        'finished' => 'Finished',
    );
    static function getStatus($status)
    {
        $arr = array(
            'pending' => 'Pending',
            'in_progress' => 'InProgress',
            'finished' => 'Finished',
        );
        return $arr[$status];
    }
}
