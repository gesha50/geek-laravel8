<?php


namespace App\Http\Controllers;

use App\Library\Calc;
use App\Library\Interfaces\CalcInterface;

class BaseWithCalcController extends Controller
{
    protected $calc;

    public function __construct()
    {
        //реализация калькулятора
        $this->calc = Calc::createCalc();

        $calc = app(CalcInterface::class);
        $calc2 = app(CalcInterface::class);
        $calc3 = SuperCalc::add(5);

        dump($calc);
        dump($calc3);
        dd($calc2);
    }
}
