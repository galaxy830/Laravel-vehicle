@extends('layouts.app')
@section('title', 'Уровни поддержки')
@section('admin_lang')
@include('includes.admin_flag')
@endsection

@section('content')
    <section class="section-1">
    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <a class="back_to_link" href="{{ route('admin.support_levels.index', app()->getLocale()) }}">

                <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
            </a>

            <span class="pull-left admin-form-title">
                <h4 >@lang('global.support_levels.fields.create')</h4>
            </span>



        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.support_levels.store', app()->getLocale()) }}" accept-charset="UTF-8" id="create_support_levels_form" name="create_support_levels_form" class="form-horizontal">

            {{ csrf_field() }}
            @include ('admin.support_levels.form', [
                                        'supportLevels' => null,
                                      ])

                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_create')</button>
                        <a href="{{ route('admin.support_levels.index', app()->getLocale()) }}">
                            <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                        </a>
                    </div>
                </div>

            </form>

        </div>
    </div>
    </section>
@endsection


