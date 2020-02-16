<?php


namespace App\Http\Repositories;


interface RepoInterface
{
    function getAll();
    function store($obj);
    function update($obj);
    function delete($obj);
    function findById($id);
}
