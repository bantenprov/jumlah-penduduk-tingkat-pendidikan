<?php namespace Bantenprov\JPTingkatPendidikan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The JPTingkatPendidikan facade.
 *
 * @package Bantenprov\JPTingkatPendidikan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPTingkatPendidikan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jumlah-penduduk-tingkat-pendidikan';
    }
}
