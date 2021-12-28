<?php
namespace app\Contracts\programms;

interface programmsRespositoryInterface

{

	public function getAll();

	public function create($request);

    public function update($request);
    public  function  programs($request);




}

?>
