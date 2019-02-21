<?php 
namespace Model;

class StringManager
{
    const UTF8 = array(
        '/[áàâãªäåæ]/u' => 'a',
        '/[ÁÀÂÃÄÅÆ]/u' => 'A',
        '/[éèêë]/u' => 'e',
        '/[ÉÈÊË]/u' => 'E',
        '/[ÍÌÎÏÍ]/u' => 'I',
        '/[íìîï]/u' => 'i',
        '/[óòôõºöðø]/u' => 'o',
        '/[ÓÒÔÕÖØ]/u' => 'O',
        '/[úùûü]/u' => 'u',
        '/[ÚÙÛÜ]/u' => 'U',
        '/[ýýÿ]/u' => 'y',
        '/Š/u' => 'S',
        '/š/u' => 's',
        '/ç/' => 'c',
        '/Ç/' => 'C',
        '/Ð/' => 'Dj',
        '/ñ/' => 'n',
        '/Ñ/' => 'N',
        '/Ý/' => 'Y',
        '/Ž/' => 'Z',
        '/ž/' => 'z',
        '/þ/' => 'b',
        '/Þ/' => 'B',
        '/ƒ/' => 'f',
        '/ß/' => 'ss',
        '/Œ/' => 'Oe',
        '/œ/' => 'oe',
        '/–/' => '-',
        '/[‘’‚‹›]/u' => ' ',
        '/[“”«»„]/u' => ' ',
        '/ /' => ' '
    );

    public static function normalize($string)
    {
        $str = preg_replace(array_keys(self::UTF8), array_values(self::UTF8), $string);
        $str = strtolower(str_replace(' ', '', $str));
        return $str;
    }

    public static function slug($string)
    {
      $str = strtolower(str_replace(' ', '-', $string));
      return $str;
    }

    public static function noAccents($string)
    {
        $str = preg_replace(array_keys(self::UTF8), array_values(self::UTF8), $string);
        return $str;
    }
}