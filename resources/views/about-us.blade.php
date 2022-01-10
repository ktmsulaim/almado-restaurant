@extends('layouts.landing.app')

@section('title','About Us')

@section('content')
    <main>
        <div class="main-body-div">
            <!-- Top Start -->
            <section class="top-start secondary-header" style="min-height: 100px">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mt-2 text-center">
                            <h1>{{__('messages.about_us')}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="layout_padding-bottom layout_padding-top">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            {!! $data !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top End -->
        </div>
    </main>
@endsection
