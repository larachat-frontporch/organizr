
@section('content')
    <div id="app" @mousedown="isDown(true)" @mouseup="isDown(false)">

        <table class="striped centered">

            <thead>
                <tr>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Satureday</th>
                    <th>Sunday</th>
                </tr>
            </thead>

            <tbody>

                <tr v-for="hour in 24">

                    <td class="time" v-for="day in 7" @mousedown="onTimeClick($event, day, hour)" @mouseover="onTimeClick($event, day, hour)">

                        @{{ hour }}:00 - @{{ hour + 1 }}:00

                    </td>

                </tr>

            </tbody>

        </table>


    </div>
@stop
