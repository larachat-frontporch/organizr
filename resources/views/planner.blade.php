@extends('index')
@section('content')
    <div id="app" class="card" @mousedown="isDown(true)" @mouseup="isDown(false)">

        <table class="striped centered">

            <thead class="hide-on-small-only">
                <tr>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </tr>
            </thead>


            <thead class="hide-on-med-and-up">
                <tr>
                    <th>Mon.</th>
                    <th>Tue.</th>
                    <th>Wed.</th>
                    <th>Thu.</th>
                    <th>Fri.</th>
                    <th>Sat.</th>
                    <th>Sun.</th>
                </tr>
            </thead>

            <tbody>

                <tr v-for="hour in 24">

                    <td class="time" v-for="day in 7" @mousedown="onTimeClick($event, day, hour)" @mouseover="onTimeClick($event, day, hour)">

                        @{{ formatTime(day, hour) }} - @{{ formatTime(day, hour+1) }}

                    </td>

                </tr>

            </tbody>

        </table>


    </div>
@stop
