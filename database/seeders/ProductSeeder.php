<?php

namespace Database\Seeders;

use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'category_id' => '1',
                'name' => 'Americano',
                'price' => '15000',
                'description' => 'Caffè Americano atau Amerikano adalah minuman kopi yang dibuat dengan mencampurkan satu seloki espresso dengan air panas. Air panas yang digunakan dalam minuman ini sebanyak 6 hingga 8 ons.',
                'image' => 'https://images.unsplash.com/photo-1580661869408-55ab23f2ca6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80'
            ],
            [
                'category_id' => '1',
                'name' => 'Affogato',
                'price' => '30000',
                'description' => 'Affogato, lebih dikenal sebagai "affogato al caffe", adalah hidangan penutup berbahan dasar kopi Italia. Biasanya berbentuk satu sendok gelato rasa susu atau vanila atau es krim dengan topping atau "tenggelam" dengan segelas espresso panas.',
                'image' => 'https://images.unsplash.com/photo-1594631661960-34762327295a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80'
            ],
            [
                'category_id' => '1',
                'name' => 'Coffee Latte',
                'price' => '20000',
                'description' => 'perpaduan antara kopi espresso dan susu yang dapat dinikmati kapan saja, baik dalam keadaan dingin ataupun panas.',
                'image' => 'https://images.unsplash.com/photo-1611077146923-6b4964949f3c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80'
            ],
            [
                'category_id' => '1',
                'name' => 'Cafe Mocha',
                'price' => '20000',
                'description' => 'Moka adalah minuman kopi yang terbuat dari campuran espreso dengan coklat dan susu. Saat ini campuran Moka-Jawa biasa dicampur dengan varietas lainnya untuk menciptakan cita rasa yang khas dan unik.',
                'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2020/08/mocha-001-8301418.jpg'
            ],
            [
                'category_id' => '1',
                'name' => 'Flat White',
                'price' => '15000',
                'description' => 'Flat White adalah dua gelas espresso dengan lapisan microfoam berbuih dari steamed milk. Biasanya, Flat White berwarna putih yang disajikan dalam gelas yang kecil.',
                'image' => 'https://images.unsplash.com/photo-1577968897966-3d4325b36b61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80'
            ],
            [
                'category_id' => '2',
                'name' => 'Americano',
                'price' => '18000',
                'description' => 'Caffè Americano atau Amerikano adalah minuman kopi yang dibuat dengan mencampurkan satu seloki espresso dengan air panas. Air panas yang digunakan dalam minuman ini sebanyak 6 hingga 8 ons.',
                'image' => 'https://images.unsplash.com/photo-1581996323441-538096e854b9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80'
            ],
            [
                'category_id' => '2',
                'name' => 'Affogato',
                'price' => '33000',
                'description' => 'Affogato, lebih dikenal sebagai "affogato al caffe", adalah hidangan penutup berbahan dasar kopi Italia. Biasanya berbentuk satu sendok gelato rasa susu atau vanila atau es krim dengan topping atau "tenggelam" dengan segelas espresso panas.',
                'image' => 'https://www.lawcoffee.com/wp-content/uploads/2018/05/Affogato-Image-e1526754333654.jpg'
            ],
            [
                'category_id' => '2',
                'name' => 'Coffee Latte',
                'price' => '23000',
                'description' => 'perpaduan antara kopi espresso dan susu yang dapat dinikmati kapan saja, baik dalam keadaan dingin ataupun panas.',
                'image' => 'https://www.thecookierookie.com/wp-content/uploads/2021/08/featured-iced-mocha-recipe.jpg'
            ],
            [
                'category_id' => '2',
                'name' => 'Cafe Mocha',
                'price' => '23000',
                'description' => 'Moka adalah minuman kopi yang terbuat dari campuran espreso dengan coklat dan susu. Saat ini campuran Moka-Jawa biasa dicampur dengan varietas lainnya untuk menciptakan cita rasa yang khas dan unik.',
                'image' => 'https://thehealthfulideas.com/wp-content/uploads/2021/08/Iced-Mocha-SQUARE.jpg'
            ],
            [
                'category_id' => '2',
                'name' => 'Flat White',
                'price' => '18000',
                'description' => 'Flat White adalah dua gelas espresso dengan lapisan microfoam berbuih dari steamed milk. Biasanya, Flat White berwarna putih yang disajikan dalam gelas yang kecil.',
                'image' => 'https://images.unsplash.com/photo-1523627375495-afa21473c21d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80'
            ],
            [
                'category_id' => '3',
                'name' => 'Kentang Goreng',
                'price' => '10000',
                'description' => 'Hidangan yang terbuat dari irisan kentang yang digoreng hingga renyah dan kecokelatan. Bisa disantap sebagai makanan pembuka atau sebagai pelengkap hidangan utama.',
                'image' => 'https://sweetrip.id/wp-content/uploads/2022/09/294962864_1392839311197554_6156635326234454761_n.jpg'
            ],
            [
                'category_id' => '3',
                'name' => 'Sosis Bakar',
                'price' => '12000',
                'description' => 'Hidangan yang terbuat dari sosis yang dipanggang yang telah diolah dengan bumbu dan rempah-rempah. cocok untuk disajikan sebagai hidangan utama atau camilan dan dapat dihidangkan dengan roti, nasi atau kentang goreng.',
                'image' => 'https://cdns.klimg.com/merdeka.com/i/w/news/2022/10/07/1479617/content_images/670x335/20221007003917-3-sosis-bakar-004-novi-fuji.jpg'
            ],
            [
                'category_id' => '3',
                'name' => 'Roti Bakar',
                'price' => '12000',
                'description' => 'makanan yang sangat populer terdiri dari irisan roti yang diolesi mentega dan kemudian dipanggang hingga kecoklatan. sangat cocok untuk dinikmati sebagai sarapan atau camilan. Rasanya yang lezat dan teksturnya renyah.',
                'image' => 'https://www.tokomesin.com/wp-content/uploads/2017/10/roti-bakar-coklat-keju.jpg'
            ],
            [
                'category_id' => '3',
                'name' => 'Onion Rings',
                'price' => '12000',
                'description' => 'hidangan gurih yang terdiri dari irisan bawang yang dilapisi dengan tepung roti dan kemudian digoreng hingga renyah dan berwarna kecoklatan sering disajikan dengan saus seperti saus barbekyu atau saus sambal.',
                'image' => 'https://kristineskitchenblog.com/wp-content/uploads/2022/03/crispy-air-fryer-onion-rings-recipe-0775.jpg'
            ],
            [
                'category_id' => '3',
                'name' => 'Croffle',
                'price' => '25000',
                'description' => 'makanan yang terdiri dari perpaduan antara croissant dan waffle. memiliki tekstur renyah di luar dan lembut di dalam, serta memiliki rasa yang unik dan lezat.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/4a/Croffles_5.jpg'
            ],
        ];

        $client = new Client();

        foreach ($data as $item) {
            $response = $client->request('GET', $item['image']);
            $extension = pathinfo($item['image'], PATHINFO_EXTENSION);
            $imageName = uniqid() . '.' . $extension;
            Storage::put('public/images/' . $imageName, $response->getBody());

            Product::insert([
                'category_id' => $item['category_id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'description' => $item['description'],
                'image' => $imageName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
