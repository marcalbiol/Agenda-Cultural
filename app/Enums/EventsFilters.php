<?php

namespace App\Enums;


enum EventsFilters: string
{
    case CODI = 'codi';
    case DENOMINACI = 'denominaci';
    case DATA_INICI = 'data_inici';
    case DATA_FI = 'data_fi';
    case COMARCA_I_MUNICIPI = "comarca_i_municipi";
    case TAGS_CATEGO_ES = "tags_categor_es";
}

