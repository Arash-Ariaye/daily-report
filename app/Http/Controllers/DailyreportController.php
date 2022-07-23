<?php

namespace App\Http\Controllers;

use App\Models\Dailyreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Exception;
use Yoeunes\Toastr\Toastr;

class DailyreportController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'گزارشات روزانه',
        ];


    }


    public function add()
    {
        $data = [
            'title' => 'افزودن گزارش روزانه',
            'date' => verta()->format('Y-m-d'),
            'moder' => Dailyreport::Where('name', Auth::user()->name)->Where('moder', '1')->get(),
        ];
        return view('dailyreports.add-report', $data);
    }

    public function create(Request $request)
    {
        $check = $request->validate([
            "report.*.subj" => 'required',
            "report.*.cat" => 'required',
            "report.*.sub" => 'required',
            "report.*.desc" => 'required',
        ],[
            '*.*.desc.required' => 'این توضیحات را پر کنید.',
            '*.*.subj.required' => 'این موضوع را ننوشته اید .',
        ]);

        foreach ($check['report'] as $item => $value){
            if($check['report'][$item]['cat'] == "پروژه"){
                $check['report'][$item]['moder'] = '1';
            }
            if($check['report'][$item]['sub'] == 0){
                $check['report'][$item]['sub'] = null;
            }
            $check['report'][$item]['name'] = Auth::user()->name;
            $check['report'][$item]['pos'] = Auth::user()->pos;
            $check['report'][$item]['unit'] = Auth::user()->unit;
            $check['report'][$item]['date'] = verta()->format('Y-m-d');
            $check['report'][$item]['ym'] = verta()->format('Y-m');
            $check['report'][$item]['y'] = verta()->format('Y');
        }
        foreach ($check['report'] as $item){
            Dailyreport::create($item);
        }
        toastr()->success('گزارش با موفقیت ثبت شد.');
        return redirect()->route("add-report");
    }


    public function edit(Dailyreport $dailyreport, Request $request)
    {
        //
    }


    public function update(Request $request, Dailyreport $dailyreport)
    {
        //
    }


    public function destroy(Dailyreport $dailyreport)
    {
        try {
            $dailyreport->delete();
            toastr()->success('گزارش با موفقیت حذف شد.');
            return redirect()->route('reports');
        } catch (Exception $exception) {
            \toastr()->error('مشکلی در حذف به وجود آمد.');
            return redirect()->back();
        }
    }
}
