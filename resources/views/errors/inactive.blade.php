<?php
/**
 * Created by PhpStorm.
 * User: XanderB
 * Date: 02.11.2015
 * Time: 20:45
 */
use \Illuminate\Support\Facades\Lang as Lang;
?>
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><?=(Lang::has('auth.non_active_title') ? Lang::get('auth.non_active_title') : 'The account is inactive')?></div>
                </div>
                <div class="panel panel-body">
                    <div class="alert alert-danger">
                        <?=(Lang::has('auth.non_active') ? Lang::get('auth.non_active') : 'The account is inactive')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection