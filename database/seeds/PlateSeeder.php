<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Plate;
use App\User;


class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $plates = [
           
            
            
            











            //aggiunta starter

            
            [
                'tag_id' => 1,
                'name' => 'Panzerotti',
                'description' => "Mozzarella, pomodoro, olio, origano, sale",
                'price' => '6',
                'ingredients' => "Mozzarella, pomodoro, olio, origano, sale",
                'visible' => true,
                'preview' => '/images/restaurant/panzerotti.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Mozzarella in carrozza',
                'description' => "Pane bianco, mozzarealla di bufala, uova, pan grattato",
                'price' => '4',
                'ingredients' => "Pane bianco, mozzarealla di bufala, uova, pan grattato",
                'visible' => true,
                'preview' => '/images/restaurant/mozzarella-in-carrozza.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Crocchette di patate',
                'description' => "Patate rosse, noce moscata, pepe nero, parmigiano, pangrattato, uova",
                'price' => '4',
                'ingredients' => "Patate rosse, noce moscata, pepe nero, parmigiano, pangrattato, uova",
                'visible' => true,
                'preview' => '/images/restaurant/crocchette-di-patate.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Arancini di riso',
                'description' => "Riso, caciocavallo, burro, zafferano, sale, cipolla, pisellini, carne macinata, olio, pepe nero, passata di pomodoro",
                'price' => '5',
                'ingredients' => "Riso, caciocavallo, burro, zafferano, sale, cipolla, pisellini, carne macinata, olio, pepe nero, passata di pomodoro",
                'visible' => true,
                'preview' => '/images/restaurant/arancini-di-riso.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Insalata di polpo',
                'description' => "Polpo, sedano, alloro, sale, pepe nero in grani, aglio, carote",
                'price' => '7',
                'ingredients' => "Polpo, sedano, alloro, sale, pepe nero in grani, aglio, carote",
                'visible' => true,
                'preview' => '/images/restaurant/insalata-di-polpo.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Caponata di verdure',
                'description' => "Melanzane, cipolle bianche, olive verdi, pinoli, sedano, pomodori, capperi sotto sale, zucchero, basilico",
                'price' => '4',
                'ingredients' => "Melanzane, cipolle bianche, olive verdi, pinoli, sedano, pomodori, capperi sotto sale, zucchero, basilico",
                'visible' => true,
                'preview' => '/images/restaurant/caponata-di-verdure.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Uova in camicia',
                'description' => "Uova, sale grosso, aceto di vino bianco",
                'price' => '4',
                'ingredients' => "Uova, sale grosso, aceto di vino bianco",
                'visible' => true,
                'preview' => '/images/restaurant/uova-in-camicia.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Patatine Fritte',
                'description' => "Patatine, Sale",
                'price' => '4',
                'ingredients' =>"Patatine, Sale",
                'visible' => true,
                'preview' => '/images/restaurant/patatine-fritte.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Verdure Grigliate',
                'description' => "Zucchine, Melanzane, Zucca, Peperoni, Olio, Sale, Prezzemolo",
                'price' => '5',
                'ingredients' =>"Zucchine, Melanzane, Zucca, Peperoni, Olio, Sale, Prezzemolo",
                'visible' => true,
                'preview' => '/images/restaurant/verdure-grigliate.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Patate al Forno',
                'description' => "Patate, Rosmarino, Olio, Sale",
                'price' => '5',
                'ingredients' =>"Patate, Rosmarino, Olio, Sale",
                'visible' => true,
                'preview' => '/images/restaurant/patate-al-forno.webp',
            ],
            [
                'tag_id' => 1,
                'name' => 'Samosa',
                'description' => "Triangolo fritto, ripieno di verdure ",
                'price' => '6',
                'ingredients' =>"Triangolo fritto, ripieno di verdure ",
                'visible' => true,
                'preview' => '/images/restaurant/samosa.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Naan',
                'description' => "Pane cotto nel Tandoor (il tipico forno d’argilla)",
                'price' => '8',
                'ingredients' =>"Pane cotto nel Tandoor (il tipico forno d’argilla)",
                'visible' => true,
                'preview' => '/images/restaurant/naan.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Involtini di Melanzane al forno',
                'description' => "Involtini di Melanzane con Pomodoro e Zucca",
                'price' => '8',
                'ingredients' =>"Involtini di Melanzane con Pomodoro e Zucca",
                'visible' => true,
                'preview' => '/images/restaurant/involtini-di-melanzane-al-forno.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Polpettine al vuna',
                'description' => "Vuna, uova, philadeplhia, parmigiano, pangrattato, prezzemolo",
                'price' => '8',
                'ingredients' => "Vuna, uova, philadeplhia, parmigiano, pangrattato, prezzemolo",
                'visible' => true,
                'preview' => '/images/restaurant/polpettina-al-vuna.jpg',
            ],

            [
                'tag_id' => 1,
                'name' => 'Zuppa di lime messicana',
                'description' => "Brodo vegetale, pomodori, avocado, cipolla rossa, lime, peperoncino, coriandolo, pollo",
                'price' => '8',
                'ingredients' => "Brodo vegetale, pomodori, avocado, cipolla rossa, lime, peperoncino, coriandolo, pollo",
                'visible' => true,
                'preview' => '/images/restaurant/zuppa-di-lime-messicana.jpg',
            ],
            [
                'tag_id' => 1,
                'name' => 'Poke veg',
                'description' => "Riso sushi, edamame, avocado, cetriolo, spinaci, cavolo rosso",
                'price' => '8',
                'ingredients' => "Riso sushi, edamame, avocado, cetriolo, spinaci, cavolo rosso",
                'visible' => true,
                'preview' => '/images/restaurant/poke-veg.jpg',
            ],


            //aggiunta first dishes

            [
                'tag_id' => 2,
                'name' => 'Carbonara',
                'description' => "Spaghetti,Guanciale, Tuorlo d'Uovo, Pecorino romano DOP",
                'price' => '10',
                'ingredients' =>"Spaghetti,Guanciale, Tuorlo d'Uovo, Pecorino romano DOP",
                'visible' => true,
                'preview' => '/images/restaurant/carbonara.jpg',
            ],
            [
                'tag_id' => 2,
                'name' => 'Amatriciana',
                'description' => "Spaghetti,Guanciale, Pomodoro, Pecorino romano DOP",
                'price' => '10',
                'ingredients' =>"Spaghetti,Guanciale, Pomodoro, Pecorino romano DOP",
                'visible' => true,
                'preview' => '/images/restaurant/amatriciana.jpg',
            ],
            [
                'tag_id' => 2,
                'name' => 'Cacio e Pepe',
                'description' => "Spaghetti,Pecorino romano DOP, Pepe",
                'price' => '10',
                'ingredients' =>"Spaghetti,Pecorino romano DOP, Pepe",
                'visible' => true,
                'preview' => '/images/restaurant/cacio-e-pepe.jpg',
            ],
            [
                'tag_id' => 2,
                'name' => 'Marinara',
                'description' => "Spaghetti sugo di mare, aglio, origano, basilico, olio Evo",
                'price' => '6',
                'ingredients' =>"Spaghetti sugo di mare, aglio, origano, basilico, olio Evo",
                'visible' => true,
                'preview' => '/images/restaurant/spaghetti-marinara.jpg',
            ],
            [
                'tag_id' => 2,
                'name' => 'Spaghetti al pesto di Rucola',
                'description' => "Spaghetti integrali, pesto di rucola, olio, mandorle",
                'price' => '7',
                'ingredients' =>"Spaghetti integrali, pesto di rucola, olio, mandorle",
                'visible' => true,
                'preview' => '/images/restaurant/spaghetti-al-pesto-di-rucola.jpg',
            ],
            [
                'tag_id' => 2,
                'name' => 'Lasagne alla bolognese',
                'description' => "Lasagne, carne macinata, carota, cipolla, passata di pomodoro, burro, olio, farina",
                'price' => '15',
                'ingredients' => "Lasagne, carne macinata, carota, cipolla, passata di pomodoro, burro, olio, farina",
                'visible' => true,
                'preview' => '/images/restaurant/lasagne-alla-bolognese.jpg',
            ],
        
            [
                'tag_id' => 2,
                'name' => 'Pasta alla boscaiola',
                'description' => "Pasta a piacere, aglio, salsiccia, funghi, mezzo bicchiere di vino bianco, sale, pepe, prezzemolo",
                'price' => '15',
                'ingredients' => "Pasta a piacere, aglio, salsiccia, funghi, mezzo bicchiere di vino bianco, sale, pepe, prezzemolo",
                'visible' => true,
                'preview' => '/images/restaurant/pasta-alla-boscaiola.jpg',
            ],
            [
                'tag_id' => 2,
                'name' => 'Tagliolini al tartufo bianco',
                'description' => "Tagliolini freschi, tartufo bianco, burro, parmigiano reggiano, sale",
                'price' => '20',
                'ingredients' => "Tagliolini freschi, tartufo bianco, burro, parmigiano reggiano, sale",
                'visible' => true,
                'preview' => '/images/restaurant/tagliolini-al-tartufo-bianco.jpg',
            ],
            [
                'tag_id' => 2,
                'name' => 'Tortellini in brodo',
                'description' => "Tortellini, cipolle, carote, biancostato di manzo, chiodi di garofano",
                'price' => '12',
                'ingredients' => "Tortellini, cipolle, carote, biancostato di manzo, chiodi di garofano",
                'visible' => true,
                'preview' => '/images/restaurant/tortellini-in-brodo.jpg',
            ],
            [
                'tag_id' => 2,
                'name' => 'Pasta al forno',
                'description' => "Rigatoni (pasta corta in generale), passata di pomodoro, mozzarella, besciamella, grana o parmigiano, basilico fresco, olio",
                'price' => '15',
                'ingredients' => "Rigatoni (pasta corta in generale), passata di pomodoro, mozzarella, besciamella, grana o parmigiano, basilico fresco, olio",
                'visible' => true,
                'preview' => '/images/restaurant/pasta-al-forno.jpg',
            ],
            [
                'tag_id' => 2,
                'name' => 'Pasta alla gricia',
                'description' => "Rigatoni, pecorino romano, guanciale, sale fino, pepe nero",
                'price' => '15',
                'ingredients' => "Rigatoni, pecorino romano, guanciale, sale fino, pepe nero",
                'visible' => true,
                'preview' => '/images/restaurant/pasta-alla-gricia.jpg',
            ],
            [
                'tag_id' => 2,
                'name' => 'Pasta alla norma',
                'description' => "Sedani rigati, ricotta di pecora, melanzane, aglio, basilico, pomodori",
                'price' => '17',
                'ingredients' => "Sedani rigati, ricotta di pecora, melanzane, aglio, basilico, pomodori",
                'visible' => true,
                'preview' => '/images/restaurant/pasta-alla-norma.jpg',
            ],


            //aggiunta secondi 

            [
                'tag_id' => 3,
                'name' => 'Gateau di patate',
                'description' => "Patate, salame napoletano, parmigiano reggiano, olio, sale, mozzarella, prosciutto cotto, pepe nero",
                'price' => '7',
                'ingredients' => "Patate, salame napoletano, parmigiano reggiano, olio, sale, mozzarella, prosciutto cotto, pepe nero",
                'visible' => true,
                'preview' => '/images/restaurant/gateau-di-patate.jpg',
            ],
            [
                'tag_id' => 3,
                'name' => 'Omelette',
                'description' => "Uova, sale, latte, olio",
                'price' => '6',
                'ingredients' => "Uova, sale, latte, olio",
                'visible' => true,
                'preview' => '/images/restaurant/omelette.jpg',
            ],
            [
                'tag_id' => 3,
                'name' => 'Salmone al pepe Rosa',
                'description' => "Trancio di salmone di Alaska, prezzemolo, olio Extra Vergine, Pepe Rosa",
                'price' => '12',
                'ingredients' =>"Trancio di salmone di Alaska, prezzemolo, olio Extra Vergine, Pepe Rosa",
                'visible' => true,
                'preview' => '/images/restaurant/salmone-al-pepe-rosa.jpg',
            ],
            [
                'tag_id' => 3,
                'name' => 'Tartare di Tonno',
                'description' => "Tartare di Tonno abbattuto, olio Evo, semi di papavero",
                'price' => '13',
                'ingredients' =>"Tartare di Tonno abbattuto, olio Evo, semi di papavero",
                'visible' => true,
                'preview' => '/images/restaurant/tartare-di-tonno.jpg',
            ],
            [
                'tag_id' => 3,
                'name' => 'Scaloppine di Pollo al Limone',
                'description' => "Fettine di pollo marinate al limone, olio, prezzemolo",
                'price' => '13',
                'ingredients' =>"Fettine di pollo marinate al limone, olio, prezzemolo",
                'visible' => true,
                'preview' => '/images/restaurant/scaloppine-di-pollo-al-limone.jpg',
            ],
            [
                'tag_id' => 3,
                'name' => 'Petti di Tacchino alla Bolognese',
                'description' => "Tacchino, Prosciutto crudo, Parmigiano Reggiano DOP, Marsala, Tartufo Nero",
                'price' => '14',
                'ingredients' =>"Tacchino, Prosciutto crudo, Parmigiano Reggiano DOP, Marsala, Tartufo Nero",
                'visible' => true,
                'preview' => '/images/restaurant/petti-di-tacchino-alla-bolognese.jpg',
            ],
            [
                'tag_id' => 3,
                'name' => 'Petti di Tacchino alla Bolognese',
                'description' => "Tacchino, Prosciutto crudo, Parmigiano Reggiano DOP, Marsala, Tartufo Nero",
                'price' => '14',
                'ingredients' =>"Tacchino, Prosciutto crudo, Parmigiano Reggiano DOP, Marsala, Tartufo Nero",
                'visible' => true,
                'preview' => '/images/restaurant/petti-di-tacchino-alla-bolognese2.jpg',
            ],
            [
                'tag_id' => 3,
                'name' => 'Pollo Tandoori',
                'description' => "Coscie marinare nello yogurt e altre spezie ",
                'price' => '8',
                'ingredients' =>"Coscie marinare nello yogurt e altre spezie ",
                'visible' => true,
                'preview' => '/images/restaurant/pollo-tandoori.jpg',
            ],
            [
                'tag_id' => 3,
                'name' => 'Churrasco',
                'description' => "Carne di Vitello e Maiale alla brace con verdure",
                'price' => '10',
                'ingredients' =>"Carne di Vitello e Maiale alla brace con verdure",
                'visible' => true,
                'preview' => '/images/restaurant/churrasco.jpg',
            ],
            [
                'tag_id' => 3,
                'name' => 'Barbecue',
                'description' => "Grigliata di carne mista",
                'price' => '10',
                'ingredients' =>"Grigliata di carne mista",
                'visible' => true,
                'preview' => '/images/restaurant/barbecue.jpg',
            ],
            [
                'tag_id' => 3,
                'name' => 'Fritto Misto',
                'description' => "Fritto misto di mare",
                'price' => '6',
                'ingredients' =>"Fritto misto di mare",
                'visible' => true,
                'preview' => '/images/restaurant/frittura-di-mare.jpg',
            ],
            


            //aggiunta side dishes

            



            // aggiunta dessert

            [
                'tag_id' => 8,
                'name' => 'Pancakes',
                'description' => "Pancakes americani con frutta e cioccolato",
                'price' => '6',
                'ingredients' =>"Pancakes americani con frutta e cioccolato",
                'visible' => true,
                'preview' => '/images/restaurant/pancakes.jpg',
            ],
            [
                'tag_id' => 8,
                'name' => 'Torta Mimosa',
                'description' => "Soffice pan di spagna aromatizzato al limone",
                'price' => '10',
                'ingredients' =>"Soffice pan di spagna aromatizzato al limone",
                'visible' => true,
                'preview' => '/images/restaurant/torta-mimosa.jpg',
            ],
            [
                'tag_id' => 8,
                'name' => 'Torta al cioccolato',
                'description' => "Torta a tre diversi tipi di cioccolato",
                'price' => '10',
                'ingredients' =>"Torta a tre diversi tipi di cioccolato",
                'visible' => true,
                'preview' => '/images/restaurant/torta-al-cioccolato.jpg',
            ],
            [
                'tag_id' => 8,
                'name' => 'Sacher Torte',
                'description' => "Torta Sacher farcita con marmellata alle pesche, ricoperta di cioccolato fondente",
                'price' => '16',
                'ingredients' =>"Torta Sacher farcita con marmellata alle pesche, ricoperta di cioccolato fondente",
                'visible' => true,
                'preview' => '/images/restaurant/sacher-torte.jpg',
            ],
            [
                'tag_id' => 8,
                'name' => 'Cannolo siciliano',
                'description' => "Ricotta, cioccolato, zucchero, pistacchio",
                'price' => '13',
                'ingredients' => "Ricotta, cioccolato, zucchero, pistacchio",
                'visible' => true,
                'preview' => '/images/restaurant/cannolo-siciliano.jpg',
            ],
            [
                'tag_id' => 8,
                'name' => 'Cheesecake alla fragola',
                'description' => "Fragole, formaggio spalmabile, panna, uova, burro",
                'price' => '7',
                'ingredients' => "Fragole, formaggio spalmabile, panna, uova, burro",
                'visible' => true,
                'preview' => '/images/restaurant/cheesecake-alla-fragola.jpg',
            ],
            [
                'tag_id' => 8,
                'name' => 'Devil cake',
                'description' => "Cioccolato fondente, panna, fecola di patate, cacao",
                'price' => '6',
                'ingredients' => "Cioccolato fondente, panna, fecola di patate, cacao",
                'visible' => true,
                'preview' => '/images/restaurant/devil-cake.jpg',
            ],
        
            [
                'tag_id' => 8,
                'name' => 'Tiramisù',
                'description' => "Caffè, savoiardi, mascarpone, uova, cacao",
                'price' => '6',
                'ingredients' => "Caffè, savoiardi, mascarpone, uova, cacao",
                'visible' => true,
                'preview' => '/images/restaurant/tiramisu.jpg',
            ],
        
            [
                'tag_id' => 8,
                'name' => 'Crostata di ciliegie',
                'description' => "Ciliegie, zucchero, limone, vaniglia, burro, farina",
                'price' => '5',
                'ingredients' => "Ciliegie, zucchero, limone, vaniglia, burro, farina",
                'visible' => true,
                'preview' => '/images/restaurant/crostata-di-ciliegie.jpg',
            ],
        
            [
                'tag_id' => 8,
                'name' => 'Bavarese al mandarino',
                'description' => "Panna, gelatina, latte, tuorli d'uovo, zucchero, baccello di vaniglia, mandarino",
                'price' => '5',
                'ingredients' => "Panna, gelatina, latte, tuorli d'uovo, zucchero, baccello di vaniglia, mandarino",
                'visible' => true,
                'preview' => '/images/restaurant/bavarese-al-mandarino.jpg',
            ],




            // sezione pizze
            [
                'tag_id' => 4,
                'name' => 'Marinara',
                'description' => "Pomodoro S.Marzano, aglio, origano, basilico, olio Evo",
                'price' => '6',
                'ingredients' =>"Pomodoro S.Marzano, aglio, origano, basilico, olio Evo",
                'visible' => true,
                'preview' => '/images/restaurant/pizza-marinara.jpg',    /*    /images/restaurant/pizza-marinara.jpg    */
            ],
            [
                'tag_id' => 4,
                'name' => 'Margherita',
                'description' => "Pomodoro S.Marzano, Fior di Latte, basilico, olio Evo",
                'price' => '6',
                'ingredients' => "Pomodoro S.Marzano, Fior di Latte, basilico, olio Evo",
                'visible' => true,
                'preview' => '/images/restaurant/pizza-margherita.jpg',
            ],
            [
                'tag_id' => 4,
                'name' => 'Americana',
                'description' => "Pomodoro S.Marzano, Fior di Latte, Patatine, basilico, olio Evo",
                'price' => '8',
                'ingredients' =>"Pomodoro S.Marzano, Fior di Latte, Patatine, basilico, olio Evo",
                'visible' => true,
                'preview' => '/images/restaurant/pizza-americana.jpg',
            ],
            [
                'tag_id' => 4,
                'name' => 'Napoli',
                'description' => "Pomodoro S.Marzano DOP, Fior di Latte, Olive di Gaeta, Acciughe di Sciacca",
                'price' => '8',
                'ingredients' =>"Pomodoro S.Marzano DOP, Fior di Latte, Olive di Gaeta, Acciughe di Sciacca",
                'visible' => true,
                'preview' => '/images/restaurant/pizza-napoli.jpg',
            ],
            [
                'tag_id' => 4,
                'name' => 'Bufalina',
                'description' => "Pomodoro S.Marzano DOP, Bufala Campana DOP, basilico, olio Evo",
                'price' => '8',
                'ingredients' =>"Pomodoro S.Marzano DOP, Bufala Campana DOP, basilico, olio Evo",
                'visible' => true,
                'preview' => '/images/restaurant/pizza-Bufala.jpg',
            ],
            [
                'tag_id' => 4,
                'name' => 'Focaccia',
                'description' => "Focaccia, Sale, Olio, ingredienti a scelta",
                'price' => '5',
                'ingredients' =>"Focaccia, Sale, Olio, ingredienti a scelta",
                'visible' => true,
                'preview' => '/images/restaurant/focaccia.png',
            ],
            [
                'tag_id' => 4,
                'name' => 'Capricciosa',
                'description' => "Pomodoro, mozzarella, carciofi, prosciutto cotto, funghi e olive",
                'price' => '7',
                'ingredients' => "Pomodoro, mozzarella, carciofi, prosciutto cotto, funghi e olive",
                'visible' => true,
                'preview' => '/images/restaurant/capricciosa.jpg',
            ],
            [
                'tag_id' => 4,
                'name' => 'Quattro formaggi',
                'description' => "Mozzarella, parmigiano, gorgonzola e provola (quarto formaggio variabile)",
                'price' => '6',
                'ingredients' => "Mozzarella, parmigiano, gorgonzola e provola (quarto formaggio variabile)",
                'visible' => true,
                'preview' => '/images/restaurant/quattro-formaggi.jpg',
            ],
            [
                'tag_id' => 4,
                'name' => 'Quattro stagioni',
                'description' => "Pomodoro, mozzarella, carciofi, prosciutto cotto, funghi e olive. Condimento diviso in quattro spicchi.",
                'price' => '8',
                'ingredients' => "Pomodoro, mozzarella, carciofi, prosciutto cotto, funghi e olive. Condimento diviso in quattro spicchi.",
                'visible' => true,
                'preview' => '/images/restaurant/quattro-stagioni.jpg',
            ],
            [
                'tag_id' => 4,
                'name' => 'Diavola',
                'description' => "Pomodoro, mozzarella e salame piccante",
                'price' => '8',
                'ingredients' => "Pomodoro, mozzarella e salame piccante",
                'visible' => true,
                'preview' => '/images/restaurant/diavola.jpg',
            ],





            //sezione hamburger
            [
                'user_id' => 8,
                'tag_id' => 5,
                'name' => 'Hamburger di Pollo Kid',
                'description' => "Petto di pollo, lattuga, pepe bianco, timo",
                'price' => '6',
                'ingredients' => "Petto di pollo, lattuga, pepe bianco, timo",
                'visible' => true,
                'preview' => '/images/restaurant/mc-chicken.jpg',
            ],
            [
                'user_id' => 3,
                'tag_id' => 5,
                'name' => 'Classico',
                'description' => "Pane al Sesamo, Hamburger di Fassona 320g, Insalata, Pomodoro, *salse",
                'price' => '6',
                'ingredients' =>"Pane al Sesamo, Hamburger di Fassona 320g, Insalata, Pomodoro, *salse",
                'visible' => true,
                'preview' => '/images/restaurant/hamburger-di-fassona.jpg',
            ],
            [
                'user_id' => 3,
                'tag_id' => 5,
                'name' => 'Hamburger di Pollo',
                'description' => "Pane al Sesamo, Petto di Pollo impanato, Insalata, Pomodoro, *salse",
                'price' => '6',
                'ingredients' =>"Pane al Sesamo, Petto di Pollo impanato, Insalata, Pomodoro, *salse",
                'visible' => true,
                'preview' => '/images/restaurant/chickenburger.jpg',
            ],
            [
                'user_id' => 3,
                'tag_id' => 5,
                'name' => 'BaconBurger',
                'description' => "Pane al Sesamo, Hamburger di Maiale, Formaggio, Bacon, *salse",
                'price' => '6',
                'ingredients' =>"Pane al Sesamo, Hamburger di Maiale, Formaggio, Bacon, *salse",
                'visible' => true,
                'preview' => '/images/restaurant/baconburger.jpg',
            ],
            [
                'user_id' => 10,
                'tag_id' => 5,
                'name' => 'Carbonaro',
                'description' => "Pane al Sesamo, Hamburger di Fassona 320g, Insalata, Pomodoro, *salse",
                'price' => '6',
                'ingredients' =>"Pane al Sesamo, Hamburger di Fassona 320g, Insalata, Pomodoro, *salse",
                'visible' => true,
                'preview' => '/images/restaurant/carbonaro.jpg',
            ],
            [
                'user_id' => 10,
                'tag_id' => 5,
                'name' => 'Veggie Burger',
                'description' => "Lenticchie secche, sale fino, paprika dolce, uova, erba cipollina, pepe nero",
                'price' => '8',
                'ingredients' => "Lenticchie secche, sale fino, paprika dolce, uova, erba cipollina, pepe nero",
                'visible' => true,
                'preview' => '/images/restaurant/veggie-burger.jpg',
            ],
            [
                'user_id' => 4,
                'tag_id' => 5,
                'name' => 'Hamburger di ceci',
                'description' => "Pane al Sesamo, Hamburger di Ceci, Formaggio, Bacon, *salse",
                'price' => '8',
                'ingredients' =>"Pane al Sesamo, Hamburger di Ceci, Formaggio, Bacon, *salse",
                'visible' => true,
                'preview' => '/images/restaurant/hamburger-di-ceci.jpg',
            ],



            //sezione vegetariana
            [ 
                'tag_id' => 7,
                'name' => 'Veggie Burger',
                'description' => "Lenticchie secche, sale fino, paprika dolce, uova, erba cipollina, pepe nero",
                'price' => '8',
                'ingredients' => "Lenticchie secche, sale fino, paprika dolce, uova, erba cipollina, pepe nero",
                'visible' => true,
                'preview' => '/images/restaurant/veggie-burger.jpg',
            ],
            [
                'tag_id' => 7,
                'name' => 'Hamburger di ceci',
                'description' => "Pane al Sesamo, Hamburger di Ceci, Formaggio, Bacon, *salse",
                'price' => '8',
                'ingredients' =>"Pane al Sesamo, Hamburger di Ceci, Formaggio, Bacon, *salse",
                'visible' => true,
                'preview' => '/images/restaurant/hamburger-di-ceci.jpg',
            ],
            [
                'tag_id' => 7,
                'name' => 'Verdure Grigliate',
                'description' => "Zucchine, Melanzane, Zucca, Peperoni, Olio, Sale, Prezzemolo",
                'price' => '5',
                'ingredients' =>"Zucchine, Melanzane, Zucca, Peperoni, Olio, Sale, Prezzemolo",
                'visible' => true,
                'preview' => '/images/restaurant/verdure-grigliate.jpg',
            ],
            [
                'tag_id' => 7,
                'name' => 'Patate al Forno',
                'description' => "Patate, Rosmarino, Olio, Sale",
                'price' => '5',
                'ingredients' =>"Patate, Rosmarino, Olio, Sale",
                'visible' => true,
                'preview' => '/images/restaurant/patate-al-forno.webp',
            ],
            [
                'tag_id' => 7,
                'name' => 'Samosa',
                'description' => "Triangolo fritto, ripieno di verdure ",
                'price' => '6',
                'ingredients' =>"Triangolo fritto, ripieno di verdure ",
                'visible' => true,
                'preview' => '/images/restaurant/samosa.jpg',
            ],
            [
                'tag_id' => 7,
                'name' => 'Involtini di Melanzane al forno',
                'description' => "Involtini di Melanzane con Pomodoro e Zucca",
                'price' => '8',
                'ingredients' =>"Involtini di Melanzane con Pomodoro e Zucca",
                'visible' => true,
                'preview' => '/images/restaurant/involtini-di-melanzane-al-forno.jpg',
            ],

            // sezione sushi

            [
                'tag_id' => 6,
               'name' => 'Temaki Roll',
               'description' => "Salmone, Riso, Avocado, Philadelphia, Alga Nori, Maionese",
               'price' => '5',
               'ingredients' =>"Salmone, Riso, Avocado, Philadelphia, Alga Nori, Maionese",
               'visible' => true,
               'preview' => '/images/restaurant/temaki-roll.jpg',
           ],
           [
                'tag_id' => 6,
               'name' => 'Sashimi di salmone',
               'description' => "Salmone o Tonno fresco abbattuto con Salsa di Soia agli Agrumi",
               'price' => '12',
               'ingredients' =>"Salmone o Tonno fresco abbattuto con Salsa di Soia agli Agrumi",
               'visible' => true,
               'preview' => '/images/restaurant/sashimi-salmone.jpg',
           ],
           [
                'tag_id' => 6,
               'name' => 'Sashimi di tonno',
               'description' => "Salmone o Tonno fresco abbattuto con Salsa di Soia agli Agrumi",
               'price' => '12',
               'ingredients' =>"Salmone o Tonno fresco abbattuto con Salsa di Soia agli Agrumi",
               'visible' => true,
               'preview' => '/images/restaurant/sashimi-tonno.jpg',
           ],
           [
                'tag_id' => 6,
               'name' => 'Sashimi di Anguilla',
               'description' => "Salmone o Tonno fresco abbattuto con Salsa di Soia agli Agrumi",
               'price' => '12',
               'ingredients' =>"Salmone o Tonno fresco abbattuto con Salsa di Soia agli Agrumi",
               'visible' => true,
               'preview' => '/images/restaurant/sashimi-anguilla.jpg',
           ],
           [
                'tag_id' => 6,
               'name' => 'Uramaki Roll',
               'description' => "Roll di Riso con Salmone, Tonno o Gamberi, Avocado",
               'price' => '8',
               'ingredients' =>"Roll di Riso con Salmone, Tonno o Gamberi, Avocado",
               'visible' => true,
               'preview' => '/images/restaurant/uramaki-roll.jpg',
           ],
           [
                'tag_id' => 6,
               'name' => 'Nigiri',
               'description' => "Roll di Riso con Salmone, Tonno o Gamberi, Avocado",
               'price' => '8',
               'ingredients' =>"Roll di Riso con Salmone, Tonno o Gamberi, Avocado",
               'visible' => true,
               'preview' => '/images/restaurant/nigiri.jpg',
           ],
           [
                'tag_id' => 6,
               'name' => 'Hosomaki',
               'description' => "Roll di Riso con Salmone, Tonno o Gamberi, Avocado",
               'price' => '8',
               'ingredients' =>"Roll di Riso con Salmone, Tonno o Gamberi, Avocado",
               'visible' => true,
               'preview' => '/images/restaurant/hosomaki.jpg',
           ],
           [
                'tag_id' => 6,
                'name' => 'Futumaki',
                'description' => "Roll di Riso con Salmone, Tonno o Gamberi, Avocado",
                'price' => '8',
                'ingredients' =>"Roll di Riso con Salmone, Tonno o Gamberi, Avocado",
                'visible' => true,
                'preview' => '/images/restaurant/futumaki.jpg',
           ],


            //   sezione bevande
            [
                'tag_id' => 9,
                'name' => 'Acqua Gasata',
                'description' => " acqua potabile nella quale è stata immessa anidride carbonica",
                'price' => '3',
                'ingredients' =>"acqua minerale, gasata",
                'visible' => true,
                'preview' => '/images/bevande/acqua-gasata.jpg',
            ],
            [
                'tag_id' => 9,
                'name' => 'Acqua Minerale',
                'description' => " acqua potabile naturale",
                'price' => '3',
                'ingredients' =>"acqua minerale",
                'visible' => true,
                'preview' => '/images/bevande/acqua-naturale.jpg',
            ],
            [
                'tag_id' => 9,
                'name' => 'Coca-cola',
                'description' => "una bevanda industriale analcolica di tipo bibita",
                'price' => '4',
                'ingredients' =>"Acqua, zucchero, anidride carbonica, caffeina, vaniglia",
                'visible' => true,
                'preview' => '/images/bevande/coca-cola.jpg',
            ],
            [
                'tag_id' => 9,
                'name' => 'Fanta',
                'description' => "Fanta è una bibita di aranciata prodotta dalla The Coca-Cola Company.",
                'price' => '4',
                'ingredients' =>"Fanta Aranciata è tra le bevande gassate al gusto arancia più diffuse nel mondo.
                Prodotta per la prima volta proprio in Italia",
                'visible' => true,
                'preview' => '/images/bevande/fanta.jpg',
            ],
            [
                'tag_id' => 9,
                'name' => 'Pepsi',
                'description' => "La Pepsi-Cola, più comunemente conosciuta come Pepsi, è una bevanda analcolica di tipo soft drink prodotta dalla PepsiCo",
                'price' => '4',
                'ingredients' =>"Acqua, Zucchero, Anidride carbonica, Acidificante: acido ortofosforico, Aromi (contiene caffeina), Edulcoranti: acesulfame K, sucralosio",
                'visible' => true,
                'preview' => '/images/bevande/pepsi.jpg',
            ],
            
            

            // sezione vini
            [
                'tag_id' => 10,
                'name' => 'Chardonnay',
                'description' => " Lo Chardonnay è il vitigno a bacca bianca più famoso al mondo. Le sue caratteristiche enologiche fanno si che con lo Chardonnay si possano tipologie di vini bianchi, anche molto diverse tra loro",
                'price' => '55',
                'ingredients' =>"Ha foglia media, rotonda; il grappolo è di medie dimensioni, piramidale, serrato, scarsamente alato; l'acino è di media grandezza, con buccia mediamente consistente, tenera e di colore giallo dorato",
                'visible' => true,
                'preview' => '/images/bevande/vino-chardonnay.jpg',
            ],
            [
                'tag_id' => 10,
                'name' => 'Due Palme',
                'description' => "Colore rosso rubino cupo con intensi riflessi violacei, note fruttate con sentori speziati ed eterei. al palato è morbido, giustamente tannico, di buona struttura e decisa persistenza gusto-olfattiva",
                'price' => '22',
                'ingredients' =>" Primitivo 50%, Aglianico 50%, ciliegie, more e lamponi",
                'visible' => true,
                'preview' => '/images/bevande/vino-due-palme.jpg',
            ],
            [
                'tag_id' => 10,
                'name' => 'Grange',
                'description' => "Nato in via sperimentale nel 1951 e inizialmente prodotto quasi di nascosto, è diventato in breve tempo il più celebre e desiderato vino di tutta l'Australia",
                'price' => '30',
                'ingredients' =>"Uva, contiene solfiti e anidride solforosa",
                'visible' => true,
                'preview' => '/images/bevande/vino-grange.jpg',
            ],
            [
                'tag_id' => 10,
                'name' => 'Marchesi',
                'description' => "Nel cuore delle Langhe, protette da dolci colline, si trovano le Cantine dei Marchesi di Barolo, la cui storia ha inizio più di due secoli fa, più precisamente nel 1807",
                'price' => '15',
                'ingredients' =>"Il colore è rosso granato intenso, con sfumature rubino. Il profumo è intenso e persistente con netto sentore di spezie, cannella, assenzio, tabacco e rosa di macchia",
                'visible' => true,
                'preview' => '/images/bevande/vino-marchesi.jpg',
            ],
            [
                'tag_id' => 10,
                'name' => 'Sassicaia',
                'description' => "Il Bolgheri Sassicaia, comunemente noto come Sassicaia, è un vino DOC la cui produzione è consentita in una specifica zona del comune di Castagneto Carducci nella provincia di Livorno",
                'price' => '8',
                'ingredients' =>" asciutto, pieno, robusto e armonico, con buona elegante struttura, rosso rubino intenso, tendente al granato con l'affinamento",
                'visible' => true,
                'preview' => '/images/bevande/vino-sassicaia.jpg',
            ],

            


        ];

        
        $users = User::all();
        foreach ($users as $key => $user) {
            $index = $user->id;
            $completePlate = $plates;
            switch (true) {
                case $index == 1 || $index == 3 || $index == 4:
                    // italiano, pizzeria, dolci
                    $filtredPlates = array_filter($completePlate, function($v, $k) {
                        return $v['tag_id'] == 1 || $v['tag_id'] == 2 || $v['tag_id'] == 3 || $v['tag_id'] == 4 || $v['tag_id'] == 8 || $v['tag_id'] == 9 || $v['tag_id'] == 10;
                    }, ARRAY_FILTER_USE_BOTH);
                    break;
                case $index == 2 || $index == 8:
                    // pizzeria
                    $filtredPlates = array_filter($completePlate, function($v, $k) {
                        return $v['tag_id'] == 1 || $v['tag_id'] == 4 || $v['tag_id'] == 9;
                    }, ARRAY_FILTER_USE_BOTH);
                    break;
                case $index == 6 || $index == 7:
                    // burger, dolci
                    $filtredPlates = array_filter($completePlate, function($v, $k) {
                        return $v['tag_id'] == 1 || $v['tag_id'] == 5 || $v['tag_id'] == 8 || $v['tag_id'] == 10;
                    }, ARRAY_FILTER_USE_BOTH);
                    break;
                case $index == 9:
                    // vegetariano, dolci
                    $filtredPlates = array_filter($completePlate, function($v, $k) {
                        return $v['tag_id'] == 7 || $v['tag_id'] == 8 || $v['tag_id'] == 9 || $v['tag_id'] == 10;
                    }, ARRAY_FILTER_USE_BOTH);
                    break;
                case $index == 5 || $index == 10:
                    // giapponese, dolci
                    $filtredPlates = array_filter($completePlate, function($v, $k) {
                        return $v['tag_id'] == 6 || $v['tag_id'] == 8 || $v['tag_id'] == 9 || $v['tag_id'] == 10;
                    }, ARRAY_FILTER_USE_BOTH);
                    break;

                
            }
            $rand_int = random_int(1,100) * random_int(1,100);
            foreach ($filtredPlates as $key => $plate) {
                $rand = $index * $rand_int / random_int(1,10);
                $newPlate = new Plate();
                $newPlate->name = $plate['name'];
                $newPlate->slug = Str::slug($newPlate->name . '-' . $key . '-' . $rand);
                $newPlate->user_id = $index;
                $newPlate->tag_id = $plate['tag_id'];
                $newPlate->description = $plate['description'];
                $newPlate->price = $plate['price'];
                $newPlate->ingredients = $plate['ingredients'];
                $newPlate->visible = 1;
                $newPlate->preview = $plate['preview'];
                $newPlate->save();
            }
        }

    }
}
