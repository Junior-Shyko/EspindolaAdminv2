<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $filable = [
        'survey_date',
        'survey_general_aspects',
        'survey_reservation',
        'survey_status',
        'survey_finalized_date',
        'survey_keys',
        'survey_code',
        'survey_link_tour',
        'survey_provisions',
        'survey_filed',
        'survey_type',
        'survey_address_immobile',
        'survey_type_immobile',
        'survey_energy_meter',
        'survey_energy_load',
        'survey_water_meter',
        'survey_water_load',
        'survey_gas_meter',
        'survey_gas_load',
        'survey_date_register',
        'survey_inspetor_name',
        'survey_inspetor_cpf'
    ];
}

