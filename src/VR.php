<?php

namespace Timenz\Helper;

/**
 *
 *
 * Class VR
 * @package App\Libraries
 */

class VR{
    /**
     *
     */
    const REQUIRED = 'required';

    /**
     * The field under validation must be yes, on, 1, or true.
     * This is useful for validating "Terms of Service" acceptance.
     *
     */
    const ACCEPTED = 'accepted';

    /**
     * The field under validation must be a valid URL according to the checkdnsrr PHP function.
     *
     */
    const ACTIVE_URL = 'active_url';

    /**
     * The field under validation must be entirely alphabetic characters.
     *
     */
    const ALPHA = 'alpha';

    /**
     * The field under validation may have alpha-numeric characters, as well as dashes and underscores.
     *
     */
    const ALPHA_DASH = 'alpha_dash';

    /**
     * The field under validation must be entirely alpha-numeric characters.
     *
     */
    const ALPHA_NUM = 'alpha_num';

    /**
     * The field under validation must be a PHP array.
     *
     */
    const ARRAAY = 'array';

    /**
     * The field under validation must be able to be cast as a boolean.
     * Accepted input are true, false, 1, 0, "1", and "0".
     *
     */
    const BOOLEAN = 'boolean';

    /**
     * The field under validation must have a matching field of foo_confirmation.
     * For example, if the field under validation is password,
     * a matching password_confirmation field must be present in the input.
     *
     */
    const CONFIRMED = 'confirmed';

    /**
     * The field under validation must be a valid date according to the strtotime PHP function.
     *
     */
    const DATE = 'date';

    /**
     * The field under validation must be formatted as an e-mail address.
     *
     */
    const EMAIL = 'email';

    /**
     * The file under validation must be an image (jpeg, png, bmp, gif, or svg)
     */
    const IMAGE = 'image';

    /**
     * The field under validation must be an integer.
     */
    const INTEGER = 'integer';

    /**
     * The field under validation must be an IP address.
     *
     */
    const IP = 'ip';

    /**
     * The field under validation must a valid JSON string.
     */
    const JSON = 'json';

    /**
     * The field under validation must be numeric.
     *
     */
    const NUMERIC = 'numeric';

    /**
     * The field under validation must be a string.
     */
    const STRING = 'string';

    /**
     * The field under validation must be a valid timezone identifier
     * according to the timezone_identifiers_list PHP function.
     */
    const TIMEZONE = 'timezone';

    /**
     * The field under validation must be a valid URL according to PHP's filter_var function.
     *
     */
    const URL = 'url';


    /**
     * The field under validation must be a value after a given date.
     * The dates will be passed into the strtotime PHP function:
     *
     * @param string $date
     * @return string
     */
    public static function AFTER($date){
        return 'after:'.$date;
    }

    /**
     * The field under validation must be a value preceding the given date.
     * The dates will be passed into the PHP strtotime function.
     *
     * @param string $date
     * @return string
     */

    public static function BEFORE($date){
        return 'before:'.$date;
    }

    /**
     * The field under validation must have a size between the given min and max. Strings, numerics, and files are evaluated in the same fashion as the size rule.
     *
     * @param integer $min
     * @param integer $max
     * @return string
     */

    public static function BETWEEN($min, $max){
        return 'between:'.$min.','.$max;
    }

    /**
     * The field under validation must match the given format.
     * The format will be evaluated using the PHP date_parse_from_format function.
     * You should use either date or date_format when validating a field, not both.
     *
     * @param string $format
     * @return string
     */

    public static function DATE_FORMAT($format){
        return 'date_format:'.$format;
    }

    /**
     * The field under validation must have a different value than field.
     *
     * @param string $field
     * @return string
     */

    public static function DIFFERENT($field){
        return 'different:'.$field;
    }

    /**
     * The field under validation must be numeric and must have an exact length of value.
     *
     * @param string $value
     * @return string
     */

    public static function DIGITS($value){
        return 'digits:'.$value;
    }

    /**
     * The field under validation must have a length between the given min and max.
     *
     * @param integer $min
     * @param integer $max
     * @return string
     */

    public static function DIGITS_BETWEEN($min, $max){
        return 'digits_between:'.$min.','.$max;
    }

    /**
     * The field under validation must exist on a given database table.
     *
     * example
     * 'exists:states'
     * 'exists:states,abbreviation'
     * 'email' => 'exists:staff,email,account_id,1'
     *
     * @param $table
     * @param string $column
     * @param array $where
     * @return string
     */

    public static function EXISTS($table, $column = null, $where = []){
        if($column === null){
            return 'exists:'.$table;
        }else if(count($where) < 1){
            return 'exists:'.$table.','.$column;
        }else{
            $str = '';

            foreach($where as $key=>$item){
                $str .= $key.','.$item.',';
            }

            $str = substr($str, 0, -1);

            return 'exists:'.$table.','.$column.','.$str;
        }
    }

    /**
     * The field under validation must be included in the given list of values.
     *
     * @param array $value
     * @return string
     */

    public static function IN(array $value){
        return 'in:'.implode(',', $value);
    }


    /**
     * The field under validation must be less than or equal to a maximum value.
     * Strings, numerics, and files are evaluated in the same fashion as the size rule.
     *
     * @param string $value
     * @return string
     */

    public static function MAX($value){
        return 'max:'.$value;
    }

    /**
     * The file under validation must have a MIME type corresponding to one of the listed extensions.
     *
     * @param array $mimes
     * @return string
     */

    public static function MIMES(array $mimes){
        return 'mimes:'.implode(',', $mimes);
    }

    /**
     * The field under validation must have a minimum value.
     * Strings, numerics, and files are evaluated in the same fashion as the size rule.
     *
     * @param integer $value
     * @return string
     */

    public static function MIN($value){
        return 'min:'.$value;
    }

    /**
     * The field under validation must not be included in the given list of values.
     *
     * @param array $value
     * @return string
     */

    public static function NOT_IN(array $value){
        return 'not_in:'.implode(',', $value);
    }

    /**
     * The field under validation must match the given regular expression.
     *
     * @param string $pattern
     * @return string
     */

    public static function REGEX($pattern){
        return ['regex' => $pattern];
    }

    /**
     * The field under validation must be present if the anotherfield field is equal to any value.
     *
     * @param array $if
     * @return string
     */
    public static function REQUIRED_IF(array $if){
        $str = '';
        foreach($if as $key=>$item){
            $str .= $key.','.$item.',';
        }

        $str = substr($str, 0, -1);
        return 'required:'.$str;
    }

    /**
     * The field under validation must be present unless the anotherfield field is equal to any value.
     *
     * @param array $if
     * @return string
     */
    public static function REQUIRED_UNLESS(array $if){
        $str = '';
        foreach($if as $key=>$item){
            $str .= $key.','.$item.',';
        }

        $str = substr($str, 0, -1);
        return 'required_unless:'.$str;
    }

    /**
     * The field under validation must be present only if any of the other specified fields are present.
     *
     * @param array $value
     * @return string
     */

    public static function REQUIRED_WITH(array $value){
        return 'required_with:'.implode(',', $value);
    }

    /**
     * The field under validation must be present only if all of the other specified fields are present.
     *
     * @param array $value
     * @return string
     */

    public static function REQUIRED_WITH_ALL(array $value){
        return 'required_with_all:'.implode(',', $value);
    }

    /**
     * The field under validation must be present only when any of the other specified fields are not present.
     *
     * @param array $value
     * @return string
     */

    public static function REQUIRED_WITHOUT(array $value){
        return 'required_without:'.implode(',', $value);
    }

    /**
     * The field under validation must be present only when all of
     * the other specified fields are not present.
     *
     * @param array $value
     * @return string
     */

    public static function REQUIRED_WITHOUT_ALL(array $value){
        return 'required_without_all:'.implode(',', $value);
    }

    public static function SAME($value){
        return 'same:'.$value;
    }

    /**
     * The field under validation must have a size matching the given value.
     * For string data, value corresponds to the number of characters.
     * For numeric data, value corresponds to a given integer value.
     * For files, size corresponds to the file size in kilobytes.
     *
     * @param integer $value
     * @return string
     */

    public static function SIZE($value){
        return 'size:'.$value;
    }

    /**
     * The field under validation must be unique on a given database table.
     * If the column option is not specified, the field name will be used.
     *
     * @param string $table
     * @param string $column
     * @return string
     */
    public static function UNIQUE($table, $column){
        return 'unique:'.$table.','.$column;
    }

}