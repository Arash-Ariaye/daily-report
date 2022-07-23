@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="page-titles">
        <h4>مدیریت دسته بندی</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="javascript:void(0)">گزارشات > </a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">  افزودن گزارش روزانه </a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">ثبت گزارش روزانه</h4>
                <h6 class="card-text">{{ $date }}</h6>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('create-report') }}" method="post">
                        @csrf
                        @if(!old("report"))
                        <div id="Report">
                            <div class="row mb-5 col-lg-12">
                                <div class="input-group col-md-4 mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">موضوع</span>
                                    </div>
                                    <input type="text" name="report[1][subj]"
                                           class="form-control">
                                </div>
                                <div class="input-group col-md-5 mb-2">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">گزینه ها</label>
                                    </div>
                                    <select name="report[1][cat]" class="form-control">
                                        @if(old("report.1.cat"))
                                            <option value="{{ old("report.1.cat") }}">{{ old("report.1.cat") }}</option>
                                        @endif
                                        <option value="اقدام انجام شده">اقدام انجام شده</option>
                                        <option value="خاتمه یافته">خاتمه یافته</option>
                                        <option value="پروژه">پروژه</option>
                                        <option value="برنامه آینده">برنامه آینده</option>
                                    </select>
                                </div>
                                <div class="input-group col-md-3 mb-2">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text"> گزارش:</label>
                                    </div>
                                    <select name="report[1][sub]" class="form-control">
                                        <option value="0">ندارد...</option>

                                    @foreach($moder as $item)
                                            <option value="{{ $item->id }}">{{ $item->subj }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <textarea name="report[1][desc]" class="form-control" rows="4" id="comment"></textarea>
                            </div>
                        </div>
                        @else
                            @for($i=1; $i <= count(old("report")); $i++)
                                <div class="mb-5" id="Report">
                                    <div class="row mb-5 col-lg-12">
                                        <div class="input-group col-md-4 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">موضوع</span>
                                            </div>
                                            <input type="text" value="{{ old("report.".$i.".subj") }}" name="report[{{$i}}][subj]"
                                                   class="form-control">
                                        </div>
                                        @error("report.".$i.".subj") <span class="text-danger"> {{ $message }}</span> @enderror

                                        <div class="input-group col-md-5 mb-2">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">گزینه ها</label>
                                            </div>
                                            <select name="report[{{$i}}][cat]" class="form-control">
                                                @if(old("report.$i.cat"))
                                                    <option value="{{ old("report.".$i.".cat") }}">{{ old("report.".$i.".cat") }}</option>
                                                @endif
                                                <option value="اقدام انجام شده">اقدام انجام شده</option>
                                                <option value="خاتمه یافته">خاتمه یافته</option>
                                                <option value="پروژه">پروژه</option>
                                                <option value="برنامه آینده">برنامه آینده</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                <textarea name="report[{{$i}}][desc]" class="form-control" rows="4"
                                          id="comment">{{ old("report.".$i.".desc") }}</textarea>
                                        @error("report.".$i.".desc") <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @endfor
                        @endif
                        <div class="svg-icons-prev" onclick="addReport()">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                    <path
                                        d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-lg-12">
                                <button class="btn btn-primary">افزودن</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        let num = 2;

        function addReport() {
            let htmlDoc = "<div id='Report'>" +
                "<div class='row col-lg-12 mt-5'>" +
                    "<div class='input-group col-md-4 mb-2'>" +
                        "<div class='input-group-prepend'>" +
                            "<span class='input-group-text'>موضوع</span>" +
                        "</div>" +
                        "<input type='text' name='report[" + num + "][subj]' class='form-control'>" +
                    "</div>" +
                    "<div class='input-group col-md-5 mb-2'>" +
                        "<div class='input-group-prepend'>" +
                "<label class='input-group-text'>گزینه ها</label>" +
                "</div>" +
                "<select name='report[" + num + "][cat]' class='form-control'>" +
                "<option value='اقدام انجام شده'>اقدام انجام شده</option>" +
                "<option value='خاتمه یافته'>خاتمه یافته</option>" +
                "<option value='پروژه'>پروژه</option>" +
                "<option value='برنامه آینده'>برنامه آینده</option>" +
                "</select>" +
                "</div>" +
                "<div class='input-group col-md-3 mb-2'>"+
                    "<div class='input-group-prepend'>"+
                        "<label class='input-group-text'> گزارش:</label>"+
                    "</div>"+
                    "<select name='report[" + num + "][sub]' class='form-control'>"+
                "<option select value='0'>ندارد</option>"+
                        @foreach($moder as $item)
                        "<option value='{{ $item->id }}'>{{ $item->subj }}</option>"+
                        @endforeach
                    "</select>"+
                "</div>"+

                "</div>" +
                "<div class='form-group mt-3'>" +
                "<textarea name='report[" + num + "][desc]' class='form-control' rows='4' id='comment'></textarea>" +
                "</div>" +
                "</div>";
            node = document.getElementById('Report');
            node.insertAdjacentHTML('afterend', htmlDoc);
            num++;
        }
    </script>
@endsection
