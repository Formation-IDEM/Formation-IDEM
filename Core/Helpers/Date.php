<?php
namespace Core\Helpers;

/**
 * Class Date
 * @package Core\Helpers
 */
class Date
{
    /**
     * Convertit un datetime en timestamp
     *
     * @param $time
     * @return int
     */
    public static function mysqlToUnix($time)
    {
        $time = str_replace(array('-', ':', ' '), '', $time);

        return mktime(
            substr($time, 8, 2),
            substr($time, 10, 2),
            substr($time, 12, 2),
            substr($time, 4, 2),
            substr($time, 6, 2),
            substr($time, 0, 4)
        );
    }

    /**
     * Convertit un timestamp en datetime
     *
     * @param $time
     * @return string
     */
    public static function unixToHuman($time)
    {
        $r = date('Y', $time) . '-' . date('m', $time) . '-' . date('d', $time) . ' ' . date('h', $time) . ':' . date('i', $time) . date('s', $time);

        return $r;
    }

    /**
     * Retourne une date formatée proprement et traduite
     *
     * @param $timestamp
     * @param bool|true $datetime
     * @return string
     */
    public static function datetime($timestamp, $datetime = true)
    {
        if( is_null($timestamp) || empty($timestamp) )
        {
            $timestamp = time();
        }

        if( $datetime && $timestamp != time() )
        {
            $timestamp = self::mysqlToUnix($timestamp);
        }
        return lang('date.' . date('l', $timestamp)) . ' ' . date('d', $timestamp) . ' ' . lang('date.' . date('F', $timestamp)) . ' ' . date('Y', $timestamp);
    }

    /**
     * Allias de timespan
     *
     * @param $timestamp
     * @param bool|true $datetime
     * @return string
     */
    public static function ago($timestamp, $datetime = true)
    {
        if( is_null($timestamp) || empty($timestamp) )
        {
            return self::timespan(time());
        }

        if( $datetime )
        {
            $timestamp = self::mysqlToUnix($timestamp);
        }
        return self::timespan($timestamp);
    }

    /**
     * Génère un compteur de date de la manière suivante :
     * Il y a X années, X mois, X jours, X heures, X minutes, X secondes
     *
     * @param int $time
     * @return string
     */
    public static function timespan($time)
    {
        $diffTime = time() - $time;
        if( $diffTime < 1 )
        {
            return lang('date.now');
        }

        $sec = [
            31556926    => lang('date.year'),
            2629743.83  => lang('date.month'),
            86400       => lang('date.day'),
            3600        => lang('date.hour'),
            60          => lang('date.minute'),
            1           => lang('date.second')
        ];

        foreach( $sec as $sec => $value )
        {
            $div = $diffTime / $sec;
            if( $div >= 1 )
            {
                $timeAgo = round($div);
                $timeType = $value;
                if( $timeAgo >= 2 && $timeType != lang('date.month') )
                {
                    $timeType .= 's';
                }
                return sprintf(lang('date.ago'), $timeAgo, $timeType);
            }
        }
    }


}