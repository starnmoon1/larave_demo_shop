<?php


namespace App\Http\Services;


use Illuminate\Http\Request;

interface ServiceInterface
{
    function getAll();
    function create(Request $request);
    function update($id, Request $request);
    function delete($id);
    function getById($id);

}
