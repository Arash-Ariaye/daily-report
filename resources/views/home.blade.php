@extends('layouts.app')

@section('css')

@endsection
@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                @foreach($users as $user)
                    <div id="accordion-{{ $user->id }}" class="accordion accordion-with-icon">
                        <div class="accordion__item">
                            <div class="accordion__header collapsed" data-toggle="collapse"
                                 data-target="#with-{{ $user->id }}">
                                <span class="accordion__header--icon"></span>
                                <span class="accordion__header--text">{{ $user->name }}</span>
                                <span class="accordion__header--indicator indicator_bordered"></span>
                            </div>
                            <div id="with-{{ $user->id }}" class="collapse accordion__body" data-parent="#accordion-{{ $user->id }}">
                                @foreach($report->where('name', $user->name)->get() as $item)
                                    <div class="accordion__body--text mt-4">
                                        <div class="bootstrap-media">
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="row mt-0 col-12 justify-content-between">
                                                        <p class="h5">{{ $item->subj }}</p>
                                                        <p class="h5 pl-5" style="direction: ltr;">در تاریخ:{{ $item->date }} </p>
                                                    </div>
                                                    <p class="mb-0">{{ $item->desc }}</p>

                                                    @if($report->where('sub', $item->id)->count() >= 1)
                                                        @foreach($report->where('sub', $item->id)->where('name', $user->name)->get() as $sub)
                                                            <div class="media-body mt-4 pl-5">

                                                                <div class="row mt-0 col-12 justify-content-between">
                                                                    <p class="h5">{{ $sub->subj }}</p>
                                                                    <p class="h5 pl-5 " style="direction: ltr;"> در تاریخ:{{ $sub->date }} </p>
                                                                </div>
                                                                <p class="mb-0">{{ $sub->desc }}</p>

                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
