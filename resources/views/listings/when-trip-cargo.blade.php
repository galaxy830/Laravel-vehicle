@extends('layouts.user_app')
@section('title', 'Когда')
@section('content')
<div class="content">
    <section class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs--list">
                <a class="breadcrumbs--item" href="/">@lang('front.profile.home')
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                    </svg>
                </a>
                <a class="breadcrumbs--item" href="{{ route('search', app()->getLocale()) }}">@lang('front.header.find')<span>&nbsp @lang('front.header.trip')</span></a>
            </ul>
        </div>
    </section>
    <form id="select_date_cargo" action="javascript:void(0)" enctype="multipart/form-data">
        <section class="when-trip">
            <div class="container">
                <div class="when-trip--wrap">
                    <h1 class="main-section--title text-center mb-5">@lang('front.when_trip.when') <span>@lang('front.when_trip.the_trip_cargo') ?</span></h1>
                    <div class="when-trip-date">
                        <div class="trip-show-calendar mr-4"></div>
                        <div class="when-trip-calendar"></div>
                        <input class="when-trip-show-date" type="hidden" value="" name="date" id="date">
                        <div class="when-trip--date--arrows">
                            <div class="gogocar-gray-icons wtda-arrow--prev gogocar-gray-button-hover">
                                <svg class="icon icon-arrow-right ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                                </svg>
                            </div>
                            <div class="gogocar-gray-icons wtda-arrow--next gogocar-gray-button-hover">
                                <svg class="icon icon-arrow-right ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="when-trip">
            <div class="container">
                <div class="when-trip--wrap">
                    <h1 class="main-section--title text-center mb-5">@lang('front.when_trip.what_time') <span>@lang('front.when_trip.pick_up_cargo') ?</span></h1>
                    <div class="when-trip-date w-230 m-0-auto mb-5">
                        <select class="gogocar-select-when-trip" name="time" id="time">
                            <option value="00:00">00:00</option>
                            <option value="01:00">01:00</option>
                            <option value="02:00">02:00</option>
                            <option value="03:00">03:00</option>
                            <option value="04:00">04:00</option>
                            <option value="05:00">05:00</option>
                            <option value="06:00">06:00</option>
                            <option value="07:00">07:00</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="21:00">21:00</option>
                            <option value="22:00">22:00</option>
                            <option value="23:00">23:00</option>
                        </select>
                        <input id="covid" name="covid" type="hidden" value="">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    </div>
                    <div class="trip-stops--places--buttons">
                        <a class="gogocar-gray-button m-0-auto-none mr-4" href="{{ route('stopPlacesCargo', app()->getLocale()) }}">@lang('front.trip_stops_places.back')</a>
                        <button class="gogocar-yellow-button m-0-auto-none " type="submit">@lang('front.suggest_late_from.continue')</button>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#select_date_cargo').submit(function(e) {
            e.preventDefault();
            var date = $('#date').val();
            var time = $('#time').val();
            if(date == '' || time == ''){
                alert("Please select date and time");
            }
            else{
                var formData = new FormData($("#select_date_cargo")[0]);
            
                var token = $("#token").val();
                $.ajax({
                    type:'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    url: '{{ route('saveDateCargo', app()->getLocale()) }}',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data == 'success') {
                            window.location.href = '{{ route("chooseCarCargo", app()->getLocale()) }}';
                        }
                        else if(data == 'failed'){
                            alert("Something went wrong. Please try again.");
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }
        });
    })
</script>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection