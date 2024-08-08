<?php

use App\Models\System;
use Carbon\Carbon;

if (!function_exists('countries')) {
    /**
     * @return string[]
     */
    function countries(): array
    {
        return array(
            "AF" => "Afghanistan",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BA" => "Bosnia and Herzegovina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "BQ" => "British Antarctic Territory",
            "IO" => "British Indian Ocean Territory",
            "VG" => "British Virgin Islands",
            "BN" => "Brunei",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CT" => "Canton and Enderbury Islands",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos [Keeling] Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo - Brazzaville",
            "CD" => "Congo - Kinshasa",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "CI" => "Côte d’Ivoire",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "NQ" => "Dronning Maud Land",
            "DD" => "East Germany",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "FQ" => "French Southern and Antarctic Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GG" => "Guernsey",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard Island and McDonald Islands",
            "HN" => "Honduras",
            "HK" => "Hong Kong SAR China",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IM" => "Isle of Man",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JE" => "Jersey",
            "JT" => "Johnston Island",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Laos",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macau SAR China",
            "MK" => "Macedonia",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "FX" => "Metropolitan France",
            "MX" => "Mexico",
            "FM" => "Micronesia",
            "MI" => "Midway Islands",
            "MD" => "Moldova",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "ME" => "Montenegro",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar [Burma]",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NT" => "Neutral Zone",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "KP" => "North Korea",
            "VD" => "North Vietnam",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PC" => "Pacific Islands Trust Territory",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PS" => "Palestinian Territories",
            "PA" => "Panama",
            "PZ" => "Panama Canal Zone",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "YD" => "People's Democratic Republic of Yemen",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn Islands",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RO" => "Romania",
            "RU" => "Russia",
            "RW" => "Rwanda",
            "RE" => "Réunion",
            "BL" => "Saint Barthélemy",
            "SH" => "Saint Helena",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "MF" => "Saint Martin",
            "PM" => "Saint Pierre and Miquelon",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "RS" => "Serbia",
            "CS" => "Serbia and Montenegro",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SK" => "Slovakia",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and the South Sandwich Islands",
            "KR" => "South Korea",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syria",
            "ST" => "São Tomé and Príncipe",
            "TW" => "Taiwan",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania",
            "TH" => "Thailand",
            "TL" => "Timor-Leste",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UM" => "U.S. Minor Outlying Islands",
            "PU" => "U.S. Miscellaneous Pacific Islands",
            "VI" => "U.S. Virgin Islands",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "SU" => "Union of Soviet Socialist Republics",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States",
            "ZZ" => "Unknown or Invalid Region",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VA" => "Vatican City",
            "VE" => "Venezuela",
            "VN" => "Vietnam",
            "WK" => "Wake Island",
            "WF" => "Wallis and Futuna",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe",
            "AX" => "Åland Islands",
        );
    }
}

if (!function_exists('groupIndexedRoutes')) {
    /**
     * @return array
     */
    function groupIndexedRoutes(): array
    {
        $indexedRoutes = [];
        $resources = roleResourceModels();
        $routes = Route::getRoutes();
        foreach ($routes as $route) {
            $name = $route->getName();
            $group = routeGroup($name);
            if (in_array($group, $resources)) {
                $indexedRoutes[$group][] = $name;
            }
        }
        ksort($indexedRoutes);
        return $indexedRoutes;
    }
}

if (!function_exists('routeGroup')) {
    /**
     * @param string $name
     * @return false|mixed|string
     */
    function routeGroup($name): mixed
    {
        $names = explode('.', $name);
        return $names[0] ?? false;
    }
}

if (!function_exists('roleResourceModels')) {
    /**
     * @return string[]
     */
    function roleResourceModels(): array
    {
        return [
            'task',
            'contact',
            'company',
            'deal',
            'project',
            'contract'
        ];
    }
}

if (!function_exists('systemResource')) {
    /**
     * @return string[]
     */
    function systemResources(): array
    {
        return [
            'system' => __('System Manage'),
            'system.settings' => __('System Settings'),
            'location' => __('Manage Locations'),
            'role' => __('Manage Roles'),
            'user' => __('Manage Users'),
            'theme' => __('Theme Settings'),
            'product' => __('Products'),
            'settings.contract' => __('Contract settings'),
            'settings.deal' => __('Deal settings'),
            'settings.project' => __('Project settings'),
            'settings.task' => __('Task settings'),
            'settings.import' => __('Data Import')
        ];
    }
}

if (!function_exists('dumpVar')) {
    /**
     * @param $data
     */
    function dumpVar($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if (!function_exists('systemConfig')) {
    /**
     * @param string $key
     * @param bool $decrypt
     * @return mixed|null
     */
    function systemConfig(string $key, $decrypt = false)
    {
        $system = System::firstOrNew();
        if ($system && $system->{$key}) {
            $value = $system->{$key};
            if ($decrypt) {
                $value = decrypt($value);
            }
            return $value;
        }
        return null;
    }
}

if (!function_exists('setSMTPConfig')) {
    function setSMTPConfig()
    {
        $system = System::first();
        if ($system && $system->id) {
            config([
                'mail.mailers.smtp.username' => $system->smtp_from_email,
                'mail.mailers.smtp.host' => $system->smtp_host,
                'mail.mailers.smtp.password' => decrypt($system->smtp_password),
                'mail.mailers.smtp.port' => $system->smtp_port,
            ]);
        }
    }
}

if (!function_exists('setLocalization')) {
    function setLocalization()
    {
        $system = System::first();
        if ($system && $system->id) {
            config([
                'app.timezone' => $system->timezone,
                'utility.date_format' => $system->date_format,
                'utility.time_format' => $system->time_format,
                'utility.currency_symbol' => $system->currency_symbol
            ]);
        }
    }
}

if (!function_exists('timezoneDropdown')) {
    /**
     * @return array
     */
    function timezoneDropdown()
    {
        $regions = [
            \DateTimeZone::AFRICA,
            \DateTimeZone::AMERICA,
            \DateTimeZone::ANTARCTICA,
            \DateTimeZone::ASIA,
            \DateTimeZone::ATLANTIC,
            \DateTimeZone::AUSTRALIA,
            \DateTimeZone::EUROPE,
            \DateTimeZone::INDIAN,
            \DateTimeZone::PACIFIC,
        ];

        $timezones = [];
        foreach ($regions as $region) {
            $timezones = array_merge($timezones, \DateTimeZone::listIdentifiers($region));
        }

        $timezone_offsets = [];
        foreach ($timezones as $timezone) {
            $tz = new \DateTimeZone($timezone);
            $timezone_offsets[$timezone] = $tz->getOffset(new \DateTime);
        }

        //sort timezone by offset
        ksort($timezone_offsets);

        $timezone_list = [];
        foreach ($timezone_offsets as $timezone => $offset) {
            $offset_prefix = $offset < 0 ? ' -' : ' +';
            $offset_formatted = gmdate('H:i', abs($offset));

            $pretty_offset = "UTC" . $offset_prefix . $offset_formatted;

            $timezone_list[$timezone] = $timezone . "(" . $pretty_offset . ")";
        }
        $timezones = [];
        foreach ($timezone_list as $key => $value) {
            $region = explode('/', $key)[0];
            $timezones[$region][$key] = str_replace($region . '/', '', $value);
        }
        return $timezones;
    }
}


if (!function_exists('systemDateFormatToJS')) {
    /**
     * @return false|mixed|string
     */
    function systemDateFormatToJS(): string
    {
        return System::DATE_FORMATS_MAP_JS[config('utility.date_format')];
    }
}

if (!function_exists('systemDateFormat')) {
    /**
     * @return false|mixed|string
     */
    function systemDateFormat(): string
    {
        return System::first()?->date_format ?: 'd/m/Y';
    }
}

if (!function_exists('convertToDbDate')) {
    /**
     * @return false|mixed|string
     */
    function convertToDbDate($value): string|null
    {
        return isset($value) ? Carbon::createFromFormat(systemDateFormat(), $value)->format('Y-m-d') : $value;
    }
}

if (!function_exists('isQuickForm')) {
    /**
     * @return false|mixed|string
     */
    function isQuickForm(): string
    {
        return request()->has('quick') && request()->quick;
    }
}

if (!function_exists('formatDate')) {
    /**
     * @param $date
     * @return string
     */
    function formatDate($date)
    {
        return Carbon::parse($date)->locale(app()->getLocale())->translatedFormat(config('utility.date_format'));
    }
}

if (!function_exists('formatDatetime')) {
    /**
     * @param $date
     * @return string
     */
    function formatDatetime($date)
    {
        return Carbon::parse($date)->locale(app()->getLocale())->translatedFormat(config('utility.date_format')) . ' ' . Carbon::parse($date)->locale(app()->getLocale())->translatedFormat(config('utility.time_format'));
    }
}

if (!function_exists('translations')) {
    function translations($json)
    {
        if (!file_exists($json)) {
            return [];
        }

        return json_decode(file_get_contents($json), true);
    }
}

