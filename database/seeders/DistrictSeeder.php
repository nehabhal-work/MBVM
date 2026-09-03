<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $districts = [
            'अहमदनगर','अकोला','अमरावती','छत्रपती संभाजीनगर (औरंगाबाद)','बीड','भंडारा',
            'बुलढाणा','चंद्रपूर','धुळे','गडचिरोली','गोंदिया','हिंगोली','जळगाव','जालना',
            'कोल्हापूर','लातूर','मुंबई शहर','मुंबई उपनगर','नागपूर','नांदेड','नंदुरबार',
            'नाशिक','उस्मानाबाद (धाराशिव)','पालघर','परभणी','पुणे','रायगड','रत्नागिरी',
            'सांगली','सातारा','सिंधुदुर्ग','सोलापूर','ठाणे','वर्धा','वाशिम','यवतमाळ',
        ];

        foreach ($districts as $name) {
            District::firstOrCreate(['name' => $name]);
        }
    }
}