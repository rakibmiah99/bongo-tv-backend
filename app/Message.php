<?php

namespace App;

class Message
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function FETCH(): string
    {
        return 'Fetch Successfully';
    }
    public static function CREATED(): string
    {
        return 'Created Successfully';
    }
    public static function DELETED(): string
    {
        return 'Deleted Successfully';
    }
    public static function UPDATED(): string
    {
        return 'Updated Successfully';
    }
}
