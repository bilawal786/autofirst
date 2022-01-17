@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <link href="{{asset('front/calender/lib/main.css')}}" rel='stylesheet' />
    <script src="{{asset('front/calender/lib/main.js')}}"></script>
    <script src="{{asset('front/calender/lib/locales-all.js')}}"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var initialLocaleCode = 'fr';
            var localeSelectorEl = document.getElementById('locale-selector');
            var calendarEl = document.getElementById('calendar1');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                initialDate: '2022-01-01',
                locale: initialLocaleCode,
                buttonIcons: false, // show the prev/next text
                weekNumbers: true,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                    @foreach($reservations as $rese)
                    {
                        title: "{{$rese->fname.' '.$rese->lname}}, {{$rese->vehicle->marque->name??'Supreme'}}, {{$rese->vehicle->modal->name??'Supreme'}}, {{$rese->vehicle->registration??'Supreme'}}",
                        start: "{{$rese->departure_date}}",
                        end: "{{$rese->return_date}}",
                        url: "/admin/show/reservation/{{$rese->id}}",
                        backgroundColor: "{{$rese->vehicle->color}}",
                        borderColor: "{{$rese->vehicle->color}}",
                    },
                    @endforeach
                ]
            });

            calendar.render();

            // build the locale selector's options
            calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
                var optionEl = document.createElement('option');
                optionEl.value = localeCode;
                optionEl.selected = localeCode == initialLocaleCode;
                optionEl.innerText = localeCode;
                localeSelectorEl.appendChild(optionEl);
            });

            // when the selected option changes, dynamically change the calendar option
            localeSelectorEl.addEventListener('change', function() {
                if (this.value) {
                    calendar.setOption('locale', this.value);
                }
            });

        });

    </script>
    <style>


        #top {
            background: #eee;
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            font-size: 12px;
        }

        #calendar {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 10px;
        }

    </style>
</head>
<body>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">All Reservations</font></font></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body p-5">
                    <div class="container">
                        <div id='calendar1'></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
@endsection
