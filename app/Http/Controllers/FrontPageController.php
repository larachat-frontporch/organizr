<?php

namespace App\Http\Controllers;

class FrontPageController extends Controller
{
    public function application($calendarId = null)
    {
        if (! $calendarId) {
            $calendarId = str_random(6); // @todo find a better unique id generator
        }

        session('currentCalendarId', $calendarId); // maybe?

        /** @todo render the view */

        return 'Coming soon ;)';
    }
}
