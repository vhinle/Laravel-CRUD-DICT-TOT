<?php

/**
 * Formats a full name based on the given parameters.
 *
 * @param string $fname The first name.
 * @param string $mname The middle name.
 * @param string $lname The last name.
 * @param string $suffix The suffix (e.g., Jr., Sr., III).
 * @param bool $is_reversed If true, the format will be "Last Name Suffix, First Name Middle Name".
 *                          If false, the format will be "First Name Middle Name Last Name Suffix".
 * @param bool $is_capitalized If true, the full name will be converted to uppercase.
 * 
 * @return string The formatted full name.
 */
function format_fullname($fname, $mname, $lname, $suffix, $is_reversed, $is_capitalized)
{
    if ($is_reversed == 1) {
        $fullname = "$lname $suffix, $fname $mname";
    } else {
        $fullname = "$fname $mname $lname $suffix";
    }
    if ($is_capitalized == 1) {
        $fullname = strtoupper($fullname);
    }
    return $fullname;
}


/**
 * Compare two dates and return a message indicating whether they are the same or different.
 *
 * @param string $date1 The first date to compare.
 * @param string $date2 The second date to compare.
 * @return string A message indicating whether the dates are the same or the period covered by the two dates.
 */
function compare_dates($date1, $date2)
{
    if ($date1 == $date2) {
        $msg = "Date: $date1";
    } else {
        $msg = "Period covered from $date1 to $date2";
    }

    return $msg;
}


/**
 * Formats a report date based on the given type.
 *
 * @param string $date The date to format.
 * @param int $type The type of format to apply:
 *                  1 - "Day of the week, Month Day, Year"
 *                  2 - "Day Month Year - Day of the week"
 *                  3 - "Today is Day of the week, Month Day, Year"
 *                  Default - "0000-00-00"
 * 
 * @return string The formatted date.
 */
function format_report($date, $type)
{
    switch ($type) {
        case 1:
            return date('l, F j, Y', strtotime($date));
            break;

        case 2:
            return date('j F Y - l', strtotime($date));
            break;
        case 3:
            return 'Today is ' . date('l, F j, Y', strtotime($date));
            break;
        default:
            return '0000-00-00';
            break;
    }
}
