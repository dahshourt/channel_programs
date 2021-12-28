<?php
/**
 * Created by PhpStorm.
 * User: Walid.Dahshour
 * Date: 12/26/2021
 * Time: 5:55 PM
 */

namespace App\Factories\programs;


use App\Contracts\FactoryInterface;
use App\Http\Repository\programms\programsRepository;

class ProgramsFactory implements FactoryInterface
{

    static public function index()
    {
       return new programsRepository();
    }
}