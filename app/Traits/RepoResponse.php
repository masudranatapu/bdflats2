<?php

namespace App\Traits;

trait RepoResponse {

    public function formatResponse(bool $status, string $msg, string $redirect_to, $data = null, string $flash_type = '') : object
    {

        if ($flash_type == '') {
            $flash_type = $status ? 'flashMessageSuccess' : 'flashMessageError'; // flashMessageWarning
        }

        return (object) array(
            'status'         => $status,
            'msg_title'      => $status ? 'Success' : 'Error',
            'msg'            => $msg,
            'description'    => $msg,
            'data'           => $data,
            'id'             => ! is_array($data) && $data != '' ? $data : 0,
            'redirect_to'    => $redirect_to,
            'redirect_class' => $flash_type
        );
    }



    public function dateDiffInDays($date1, $date2)
    {
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);

        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return abs(round($diff / 86400));
    }
}
