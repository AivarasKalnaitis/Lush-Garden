<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Product;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'title' => 'Red Grass Palm',
                'slug' => 'red-grass-palm',
                'price' => 134.95,
                'vat' => 2,
                'description' => 'Brahea armata is a single-stemmed, evergreen palm tree that grows slowly but can reach a height of 13 metres. The unbranched stem can be up to 45cm in diameter; it is topped by a crown of 25 - 30 leaves. The edible fruits are sometimes gathered from the wild and used locally.',
                'quantity' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'title' => 'Blue Hesoer Palm',
                'slug' => 'blue-hesper-palm',
                'price' => 98.50,
                'vat' => 1,
                'description' => 'Truly one of the most architecturally dynamic plant available in Southern California is the Red Grass Palm, scientifically known as Cordyline australis ‘Red Star’. When found in nurseries, the plant is surprisingly deceitful when in its infancy due to the fact that it looks so much like the New Zealand Flax, or Phormium tenax. One might grab one in a hurry thinking they selected a Flax only to be it landing and find in 2 years down the lines….it’s tripled in height!  It’s narrow slender trunk accents vertical walls where height is needed, and bold dark purplish-crimson strappy leaves add a strong color and textural contrast to light backgrounds.',
                'quantity' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'title' => 'Umbrella Thorn Acacia',
                'slug' => 'umbrella-thorn-acacia',
                'price' => 280,
                'vat' => 1,
                'description' => 'The bark has a rough feel and is grey to black in colour. The tree has a combination of one straight thorn with a small hooked thorn alongside. The thorns are thin and grow in pairs. The flowers form in clusters on old wood. The flowers themselves are creamy, white, balls. The pods are a distinctive pale, gold brown colour and are curled and twisted. The leaves are very small giving the umbrella a soft, feathery appearance. Browsing animals eat the leaves together with the thorns, the latter more easily when young and soft. The older, hardened thorns can be a deterrent to over-browsing. The thorns are sharp and white, with some straight and others hooked. They are arranged singly or in pairs.',
                'quantity' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'title' => 'Japanese Fire Maple',
                'slug' => 'japanese-fire-maple',
                'price' => 93.95,
                'vat' => 2,
                'description' => 'You will love the vivid autumn color display that slowly changes from summer green to blaze orange, and finally deepens into the most amazing scarlets and luscious purples. The fall color holds for several weeks, a glorious end to your growing season. Go ahead and make your neighbors jealous! Brandywine Maple will be one of the most beautiful trees on your block or in your neighborhood. Get ready to have people slow down and stare!',                'quantity' => 12,
                'quantity' => 22,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'title' => 'Lydwood Gold Forsythia',
                'slug' => 'lydwood-gold-forsythia',
                'price' => 17.20,
                'vat' => 1,
                'description' => 'You will love the vivid autumn color display that slowly changes from summer green to blaze orange, and finally deepens into the most amazing scarlets and luscious purples. The fall color holds for several weeks, a glorious end to your growing season. Go ahead and make your neighbors jealous! Brandywine Maple will be one of the most beautiful trees on your block or in your neighborhood. Get ready to have people slow down and stare!',                'quantity' => 12,
                'quantity' => 23,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'title' => 'Baobab',
                'slug' => 'baobab',
                'price' => 570,
                'vat' => 1,
                'quantity' => 9,
                'description' => 'Baobab is a tree of the African tropics. It is seldom more than 40 feet tall but has an enormously thick trunk which can be as much as 30 feet in diameter, making it almost as wide as it is high. The spongy tissue of the trunk holds water which enables the tree to withstand drought conditions. Baobab bark is used as a source of fiber for ropes and for paper-making. The tree has large white hanging flowers and fruits known as "monkey bread". Fruit pulp is used to make a lemonade-like drink. Makes a great house plant or patio plant! ',                'quantity' => 23,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'title' => 'Betula Birch',
                'slug' => 'betula-birch',
                'price' => 74.99,
                'vat' => 3,
                'quantity' => 27,
                'description' => 'The bright white, gently exfoliating bark develops at a young age, so you do not have to wait long to enjoy it. The beautiful bark provides interest year round. Delicate, deciduous foliage creates an airy canopy and the light, dappled shade it produces is another reason \'Trinity College\' is ideal for small gardens.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'title' => 'Cactus Flower',
                'slug' => 'cactus-flower',
                'price' => 28.75,
                'vat' => 1,
                'quantity' => 30,
                'description' => 'Nurturing our relationship with nature creates a desire to decorate with plant and greenery in our homes. Watery succulents and fresh cacti are scattered from table-top to windowsill, catching the afternoon sun\'s rays. Friendly succulents prosper in any space, while the cactus\' rough exterior is brightened by its soft flowers that bloom in the summer warmth.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'title' => 'Cedar',
                'slug' => 'cedar',
                'price' => 12.99,
                'vat' => 3,
                'quantity' => 26,
                'description' => 'These gorgeous evergreen trees grow in a beautiful conical shape. They are slow growers and grow at a rate of up to 1 foot per year. They will do well in most soil conditions but do prefer fertile, moist soil with good drainage.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'title' => 'English Ivy',
                'slug' => 'english-ivy',
                'price' => 12,
                'vat' => 1,
                'quantity' => 26,
                'description' => 'English ivy or Hedra helix is a climbing plant. It has long flexible stems and small triangular leaves. It is not difficult because it is satisfied with any type of soil (well drained and fresh) and exposure with a preference for shade. To maintain its colour, 2-3 hours of sun exposure per day are beneficial. It is sold in a decorative pot but do not hesitate to make it live in arches or trellises to allow it to expand and grow.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'title' => 'Holywood Juniper',
                'slug' => 'holywood-juniper',
                'price' => 39.95,
                'vat' => 3,
                'quantity' => 19,
                'description' => 'The Hollywood Juniper is a classic coniferous evergreen shrub with a one-of-a-kind twist: Naturally twisted, upright spiraling growth that makes it especially artistic. And it’s versatile because it works well as a single specimen, in foundation plantings, as a windbreak or privacy screen. ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'title' => 'Lombardy Poplar',
                'slug' => 'lombardy poplar',
                'price' => 5.99,
                'vat' => 1,
                'quantity' => 43,
                'description' => 'Fast grower! An improved variety of Lombardy Poplar that is more disease resistant and longer lived. A tall, fast grower, Lombardy Poplar quickly grows 40-50\' high. Plant 5-6\' apart for screening, windbreaks and backgrounds. Zone down to 3. 3-4\' trees shipped.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 13,
                'title' => 'Meadow Sage',
                'slug' => 'meadow-sage',
                'price' => 4.59,
                'vat' => 1,
                'quantity' => 56,
                'description' => 'Salvia sylvestris ‘May Night’ (May Night Sage) blooms prolifically with deep purple-blue flowers. It is an outstanding perennial with excellent cold hardiness, vigor, and tolerance of heavy clay soils. Blooming in late spring with a profusion of flower spikes, it reblooms later in the summer when deadheaded.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 14,
                'title' => 'Lime Bamboo',
                'slug' => 'lime-bamboo',
                'price' => 19.99,
                'vat' => 2,
                'quantity' => 24,
                'description' => 'The new foliage of this handsome nandina emerges each spring a yellowy green, but over time they turn aricher lime green. When grown in a sunnier spot, the leaf colour will remain quite bright, but in areas where the foliage is in shade (or towards the centre of the plant), the foliage becomes a darker green.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 15,
                'title' => 'Palm',
                'slug' => 'palm',
                'price' => 150,
                'vat' => 3,
                'quantity' => 32,
                'description' => 'Because of the way they grow, palm trees cannot be propagated through the asexual means used to propagate many trees. Air layering, cuttings, and division are for the most part not effective when starting palm trees. Usually, the only way to start a palm tree is from seed.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 16,
                'title' => 'Red Spurce',
                'slug' => 'red-spruce',
                'price' => 12.50,
                'vat' => 1,
                'quantity' => 57,
                'description' => 'Red spruce features deep green needles set thickly on rusty red twigs.  It can be distinguished from White spruce, which has much lighter and longer needles, and Black spruce, which has shorter needles with a bluish tint, fairly easily.  Old red spruce can be huge, with 4-plus foot diameter trunks and 150-foot tall crowns.  As the trees age, the bark takes on a uniform, platy appearance - Since lower limbs often drop off in closed-canopy situations, you might confuse an old red spruce for a hardwood if you don\'t look up at the crown.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 17,
                'title' => 'Sequoia',
                'slug' => 'sequoia',
                'price' => 2000,
                'vat' => 3,
                'quantity' => 3,
                'description' => 'It is the sole living species in the genus Sequoiadendron, and one of three species of coniferous trees known as redwoods, classified in the family Cupressaceae in the subfamily Sequoioideae, together with Sequoia sempervirens (coast redwood) and Metasequoia glyptostroboides (dawn redwood). Giant sequoia specimens are the most massive trees on Earth',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 18,
                'title' => 'Sakura',
                'slug' => 'sakura',
                'price' => 420,
                'vat' => 2,
                'quantity' => 12,
                'description' => 'While all cherry blossoms share some common traits, there are some striking differences found within the Japanese cherry tree flower (sakura) family. Take a closer look and you\'ll find variation in color, shape, size, and more. While most Japanese sakura blossoms are a shade of pale pink, they can be white, dark pink, or even yellow! In fact, Japan is landing to over 200 varieties of Japanese cherry trees, including wild and cultivated types. Here are some of the most common varieties of sakura blossoms in Japan - see if you can spot them in the wild.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 19,
                'title' => 'Tiger Eye Pansy',
                'slug' => 'tiger-eye-pansy',
                'price' => 37.5,
                'vat' => 1,
                'quantity' => 42,
                'description' => 'An excellent variety that will definitely catch your eye! Petite rusty-red blooms with striking black veins and a yellow central blotch. A unique, extra early flowering Viola that is a non-stop bloomer all summer long. Perfect for all occasions, a great fall performer in containers or in garden beds',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 20,
                'title' => 'Apple Tree',
                'slug' => 'apple-tree',
                'price' => 79.50,
                'vat' => 3,
                'quantity' => 54,
                'description' => ' Apple Tree is an heirloom variety of apple that is grown for its outstanding and unique flavor as an eating apple. This juicy, crisp apple has the perfect balance of sweet and tart, and a unique spicy flavor you will love. It crops well every year, with large, round apples that begin to ripen in mid-October and store well through the winter.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 21,
                'title' => 'Tulip Poplar',
                'slug' => 'tulip-poplar',
                'price' => 139.95,
                'vat' => 1,
                'quantity' => 22,
                'description' => 'Imagine leaving for work one morning during spring: before you leave, you notice 3 to 4 small blooms on your tree. When you come landing that evening, that same tree is covered in a blanket of richly-hued florals. With the Tulip Poplar, a dazzling production and fast growth are not only possible but expected.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 22,
                'title' => 'Virginia Pine',
                'slug' => 'virginia-pine',
                'price' => 11.99,
                'vat' => 3,
                'quantity' => 31,
                'description' => 'Virginia Pine Tree is a slow-growing evergreen tree that, due to its ability to take root and grow where other trees cannot, is sometimes called the “Scrub Pine” for its rough appearance. In New Jersey, it is also called the Jersey Pine, as southern NY and NJ are the northernmost parts of its native range, which is typically along the eastern and western slopes of the Appalachian Mountains. True to its scruffy appearance, it thrives on neglect and drought conditions, and in well-drained soils with acidic or neutral pH, sandy loams, and heavy clay.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 23,
                'title' => 'Wintergreen Boxwood',
                'slug' => 'wintergreen-boxwood',
                'price' => 54.99,
                'vat' => 3,
                'quantity' => 40,
                'description' => 'The Wintergreen Boxwood, Buxus sinica var. Insularis ‘Wintergreen’, is a cold tolerant, slow growing broadleaf evergreen can be planted individually or in containers as an accent. These are perfect for growing evergreen hedges and garden borders. Gardeners can also prune these shrubs into unique shapes by heavy pruning initially, then light maintenance after that. Create globes, boxes, ovals and even topiary and bonsai. New growth emerges bright green in the spring and hardens off to a darker green.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 24,
                'title' => 'Birds Of Paradise',
                'slug' => 'birds-of-paradise',
                'price' => 9.50,
                'vat' => 1,
                'quantity' => 14,
                'description' => 'The original name is Strelitzia and it is a native of South Africa. In South Africa, it is also known as Crane Flower and features in their 50 cent coin. This stunning and dreamy flower symbolizes magnificence, freedom, optimism, royalty, paradise on earth, success, and faithfulness. As an anniversary gift, you may opt for this flower.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 25,
                'title' => 'Encaphalatros Woodii',
                'slug' => 'encaphalatros-woodii',
                'price' => 370,
                'vat' => 1,
                'quantity' => 4,
                'description' => 'Encephalartos woodii is a very handsome plant. The leaves are a dark glossy green, 2 to 3 m long, with a gracefully arching shape, giving this cycad a dense umbrella-shaped crown, even in young specimens. The Kirstenbosch specimen is unbranched, but mature specimens are often branched at the crown. Encephalartos woodii reaches majestic proportions, up to 6 m in height with a trunk diameter of up to 900 mm at the base, 600 mm nearer the crown. The 100+ year-old specimens at Durban Botanic Gardens trunk circumference exceeds 2 m and has an estimated mass of 2,5 tons.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 26,
                'title' => 'Purple Lilac',
                'slug' => 'purple-lilac',
                'price' => 8.99,
                'vat' => 1,
                'quantity' => 37,
                'description' => 'Lilacs belong originally to Europe and Asia and the European colonists brought this to America. And now you will see bushes of lilacs intensively all over North America. These beautiful flowers are widely popular for their aromatherapy qualities. The soothing fragrance relieves stress and anxiety. Lilacs symbolize innocence, remembrance of love, and are often gifted to the fresh graduates.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 27,
                'title' => 'Lilly Of The Valley',
                'slug' => 'valley-lilly',
                'price' => 11.99,
                'vat' => 2,
                'quantity' => 19,
                'description' => 'Lily of the valley is a highly poisonous woodland flowering plant which has sweet-scented and bell-shaped white flowers. The native regions stretch throughout the cool temperate Northern Hemisphere in Asia and Europe. It symbolizes a return to happiness, purity, humbleness, chastity, happiness, and luck.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 28,
                'title' => 'Rafflesia Flower',
                'slug' => 'rafflesia-flower',
                'price' => 640,
                'vat' => 1,
                'quantity' => 4,
                'description' => 'Rafflesia Flower is a parasitic plant which absorbs nutrients from its host. Interestingly it has no leaves, stems, roots and only has nutrients. Its distinctive feature is the five huge petals with the diameter reaching 100 centimeters and its weight can reach 10 kilograms! The petals are red with dots and its texture resembles leather, its center is like a bowl that swallows flies and insects for its nutrients. This flower is rare and hard to find! ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 29,
                'title' => 'black Tree Fern',
                'slug' => 'black-tree-fern',
                'price' => 54.99,
                'vat' => 2,
                'quantity' => 26,
                'description' => 'Also known as the black tree fern, this large tree fern is native across the south-west Pacific from Fiji to New Zealand. Grows up to 20m tall with characteristic black trunks and black-stalked leaves that can reach 5m long. Older specimens will drop their fronds, which leave behind hexagonal patterned scars. Common in the wetter coastal areas in the wild, Cyathea Medullaris’ trunk wood is used as rough building material. Minimum temperature -5°C. Protect from hard freezes.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 30,
                'title' => 'Honey Spurge',
                'slug' => 'honey-spurge',
                'price' => 44.65,
                'vat' => 2,
                'quantity' => 18,
                'description' => 'One of the finest shrubby plant in cultivation, this gem has large, creamy-veined leathery leaves topped by outstanding golden, fragrant flower heads. The name \'mellifera\' refers to the sweet fragrance of honey which on a warm day will drift across the garden amazing all who are nearby.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 31,
                'title' => 'Olive Tree',
                'slug' => 'olive-tree',
                'price' => 69.50,
                'vat' => 1,
                'quantity' => 31,
                'description' => 'Olive Tree is an ideal choice to plant in warmer, dryer parts of the country. Not only are these attractive, tough trees, which are very drought and heat tolerant, they will also produce crops of olives that you can prepared for eating, or you can even produce your own extra-virgin olive oil. This is a very ornamental small tree, with lots of character, and it is ideal for dry, sunny areas. It can be grown as a specimen tree, or as a screen, and no matter how dry the conditions, it will thrive. If you live in colder regions the Arbequina Olive Tree grows well in a pot, making a handsome small tree.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 32,
                'title' => 'Color Guard Yucca',
                'slug' => 'color-guard-yucca',
                'price' => 39.95,
                'vat' => 3,
                'quantity' => 15,
                'description' => 'Color Guard Yucca is one of the most decorative Yucca varieties you will ever find! This spiky, cactus-like plant has beautifully bright, variegated leaves with a light stripe down the center of each leaf, all arranged in a dramatic, spherical rosette. The pointed, blade-shaped leaves are evergreen. Tiny filaments adorn the edge of the broad, erect leaves year-round, adding texture to the overall effect. Color Guard features a wonderful variegation that will brighten even the darkest corner of your garden. The vivid coloring remains striking in every season.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 33,
                'title' => 'Dragon\'s Blood Tree',
                'slug' => 'dragons-blood-tree',
                'price' => 900,
                'vat' => 1,
                'quantity' => 5,
                'description' => 'The dragon blood tree has a unique and strange appearance, with an "upturned, densely packed crown having the shape of an uprightly held umbrella". This evergreen species is named after its dark red resin, which is known as "dragon\'s blood". Unlike most monocot plant, Dracaena displays secondary growth, D. cinnabari even has growth zones resembling tree rings found in dicot tree species. Along with other arborescent Dracaena species it has a distinctive growth habit called "dracoid habitus"',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        $product = Product::where('id', '=', 1)->first();
        $product->copyMedia('public\img\plants\trees\red_grass_palm.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 2)->first();
        $product->copyMedia('public\img\plants\trees\blue_hesper_palm.jpg')->toMediaCollection('product_images');
    
        $product = Product::where('id', '=', 3)->first();
        $product->copyMedia('public\img\plants\trees\umbrella_thorn_acacia.jpg')->toMediaCollection('product_images');
    
        $product = Product::where('id', '=', 4)->first();
        $product->copyMedia('public\img\plants\trees\japanese_fire_maple.jpg')->toMediaCollection('product_images');
    
        $product = Product::where('id', '=', 5)->first();
        $product->copyMedia('public\img\plants\bushes\lydwood_gold_forsythia.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 6)->first();
        $product->copyMedia('public\img\plants\trees\baobab.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 7)->first();
        $product->copyMedia('public\img\plants\trees\betula_birch.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 8)->first();
        $product->copyMedia('public\img\plants\flowers\cactus_flower.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 9)->first();
        $product->copyMedia('public\img\plants\trees\cedar.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 10)->first();
        $product->copyMedia('public\img\plants\bushes\english_ivy.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 11)->first();
        $product->copyMedia('public\img\plants\bushes\hollywood_juniper.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 12)->first();
        $product->copyMedia('public\img\plants\trees\lombardy_poplar.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 13)->first();
        $product->copyMedia('public\img\plants\bushes\meadow_sage.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 14)->first();
        $product->copyMedia('public\img\plants\bushes\nandina_lemon_lime_bamboo.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 15)->first();
        $product->copyMedia('public\img\plants\trees\palm.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 16)->first();
        $product->copyMedia('public\img\plants\trees\red_spruce.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 17)->first();
        $product->copyMedia('public\img\plants\trees\sequoia.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 18)->first();
        $product->copyMedia('public\img\plants\trees\steam_sakura.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 19)->first();
        $product->copyMedia('public\img\plants\flowers\tiger_eye_pansy.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 20)->first();
        $product->copyMedia('public\img\plants\trees\apple_tree.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 21)->first();
        $product->copyMedia('public\img\plants\trees\tulip_poplar.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 22)->first();
        $product->copyMedia('public\img\plants\trees\virginia_pine.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 23)->first();
        $product->copyMedia('public\img\plants\bushes\wintergreen_boxwood.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 24)->first();
        $product->copyMedia('public\img\plants\flowers\birds_of_paradise.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 25)->first();
        $product->copyMedia('public\img\plants\bushes\encephalartos_woodi.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 26)->first();
        $product->copyMedia('public\img\plants\flowers\lilacs.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 27)->first();
        $product->copyMedia('public\img\plants\flowers\lilly_of_the_valley.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 28)->first();
        $product->copyMedia('public\img\plants\flowers\rafflesia_flower.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 29)->first();
        $product->copyMedia('public\img\plants\trees\black_fern_tree.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 30)->first();
        $product->copyMedia('public\img\plants\bushes\honey_spurge.jpeg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 31)->first();
        $product->copyMedia('public\img\plants\trees\olive_tree.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 32)->first();
        $product->copyMedia('public\img\plants\bushes\yucca.jpg')->toMediaCollection('product_images');

        $product = Product::where('id', '=', 33)->first();
        $product->copyMedia('public\img\plants\trees\dragons_blood_tree.jpg')->toMediaCollection('product_images');
    }
}
