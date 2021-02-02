<?php

namespace App\Http\Controllers\Api\User;


use App\Http\Controllers\Interfaces\User\HomeRepositoryInterface;
use App\Http\Requests\LangRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    protected $homeRepository;
    public function __construct(Request $request,HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function getUserData(Request $request)
    {

        $data = $this->homeRepository->getUserData($request);
        if($data)
            return response()->json(msgdata($request, success(),'success',$data));
        else
            return response()->json(msg($request,success(),'no_data'));

    }

    public function uploadFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => file_not_pdf(), 'msg' => $validator->messages()->first()]);
        }

        $data = $this->homeRepository->checkFileName($request);
        if($data){
            $this->homeRepository->searchForFile($request);
            return response()->json(msg($request, success(),'success'));
        }else
            return response()->json(msg($request,failed(),'invalid_file_name'));

    }


}
