<?php
/**
 * Created by PhpStorm.
 * User: Al Mohands
 * Date: 22/05/2019
 * Time: 01:53 م
 */

namespace App\Http\Controllers\Eloquent\User;


use App\Http\Controllers\Interfaces\User\HomeRepositoryInterface;
use App\Models\User;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class HomeRepository implements HomeRepositoryInterface
{
    public $model;

    /*public function __construct(Category $model)
    {
        $this->model = $model;
    }*/


    public function getUserData($request)
    {
        return User::whereHas('companies')->with('companies')->get();
    }

    public function checkFileName($request)
    {
        return $request->file('file')->getClientOriginalName() == "Proposal.pdf" ? true : false;
    }

    public function searchForFile($request)
    {
        $file = File::whereName($request->file('file')->getClientOriginalName())
            ->whereSize($request->file('file')->getSize())->first();

        if($file && file_exists($file->name)){

            if(unlink($file->name)){
                File::whereId($file->id)->update([
                    'name' => $request->file('file')
                ]);
            }

        }else{
            File::create([
                'name' => $request->file('file'),
                'size' => $request->file('file')->getSize(),
            ]);

        }
    }





}
