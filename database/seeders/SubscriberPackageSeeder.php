<?php

namespace Database\Seeders;

use App\Models\SubscriberPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriberPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'name' => 'BongPlay Monthly Subscription',
                'type' => 'monthly',
                'description' => json_encode([
                    'Enjoy Exclusive Content',
                    'Ad Free Premium Experience',
                    'In-App Download Available',
                    '5-Device Login & 1-Screen at a Time',
                    'Bangladesh Only',
                    'Price Inclusive of All Taxes'
                ]),
                'price' => 350,
                'validity_as_day' => 30
            ],

            [
                'name' => 'BongPlay Half Year Subscription',
                'type' => '1/2 Year',
                'description' => json_encode([
                    'Enjoy Exclusive Content',
                    'Ad Free Premium Experience',
                    'In-App Download Available',
                    '5-Device Login & 1-Screen at a Time',
                    'Bangladesh Only',
                    'Price Inclusive of All Taxes'
                ]),
                'price' => 750,
                'validity_as_day' => 183
            ],

            [
                'name' => 'BongPlay Yearly Subscription',
                'type' => 'Yearly',
                'description' => json_encode([
                    'Enjoy Exclusive Content',
                    'Ad Free Premium Experience',
                    'In-App Download Available',
                    '5-Device Login & 1-Screen at a Time',
                    'Bangladesh Only',
                    'Price Inclusive of All Taxes'
                ]),
                'price' => 1200,
                'validity_as_day' => 365
            ],
        ];

        foreach ($data as $package){
            try {
                SubscriberPackage::create($package);
            }
            catch (\Exception $exception){
                continue;
            }
        }
    }
}
