<?php
/**
 * Created by PhpStorm.
 * User: Walid.Dahshour
 * Date: 12/26/2021
 * Time: 5:55 PM
 */

namespace App\Factories\channels;


use App\Contracts\FactoryInterface;
use App\Http\Repository\channels\channelRepository;

class ChannelFactory implements FactoryInterface
{

    static public function index()
    {
       return new channelRepository();
    }
}