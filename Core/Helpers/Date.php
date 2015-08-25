<?php
namespace Core\Helpers;

/**
 * Class Date
 * @package Core\Helpers
 */
class Date
{
    /**
     * Convertit une datetime en timestamp
     *
     * @param $datetime
     * @return bool|int
     */
    public static function humanToUnix($datetime)
    {
        if( $datetime === '' )
        {
            return false;
        }

        $datetime = preg_replace('/\040+/', ' ', trim($datetime));
        if( ! preg_match('/^(\d{2}|\d{4})\-[0-9]{1,2}\-[0-9]{1,2}\s[0-9]{1,2}:[0-9]{1,2}(?::[0-9]{1,2})?(?:\s[AP]M)?$/i', $datetime) )
        {
            return false;
        }

        sscanf($datetime, '%d-%d-%d %s %s', $year, $month, $day, $time, $ampm);
        sscanf($time, '%d:%d:%d', $hour, $min, $sec);
        isset($sec) OR $sec = 0;
        if (isset($ampm))
        {
            $ampm = strtolower($ampm);
            if( $ampm[0] === 'p' && $hour < 12 )
            {
                $hour += 12;
            }
            elseif( $ampm[0] === 'a' && $hour === 12 )
            {
                $hour = 0;
            }
        }
        return mktime($hour, $min, $sec, $month, $day, $year);
    }

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
     * Allias de timespan
     *
     * @param $timestamp
     * @param bool|true $datetime
     * @return string
     */
    public static function ago($timestamp, $datetime = true)
    {
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
        $diff_time = time() - $time;
        if( $diff_time < 1 )
        {
            return '0 secondes';
        }

        $sec = [
            31556926    => 'an',
            2629743.83  => 'mois',
            86400       => 'jour',
            3600        => 'heure',
            60          => 'minute',
            1           => 'seconde'
        ];

        foreach( $sec as $sec => $value )
        {
            $div = $diff_time / $sec;
            if( $div >= 1 )
            {
                $time_ago = round($div);
                $time_type = $value;
                if( $time_ago >= 2 && $time_type != "mois" )
                {
                    $time_type .= "s";
                }
                return 'Il y a ' . $time_ago . ' ' . $time_type;
            }
        }
    }


}