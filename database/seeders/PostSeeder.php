<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Lorem Ipsum',
            'excerpt' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non finibus nibh. Suspendisse consequat ultrices diam nec convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor eu lectus in tristique. Suspendisse non felis id lectus ullamcorper convallis. Maecenas lectus nunc, ullamcorper in ex nec, porta pellentesque turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit ex ut convallis dictum. Sed rutrum, elit sit amet eleifend gravida, eros lorem posuere orci, at rutrum urna tellus quis purus. Morbi viverra massa quis arcu aliquet, id ultricies mauris rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam vulputate sollicitudin sapien, eu bibendum purus rhoncus ac. Etiam libero ex, tempor a condimentum et, dictum id lacus. Mauris vel pellentesque sapien. Integer porta metus nec massa aliquet consectetur.',
            'user_id' => 1,
            'created_at' => Carbon::create(2020, 4, 6),
        ]);
        DB::table('posts')->insert([
            'title' => 'Lorem Ipsum 2',
            'excerpt' => 'Sed rutrum, elit sit amet eleifend gravida, eros lorem posuere orci, at rutrum urna tellus quis purus. Morbi viverra massa quis arcu aliquet, id ultricies mauris rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
            'body' => 'Aliquam rutrum dolor sit amet lobortis maximus. Aenean sed ligula at neque molestie volutpat sed at mauris. Praesent pellentesque eu est et pharetra. Pellentesque rutrum nulla egestas justo ultricies elementum. Vivamus nec aliquet eros. In mollis augue turpis, a malesuada quam facilisis ac. Mauris vitae suscipit lectus, fermentum vehicula neque. Mauris vehicula placerat velit, at ultricies magna maximus eget. Maecenas convallis orci vitae diam auctor venenatis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam sit amet ipsum et arcu euismod semper eget ut odio. Duis malesuada eu nibh quis consectetur.',
            'user_id' => 1,
            'created_at' => Carbon::create(2020, 9, 23),
        ]);
        DB::table('posts')->insert([
            'title' => 'Ipsum Lorem',
            'excerpt' => 'Maecenas convallis orci vitae diam auctor venenatis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam sit amet ipsum et arcu euismod semper eget ut odio. Duis malesuada eu nibh quis consectetur.',
            'body' => 'Nam mattis consectetur ligula et porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tellus libero, tincidunt sit amet odio quis, tincidunt blandit neque. Vestibulum non molestie mi, a lobortis lorem. Praesent tellus tellus, sollicitudin sit amet convallis eu, efficitur eget est. Integer placerat malesuada mattis. Quisque neque orci, tempor quis justo vel, gravida consequat enim. Quisque porttitor diam quis ex vehicula, euismod accumsan lorem bibendum. Nulla facilisi. Aenean suscipit non tortor at accumsan. Maecenas tincidunt convallis ante, a eleifend erat aliquet eu. Quisque eros tellus, tincidunt in nisl efficitur, rhoncus fermentum sapien. Nullam id arcu a est bibendum malesuada. Mauris pharetra at ante a suscipit.',
            'user_id' => 1,
            'created_at' => Carbon::create(2020, 3, 13),
        ]);
        DB::table('posts')->insert([
            'title' => 'Lorem and also Ipsum',
            'excerpt' => 'Sed fermentum vehicula enim ut interdum. Vestibulum id tristique quam. Vivamus non metus at dui molestie ultrices. Fusce tempus tortor et vestibulum sagittis. Nam at gravida mauris. Pellentesque tempus gravida fringilla. Suspendisse id sem ac turpis feugiat sodales pulvinar scelerisque quam.',
            'body' => 'Praesent sagittis volutpat nisi eu pharetra. Ut sed velit sit amet leo faucibus pellentesque non eu ligula. Curabitur nec varius lorem, non tempor dui. Aliquam faucibus mauris ante, vitae facilisis risus convallis vitae. Duis id pellentesque massa. Donec metus nibh, ultricies sed justo congue, finibus viverra metus. Mauris turpis ipsum, rutrum eget dictum eget, bibendum quis sem. Vestibulum hendrerit, ipsum ut accumsan volutpat, lectus metus gravida neque, vitae pellentesque ante orci in tortor. Aliquam quis varius lacus, sit amet suscipit risus. Nunc vestibulum tellus sed mi posuere, quis tincidunt dui auctor. Aliquam viverra, ligula eget elementum laoreet, nulla justo porttitor dui, in blandit diam leo sit amet nunc. Fusce vestibulum ligula ac lorem commodo, in pretium nunc pellentesque. Maecenas pellentesque lacus at molestie mollis. Nunc quam tortor, dapibus eget massa ut, porttitor fringilla purus.',
            'user_id' => 2,
            'created_at' => Carbon::create(2020, 5, 23),
        ]);
    }
}
