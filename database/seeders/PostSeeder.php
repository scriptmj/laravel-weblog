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
            'title' => 'Sharp Flame',
            'excerpt' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non finibus nibh. Suspendisse consequat ultrices diam nec convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor eu lectus in tristique. Suspendisse non felis id lectus ullamcorper convallis. Maecenas lectus nunc, ullamcorper in ex nec, porta pellentesque turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit ex ut convallis dictum. Sed rutrum, elit sit amet eleifend gravida, eros lorem posuere orci, at rutrum urna tellus quis purus. Morbi viverra massa quis arcu aliquet, id ultricies mauris rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam vulputate sollicitudin sapien, eu bibendum purus rhoncus ac. Etiam libero ex, tempor a condimentum et, dictum id lacus. Mauris vel pellentesque sapien. Integer porta metus nec massa aliquet consectetur.',
            'user_id' => 1,
            'created_at' => Carbon::create(2020, 4, 6),
            'updated_at' => Carbon::create(2020, 4, 6),
            'image' => 'imagefiles/092Ut2V4pFG2ZTqUzDKHrk23CpzCbDeudEwlradp.jpg',
        ]);
        DB::table('posts')->insert([
            'title' => 'The Silent Abyss',
            'excerpt' => 'Sed rutrum, elit sit amet eleifend gravida, eros lorem posuere orci, at rutrum urna tellus quis purus. Morbi viverra massa quis arcu aliquet, id ultricies mauris rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
            'body' => 'Aliquam rutrum dolor sit amet lobortis maximus. Aenean sed ligula at neque molestie volutpat sed at mauris. Praesent pellentesque eu est et pharetra. Pellentesque rutrum nulla egestas justo ultricies elementum. Vivamus nec aliquet eros. In mollis augue turpis, a malesuada quam facilisis ac. Mauris vitae suscipit lectus, fermentum vehicula neque. Mauris vehicula placerat velit, at ultricies magna maximus eget. Maecenas convallis orci vitae diam auctor venenatis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam sit amet ipsum et arcu euismod semper eget ut odio. Duis malesuada eu nibh quis consectetur.',
            'user_id' => 1,
            'created_at' => Carbon::create(2020, 9, 23),
            'updated_at' => Carbon::create(2020, 9, 23),
            'image' => 'imagefiles/DQjTDJD6VAeEIdGXQweYECsMjR9u7CJ9NiA36KxH.jpg',
        ]);
        DB::table('posts')->insert([
            'title' => 'Touch of Son',
            'excerpt' => 'Maecenas convallis orci vitae diam auctor venenatis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam sit amet ipsum et arcu euismod semper eget ut odio. Duis malesuada eu nibh quis consectetur.',
            'body' => 'Nam mattis consectetur ligula et porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tellus libero, tincidunt sit amet odio quis, tincidunt blandit neque. Vestibulum non molestie mi, a lobortis lorem. Praesent tellus tellus, sollicitudin sit amet convallis eu, efficitur eget est. Integer placerat malesuada mattis. Quisque neque orci, tempor quis justo vel, gravida consequat enim. Quisque porttitor diam quis ex vehicula, euismod accumsan lorem bibendum. Nulla facilisi. Aenean suscipit non tortor at accumsan. Maecenas tincidunt convallis ante, a eleifend erat aliquet eu. Quisque eros tellus, tincidunt in nisl efficitur, rhoncus fermentum sapien. Nullam id arcu a est bibendum malesuada. Mauris pharetra at ante a suscipit.',
            'user_id' => 1,
            'created_at' => Carbon::create(2020, 3, 13),
            'updated_at' => Carbon::create(2020, 3, 13),
            'image' => 'imagefiles/F3lrKLaMLALC2OkSiCQws6qr2v5aT2IWu90NxvAl.jpg',
        ]);
        DB::table('posts')->insert([
            'title' => 'The Dream\'s Ice',
            'excerpt' => 'Sed fermentum vehicula enim ut interdum. Vestibulum id tristique quam. Vivamus non metus at dui molestie ultrices. Fusce tempus tortor et vestibulum sagittis. Nam at gravida mauris. Pellentesque tempus gravida fringilla. Suspendisse id sem ac turpis feugiat sodales pulvinar scelerisque quam.',
            'body' => 'Proin quis leo interdum, molestie mi vitae, imperdiet dolor. Nam sed quam maximus, volutpat nunc in, maximus libero. Duis maximus sapien at iaculis dapibus. Aliquam dapibus dolor ac facilisis convallis. Duis id porta lorem. Aenean placerat, enim eu auctor fermentum, velit urna faucibus lacus, in laoreet quam nibh eget justo. Maecenas non accumsan ante, vulputate tempor sem. Nulla ultrices diam dapibus urna semper porta. Phasellus ullamcorper tellus quis euismod sodales. Donec condimentum scelerisque nisi, eu interdum magna bibendum ornare. Quisque fermentum lectus eu turpis sagittis pretium. Vivamus quis arcu consequat, accumsan nibh sit amet, efficitur urna. Cras ultrices orci ligula, a consequat arcu interdum in. Donec feugiat urna quis nisl molestie mollis. Nullam posuere varius mi. Cras sit amet sapien quis metus commodo dictum sollicitudin eget lacus.
            <br /><br />
            Fusce dapibus pulvinar est eget posuere. Aenean purus dui, pellentesque quis enim sit amet, eleifend euismod mauris. Cras sed orci odio. Donec fringilla, magna lacinia accumsan interdum, neque massa egestas neque, a lobortis sem augue at sem. Nam non justo elementum, congue lectus in, finibus sem. Nam sed nunc vel leo lobortis sagittis. Sed eget vehicula lacus. Curabitur a felis lectus. Donec bibendum interdum ullamcorper.
            <br /><br />
            Phasellus non vestibulum orci, vitae rutrum mauris. Pellentesque tellus ipsum, aliquam vel neque ac, pretium ultricies ipsum. In mattis urna ac neque maximus, eget scelerisque felis pellentesque. Quisque tristique turpis ac lacus vulputate, ac blandit tellus rutrum. Integer a iaculis ligula. Nunc mauris risus, convallis eu tristique non, viverra ac est. Phasellus aliquam, ligula vitae euismod porta, urna lorem blandit ante, consequat cursus erat nunc et erat. Morbi metus diam, porttitor ac tellus sit amet, lobortis egestas quam. Donec ullamcorper mattis lacus, euismod egestas purus. Cras posuere mauris eget mi varius rhoncus. Nam id lacus ut velit imperdiet laoreet ac a nunc. Mauris purus tortor, placerat et lorem vitae, egestas aliquam lacus..',
            'user_id' => 2,
            'created_at' => Carbon::create(2020, 5, 23),
            'updated_at' => Carbon::create(2020, 5, 23),
            'image' => 'imagefiles/FdWcb32SHcUL7pm75IKb9BrzSYR6I8etslhV83N8.jpg',
        ]);
        
        DB::table('posts')->insert([
            'title' => 'The Girl of the Dreams',
            'excerpt' => 'Etiam sit amet lacinia libero. Duis at sapien nec mi placerat dictum vitae id nisl.',
            'body' => 'Duis vel sodales eros, tristique pretium eros. Duis maximus ipsum elit, elementum tincidunt lacus consectetur et. Phasellus in mauris eu felis cursus dignissim non quis ex. Mauris et finibus massa, non molestie turpis. Duis mauris orci, rutrum et justo nec, imperdiet rhoncus turpis. Integer laoreet commodo mattis. Aenean quis metus pharetra ante sodales ornare. Quisque porttitor ligula et sem aliquet, vitae rutrum libero laoreet. Nunc ligula nunc, tempus et congue non, vulputate et enim.
            <br /><br />
            Vestibulum orci leo, pretium eu tempus id, mollis et nisl. Integer ullamcorper, risus sed convallis volutpat, dui lectus accumsan arcu, nec sollicitudin nunc nulla in leo. Nam accumsan convallis scelerisque. Mauris id dignissim ante. Nam interdum leo sit amet urna posuere, eu sollicitudin sapien tincidunt. Proin purus est, ornare a diam sed, iaculis hendrerit purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas justo arcu, feugiat suscipit tincidunt ac, sollicitudin quis turpis. Proin dui ante, sodales at eros non, vehicula sodales massa. Nulla ac lacus augue.
            <br /><br />
            Etiam sit amet lacinia libero. Duis at sapien nec mi placerat dictum vitae id nisl. Morbi ornare lectus mauris, sed suscipit nunc interdum ut. Mauris scelerisque augue vel libero pulvinar dictum. Aenean elementum fermentum neque sed feugiat. Aenean sodales turpis ac urna blandit pellentesque. Duis sed posuere tellus, ut ornare massa.',
            'user_id' => 2,
            'created_at' => Carbon::create(2020, 9, 23),
            'updated_at' => Carbon::create(2020, 9, 23),
            'image' => 'imagefiles/UFVo7RnkM3d04qaojr3Oj3v8mPJlkn8fl0QBY4Cn.jpg',
        ]);
        DB::table('posts')->insert([
            'title' => 'Ship in the Witches',
            'excerpt' => 'Fusce congue nisi tellus, eget commodo elit tincidunt at. Sed vel est quis lorem ultrices ultrices a eget leo.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consequat ultricies quam, a mollis nunc tempus ut. Sed in nulla vel sem volutpat ullamcorper. Praesent a sapien scelerisque, porta leo non, volutpat ante. Nunc dictum nibh libero, quis rhoncus risus cursus eu. Etiam tincidunt, libero et pharetra efficitur, nisi urna facilisis sapien, in eleifend massa lectus vitae ex. Nam rhoncus ultrices libero quis pulvinar. Cras venenatis nulla dolor, at condimentum justo fermentum in. Curabitur nec odio iaculis, suscipit risus a, luctus dolor. Donec sodales hendrerit diam at volutpat. Maecenas mattis nulla ut diam facilisis, sed malesuada tellus varius. Donec eget luctus neque.
            <br /><br />
            Fusce congue nisi tellus, eget commodo elit tincidunt at. Sed vel est quis lorem ultrices ultrices a eget leo. Nam ac pulvinar justo. Mauris a nisi nulla. Cras quis mattis odio. Nam non luctus nibh. Proin suscipit venenatis odio, sit amet sodales ipsum dapibus id. Proin pretium hendrerit sem porta luctus. Phasellus at felis tincidunt eros fringilla laoreet. Quisque non quam eget augue consequat rhoncus.
            <br /><br />
            Sed ullamcorper gravida bibendum. Phasellus a tristique justo. Donec maximus fringilla elementum. In volutpat, justo vulputate consequat convallis, nisl purus placerat dolor, at rhoncus metus nibh vitae dui. Donec at ligula quis libero faucibus accumsan. Mauris ut arcu ultricies arcu elementum ullamcorper quis id metus. Vivamus volutpat magna nec nisi pretium, eget fermentum nibh finibus. Nullam eu arcu quis ex cursus blandit a et leo. Praesent a arcu non mi sollicitudin elementum nec a lacus. Nulla orci nisl, sollicitudin ut ex nec, rutrum lacinia odio. Curabitur rhoncus ornare lorem id condimentum.',
            'user_id' => 4,
            'created_at' => Carbon::create(2020, 9, 11),
            'updated_at' => Carbon::create(2020, 9, 11),
            'image' => 'imagefiles/UIUfglGN39rkTp2f6Ryauooa4UqnwW7OwSuuNzXh.jpg',
        ]);
        DB::table('posts')->insert([
            'title' => 'The Snow\'s Rainbow',
            'excerpt' => 'Morbi auctor felis sit amet bibendum tincidunt. Nunc ullamcorper purus id condimentum viverra.',
            'body' => 'Suspendisse at libero at tortor fringilla viverra. Duis fringilla ornare tortor, quis fermentum justo mollis in. Vivamus dolor ante, finibus euismod congue ac, egestas a ipsum. Etiam et libero dui. Morbi pellentesque enim magna, eu molestie eros malesuada sit amet. Phasellus at mollis justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris porta massa quis mauris tempus volutpat. Ut vel ultrices velit. Aliquam ornare, odio eget tincidunt condimentum, mauris leo eleifend enim, eget consectetur lectus eros eu velit. Fusce vel dolor libero. Maecenas eu lacinia metus, non auctor metus. Phasellus et est turpis. Sed sed lectus aliquet, tristique risus non, fringilla massa. Donec nec nisi accumsan felis pulvinar finibus eu sed elit.
            <br /><br />
            Nulla ac eleifend arcu, quis tristique mi. Morbi vulputate, risus quis iaculis rutrum, nisi massa blandit ipsum, vel efficitur velit erat vel velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec nibh metus, porttitor vehicula augue vel, congue feugiat sem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc libero diam, pretium sed est non, elementum lacinia enim. Integer blandit aliquam vehicula. Ut eu pulvinar nisl. Donec gravida venenatis leo eu lacinia. Nulla a convallis massa, et maximus est. Praesent maximus magna nec interdum ornare. Cras sit amet enim enim. Maecenas egestas ultricies pretium.
            <br /><br />
            Morbi auctor felis sit amet bibendum tincidunt. Nunc ullamcorper purus id condimentum viverra. Sed a aliquet turpis. Aliquam mollis eros fermentum, tempor justo ut, mattis lacus. Pellentesque a commodo ante. Duis metus tortor, dictum ut eros sit amet, pellentesque varius dui. Fusce rutrum risus purus, in dictum dolor rhoncus ac.',
            'user_id' => 3,
            'created_at' => Carbon::create(2020, 9, 12),
            'updated_at' => Carbon::create(2020, 9, 12),
            'image' => 'imagefiles/WL7rNZMVUs4kBvJEZqSktRMDeeKGdGlsUEJWz5jJ.jpg',
        ]);
    }
}
