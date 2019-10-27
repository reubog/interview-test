<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This class is dynamically mapped to the database table 'survey_respondents' of database ('aktivbo') setup
 * in the config/database.php file
 *
 * @package App
 */
class SurveyRespondent extends Model
{
    /**
     * @var string Table Name
     */
    protected $table = 'survey_respondents';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'RespondentID';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'FirstName', 'LastName', 'Address', 'E-mail'
    ];

    /**
     * Column Name Mappings
     *
     * Left side is database column name, right side is reference within PHP code
     */
    protected $attributes =[
        'E-mail' => 'email',
    ];

    /**
     * Append new column names to attributes
     * @var array
     */
    protected $append = [
        'email'
    ];

    /**
     * @return mixed
     */
    public function getEmailAttribute()
    {
        return $this->attributes['E-mail'];
    }

    public function setEmailAttribute($email)
    {
        $this->attributes['E-mail'] = $email;
    }

}
