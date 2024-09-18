@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="Built-in and Custom Helpers" btnCaption="Action Button Page 4" class="bg-white" />

    <div class="wrapper wrapper-content">

        <div class="">
            <h3>Built-in Laravel Helpers</h3>
            @php

                $salary = 100000.789;
                if (!function_exists('spell')) {
                    function spell($number)
                    {
                        $f = new NumberFormatter('en', NumberFormatter::SPELLOUT);
                        return $f->format($number);
                    }
                }
            @endphp
            <p>{{ Number::format($salary) }}</p>
            <p>{{ Number::format($salary, precision: 2) }}</p>
            <p>{{ Number::format($salary, maxPrecision: 2) }}</p>

            <p>{{ Number::format($salary, precision: 2, maxPrecision: 2) }}</p>

            <p>{{ Number::ordinal(21) }}</p>
            <p>{{ Number::percentage(21) }}</p>
            <p>{{ Number::spell(2321) }} pesos</p>

            <h3>Custom Helpers</h3>
            @php
                $fname = 'Elvin Manuel';
                $mname = 'Rodriguez';
                $lname = 'Luces';
            @endphp
            <p>Fullname: {{ format_fullname($fname, $mname, $lname, '', 1, 1) }}</p>
            <p>Fullname: {{ format_fullname($fname, $mname, $lname, '', 0, 1) }}</p>
            <p>Fullname: {{ format_fullname($fname, $mname, $lname, '', 1, 0) }}</p>


            @php
                $date1 = '2021-12-25';
                $date2 = '2021-12-30';
            @endphp

            <p> {{ compare_dates($date1, $date2) }}</p>

            @php
                $date3 = '2021-12-25';

            @endphp

            <p>Date Format: {{ format_report($date1, 1) }}</p>
            <p>Date Format: {{ format_report($date1, 2) }}</p>
            <p>Date Format: {{ format_report($date1, 3) }}</p>
            <p>Date Format: {{ format_report($date1, 4) }}</p>
        </div>
    </div>
@endsection
