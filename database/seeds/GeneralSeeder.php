<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Citadine'],
            ['name'=>'Economique'],
            ['name'=>'Compacte 2/4 portes'],
            ['name'=>'Compacte 2/4 portes'],
            ['name'=>'Compact Hybride'],
            ['name'=>'Compacte Cabriolet'],
            ['name'=>'Compacte Limousine'],
            ['name'=>'Compacte Break'],
            ['name'=>'Intermédiaire'],
            ['name'=>'Intermédiaire Hybride'],
            ['name'=>'Grand intermédiaire'],
            ['name'=>'Intermédiaire Cabriolet'],
            ['name'=>'Berline Routière Standard'],
            ['name'=>'Break Standard'],
            ['name'=>'Monospace Standard'],
            ['name'=>'Grande berline (ou break) avec GPS'],
            ['name'=>'Berline Spéciale'],
            ['name'=>'Minibus'],
            ['name'=>'Grand break'],
            ['name'=>'Berline/Break Premium'],
            ['name'=>'Break Premium'],
            ['name'=>'Cabriolet Premium'],
            ['name'=>'Berline Luxe'],
            ['name'=>'Berline Sépciale'],
            ['name'=>'Cabriolet Luxe'],
            ['name'=>'SUV Full Size'],
            ['name'=>'SUV Standard'],
            ['name'=>'SUV Premium'],
            ['name'=>'SUV Special'],
            ['name'=>'Sport'],
            ['name'=>'Cabriolet Spécial']
        ];

        \App\TypeVehicle::insert($data);
        $data1 = [
            ['name'=>'CITROËN'],
            ['name'=>'NISSAN'],
            ['name'=>'KIA'],
            ['name'=>'PEUGEOT'],
            ['name'=>'RENAULT'],
            ['name'=>'DACIA'],
            ['name'=>'ABARTH'],
            ['name'=>'AIXAM'],
            ['name'=>'ALFA ROMEO'],
            ['name'=>'ALPINE'],
            ['name'=>'ASTON MARTIN'],
            ['name'=>'AUDI'],
            ['name'=>'BENTLEY'],
            ['name'=>'BMW'],
            ['name'=>'CADILLAC'],
            ['name'=>'CHEVROLET'],
            ['name'=>'CHRYSLER'],
            ['name'=>'CORVETTE'],
            ['name'=>'CUPRA'],
            ['name'=>'DELOREAN'],
            ['name'=>'DAIHATSU'],
            ['name'=>'DODGE'],
            ['name'=>'DS'],
            ['name'=>'FERRARI'],
            ['name'=>'FIAT'],
            ['name'=>'FORD'],
            ['name'=>'HONDA'],
            ['name'=>'HUMMER'],
            ['name'=>'HYUNDAI'],
            ['name'=>'ISUZU'],
            ['name'=>'INFINITI'],
            ['name'=>'JAGUAR'],
            ['name'=>'JEEP'],
            ['name'=>'LAMBORGHINI'],
            ['name'=>'LANCIA'],
            ['name'=>'LAND ROVER'],
            ['name'=>'LEXUS'],
            ['name'=>'LOTUS'],
            ['name'=>'MASERATI'],
            ['name'=>'MAZDA'],
            ['name'=>'MCLAREN'],
            ['name'=>'MERCEDES'],
            ['name'=>'MINI'],
            ['name'=>'MITSUBISHI'],
            ['name'=>'NISSAN'],
            ['name'=>'OPEL'],
            ['name'=>'PLYMOUTH'],
            ['name'=>'PONTIAC'],
            ['name'=>'PORSCHE'],
            ['name'=>'ROLLS ROYCE'],
            ['name'=>'SAAB'],
            ['name'=>'SEAT'],
            ['name'=>'SHELBY'],
            ['name'=>'SKODA'],
            ['name'=>'SMART'],
            ['name'=>'SSANGYONG'],
            ['name'=>'SUBARU'],
            ['name'=>'SUZUKI'],
            ['name'=>'TESLA'],
            ['name'=>'TOYOTA'],
            ['name'=>'VOLKSWAGEN'],
            ['name'=>'VOLVO'],
        ];

        \App\Marque::insert($data1);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        \App\Content::create([
            'logo' => 'local/logo.png',
            'facebook' => 'www.facebook.com',
            'instagram' => 'www.instagram.com',
            'image1' => 'assets/images/car-1.jpg',
            'image2' => 'assets/images/car-1.jpg',
            'image3' => 'assets/images/about.jpg',
            'h1' => 'Subaru Impreza',
            'h2' => '125',
            'h3' => '',
            'd1' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.',
            'd2' => '',
            'd3' => '',
            'footer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.Lorem ipsum dolor sit amet...',
            'phone' => '1-567-124-44227',
            'email' => 'info@autofirstlocation.com',
            'address' => '182 main street pert habour 8007',
        ]);
    }

}
