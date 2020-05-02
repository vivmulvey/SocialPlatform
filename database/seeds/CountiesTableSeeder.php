<?php

use Illuminate\Database\Seeder;
use App\County;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $county = new County();
        $county->name = 'Dublin';
        $county->save();

        $county = new County();
        $county->name = 'Galway';
        $county->save();

        $county = new County();
        $county->name = 'Cork';
        $county->save();

        $county = new County();
        $county->name = 'Mayo';
        $county->save();

        $county = new County();
        $county->name = 'Donegal';
        $county->save();

        $county = new County();
        $county->name = 'Kerry';
        $county->save();

        $county = new County();
        $county->name = 'Tyrone';
        $county->save();

        $county = new County();
        $county->name = 'Antrim';
        $county->save();

        $county = new County();
        $county->name = 'Limerick';
        $county->save();

        $county = new County();
        $county->name = 'Roscommon';
        $county->save();

        $county = new County();
        $county->name = 'Down';
        $county->save();

        $county = new County();
        $county->name = 'Wexford';
        $county->save();

        $county = new County();
        $county->name = 'Meath';
        $county->save();

        $county = new County();
        $county->name = 'Derry';
        $county->save();

        $county = new County();
        $county->name = 'Kilkenny';
        $county->save();

        $county = new County();
        $county->name = 'Wicklow';
        $county->save();

        $county = new County();
        $county->name = 'Offaly';
        $county->save();

        $county = new County();
        $county->name = 'Cavan';
        $county->save();

        $county = new County();
        $county->name = 'Waterford';
        $county->save();

        $county = new County();
        $county->name = 'WestMeath';
        $county->save();

        $county = new County();
        $county->name = 'Sligo';
        $county->save();

        $county = new County();
        $county->name = 'Laois';
        $county->save();

        $county = new County();
        $county->name = 'Kildare';
        $county->save();

        $county = new County();
        $county->name = 'Fermanagh';
        $county->save();

        $county = new County();
        $county->name = 'Leitrim';
        $county->save();

        $county = new County();
        $county->name = 'Armagh';
        $county->save();

        $county = new County();
        $county->name = 'Monaghan';
        $county->save();

        $county = new County();
        $county->name = 'Longford';
        $county->save();

        $county = new County();
        $county->name = 'Carlow';
        $county->save();

        $county = new County();
        $county->name = 'Louth';
        $county->save();
      }
}
