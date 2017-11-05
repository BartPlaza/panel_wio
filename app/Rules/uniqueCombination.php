<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class uniqueCombination implements Rule
{  
    protected $tableName;
    protected $secondColumn;
    protected $secondValue;

    public function __construct($tableName, $secondColumn, $secondValue)
    {
        $this->tableName = $tableName;
        $this->secondColumn = $secondColumn;
        $this->secondValue = $secondValue;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $secondColumn = $this->secondColumn;
        $secondValue = $this->secondValue;

        $result = DB::table($this->tableName)->where(function($query) use ($attribute, $value, $secondColumn, $secondValue) {
            $query->where($attribute, '=', $value)
                  ->where($secondColumn, '=', $secondValue);
        })->count();

        return $result ? false : true; 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ten semestr już istnieje!';
    }
}
