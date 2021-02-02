<?php
/**
 * Created by PhpStorm.
 * User: Al Mohands
 * Date: 22/05/2019
 * Time: 01:52 م
 */

namespace App\Http\Controllers\Interfaces\User;


interface HomeRepositoryInterface
{
    public function getUserData($request);

    public function checkFileName($request);
    public function searchForFile($request);



}
