<?php

namespace NicehalfCore\System\Validations\Rules;

use Rakit\Validation\Rule;
use NicehalfCore\System\Database;

class UniqueRule extends Rule
{
    protected $message = ":attribute :value has been used";

    protected $fillableParams = ['table', 'column', 'except'];

    public function check($value): bool
    {
        // make sure required parameters exists
        $this->requireParameters(['table', 'column']);

        // getting parameters
        $column = $this->parameter('column');
        $table = $this->parameter('table');
        $except = $this->parameter('except');

        if ($except and $except == $value) {
            return true;
        }

        // start query
        $data = Database::table($table)->where($column, '=', $value)->first();

        // true for valid, false for invalid
        return $data ? false : true;
    }
}
