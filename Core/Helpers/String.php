<?php
namespace Core\Helpers;

class String
{
    /**
     * Tronque une chaîne de caractère
     *
     * @param $string
     * @param $limit
     * @param string $end
     * @return string
     */
    public static function truncate($string, $limit, $end = '...')
    {
        if( empty(trim($string)) )
        {
            return $string;
        }

        preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $string, $matches);

        if( strlen($string) === strlen($matches[0]) )
        {
            $end = '';
        }
        return rtrim($matches[0]) . $end;
    }

    /**
     * Limite une chaîne de caractères à un nombre de mots.
     *
     * @param $str
     * @param int $n
     * @param string $end_char
     * @return mixed|string
     */
    public static function limiter($str, $n = 500, $end_char = '...')
    {
        if( mb_strlen($str) < $n )
        {
            return $str;
        }

        $str = preg_replace('/ {2,}/', ' ', str_replace(array("\r", "\n", "\t", "\x0B", "\x0C"), ' ', $str));
        if (mb_strlen($str) <= $n)
        {
            return $str;
        }
        $out = '';
        foreach( explode(' ', trim($str)) as $val )
        {
            $out .= $val.' ';
            if( mb_strlen($out) >= $n )
            {
                $out = trim($out);
                return (mb_strlen($out) === mb_strlen($str)) ? $out : $out . $end_char;
            }
        }
    }

    public static function plural($str, $count)
    {
        return ($count > 1) ? $str . 's' : $str;
    }

    public static function strPlural($str, $count)
    {
        return $count . ' ' .  ($count > 1) ? $str . 's' : $str;
    }

}