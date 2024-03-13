<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    public function run()
    {
        $tshirtCategoryId = ProductCategory::where('name', 'T Shirt')->value('id');

        Product::create([
            'name' => 'Shirt Zara',
            'product_category_id' => $tshirtCategoryId,
            'description' => 'Hadirkan sentuhan klasik dan inovasi yang tak terbantahkan dengan T-Shirt Adidas, sebuah ikon dalam dunia olahraga dan gaya yang menyatu. Dengan desain yang menggabungkan keanggunan dan keberanian, T-Shirt ini menandakan keanggunan streetwear yang tak lekang oleh waktu.',
            'price' => 790.00,
            'stock' => 4,
            'status' => 'active',
        ]);
        Product::create([
            'name' => 'Shirt Uniqlo',
            'product_category_id' => $tshirtCategoryId,
            'description' => 'Hadirkan semangat olahraga dan gaya hidup aktif ke dalam lemari pakaian Anda dengan T-Shirt Nike, sebuah simbol keunggulan dalam dunia atletik dan gaya. Desainnya yang dinamis dan inovatif mencerminkan semangat perjuangan serta dedikasi untuk mencapai prestasi terbaik.',
            'price' => 290.00,
            'stock' => 2,
            'status' => 'active',
        ]);
        Product::create([
            'name' => 'Shirt Balenciaga',
            'product_category_id' => $tshirtCategoryId,
            'description' => 'Tampilkan gaya penuh keberanian dan keanggunan dengan T-Shirt Balenciaga, sebuah karya fashion yang menciptakan pernyataan tanpa kata. Dengan desain yang revolusioner dan tajam, baju ini menggabungkan keunggulan teknis dengan estetika urban yang tak tertandingi.',
            'price' => 790.00,
            'stock' => 3,
            'status' => 'active',
        ]);
        Product::create([
            'name' => 'Shirt Ralph Lauren',
            'product_category_id' => $tshirtCategoryId,
            'description' => 'Genggam esensi gaya klasik dan kemewahan dengan T-Shirt Ralph Lauren, sebuah karya seni fashion dari brand ikonik ini. Dibuat dengan keahlian tinggi dan perhatian terhadap detail, T-Shirt ini memadukan gaya preppy yang timeless dengan kenyamanan tak tertandingi.',
            'price' => 990.00,
            'stock' => 7,
            'status' => 'active',
        ]);

        $accessoriesCategoryId = ProductCategory::where('name', 'Accessories')->value('id');

        Product::create([
            'name' => 'Rings Tiffany & Co Eternal Elegance',
            'product_category_id' => $accessoriesCategoryId,
            'description' => 'Hadirkan kilauan keabadian dan keanggunan dalam setiap detik dengan Cincin Eternal Elegance dari Tiffany & Co., sebuah mahakarya perhiasan dari salah satu brand terkenal di dunia. Cincin ini adalah perpaduan sempurna antara desain yang anggun dan kemewahan bahan, menciptakan simbol keindahan yang abadi.',
            'price' => 590.00,
            'stock' => 10,
            'status' => 'active',
        ]);
        Product::create([
            'name' => 'Rings Cartier Timeless Splendor',
            'product_category_id' => $accessoriesCategoryId,
            'description' => 'Mari menjelajahi puncak kemewahan dengan Cincin Kemegahan Abadi dari Cartier, sebuah mahakarya dari merek mewah terkemuka. Dibuat dengan presisi yang teliti, cincin ini adalah bukti dari komitmen Cartier terhadap keanggunan abadi dan keahlian yang halus.',
            'price' => 990.00,
            'stock' => 7,
            'status' => 'active',
        ]);
        Product::create([
            'name' => 'Rolex Timeless Precision',
            'product_category_id' => $accessoriesCategoryId,
            'description' => 'Sambut ketepatan waktu dengan kemewahan tak terbantahkan, lewat Jam Tangan Rolex Timeless Precision, sebuah karya tangan terbaik dari rumah horologi bergengsi ini. Menggabungkan desain yang elegan dan kecanggihan teknis, jam tangan ini adalah manifestasi sempurna dari presisi yang melekat pada setiap detiknya.',
            'price' => 990.00,
            'stock' => 7,
            'status' => 'active',
        ]);

        $shoesCategoryId = ProductCategory::where('name', 'Shoes')->value('id');
        Product::create([
            'name' => 'Nike Air Force',
            'product_category_id' => $shoesCategoryId,
            'description' => 'Nike Air Force adalah sebuah sepatu ikonik yang telah menjadi bagian integral dari budaya sneaker selama beberapa dekade. Dikenal karena desainnya yang klasik dan serbaguna, sepatu ini menampilkan siluet rendah dengan sol karet tebal yang memberikan kenyamanan dan daya tahan. ',
            'price' => 800.00,
            'stock' => 7,
            'status' => 'active',
        ]);
        Product::create([
            'name' => 'Adidas Stan Smith',
            'product_category_id' => $shoesCategoryId,
            'description' => 'Adidas Stan Smith adalah sepatu klasik yang terkenal dengan desainnya yang bersih, sederhana, dan elegan. Sepatu ini dinamai dari pemain tenis legendaris, Stan Smith, dan telah menjadi salah satu ikon dalam dunia sneaker fashion. ',
            'price' => 900.00,
            'stock' => 6,
            'status' => 'active',
        ]);
        Product::create([
            'name' => 'Nike Dunk Panda',
            'product_category_id' => $shoesCategoryId,
            'description' => 'Nike Dunk Panda adalah varian spesifik dari Nike Dunk yang menampilkan desain yang menggambarkan tema panda. Sepatu ini biasanya memiliki kombinasi warna hitam dan putih yang meniru pola warna karakteristik panda.  ',
            'price' => 750.00,
            'stock' => 10,
            'status' => 'active',
        ]);
        Product::create([
            'name' => 'Adidas Samba',
            'product_category_id' => $shoesCategoryId,
            'description' => 'Adidas Samba adalah sepatu olahraga yang awalnya dirancang sebagai sepatu sepak bola, tetapi kemudian menjadi populer di luar lapangan olahraga dan berkembang menjadi salah satu ikon dalam dunia fashion kasual.',
            'price' => 950.00,
            'stock' => 5,
            'status' => 'active',
        ]);

        $pantsCategoryId = ProductCategory::where('name', 'Pants')->value('id');

        Product::create([
            'name' => 'Jeans Levis Classic Comfort',
            'product_category_id' => $pantsCategoryId,
            'description' => 'Hadapi gaya hidup dengan kenyamanan klasik dalam Celana Jeans Levis Classic Comfort. Dibuat oleh brand ikonik ini, celana jeans ini menjadi perwujudan dari keandalan dan gaya tak lekang oleh waktu.',
            'price' => 550.00,
            'stock' => 7,
            'status' => 'active',
        ]);
        Product::create([
            'name' => 'Jeans Urban Elegance',
            'product_category_id' => $pantsCategoryId,
            'description' => 'Temukan keseimbangan antara gaya perkotaan dan keanggunan dalam Celana Jeans Urban Elegance - sebuah pilihan yang merepresentasikan inovasi dan keunikan fashion. Dibuat dengan perhatian terhadap detail dan kualitas tinggi, celana jeans ini menggabungkan kenyamanan sehari-hari dengan sentuhan modern yang tak terlupakan.',
            'price' => 550.00,
            'stock' => 9,
            'status' => 'active',
        ]);
        Product::create([
            'name' => 'Jeans City Chic-Exquisite',
            'product_category_id' => $pantsCategoryId,
            'description' => 'Hadiri kehidupan perkotaan dengan gaya yang chic dan inovatif dalam Celana Jeans City Chic dari Brand Exquisite. Dibuat dengan kecermatan dan dedikasi terhadap fashion modern, celana jeans ini menjadi simbol dari keanggunan yang selaras dengan ritme dinamis kota.',
            'price' => 750.00,
            'stock' => 10,
            'status' => 'active',
        ]);
    }
}
