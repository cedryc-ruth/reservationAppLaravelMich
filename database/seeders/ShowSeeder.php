<?php

namespace Database\Seeders;

use App\Models\Show;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Show::factory(10)->create();

        $courtisane = "Avec Splendeurs et misères des courtisanes, la suite directe des Illusions perdues, 
        Balzac nous entraîne dans un roman d’aventures haletant et féroce. Lucien a été sauvé par Carlos Herrera, 
        ancien forçat déguisé en prêtre espagnol. Notre poète est amoureux d’Esther, 
        sublime courtisane assoiffée de pardon et d’amour. Mais Nucingen, richissime banquier d’affaires, 
        rencontre Esther à son tour, et cherche à la conquérir par tous les moyens…
        Le Paris d’avant la révolution de 1830 devient une jungle où les personnages 
        de La Comédie humaine se livrent une lutte sans merci. Mais regardons d’un peu plus près : 
        ce monde traversé de forces contraires, ce monde de splendeurs et de misères, n’est-ce pas aussi le nôtre ?";

        $doublure = "La maison de retraite 'Les beaux chênes' 
        étant en passe de faire faillite, un quatuor de pensionnaires se mobilise pour sauver 
        l'institution en participant au célèbre jeu de connaissance 'Questions pour un senior'. 
        Malheureusement, nos valeureux pensionnaires qui ambitionnent la victoire ne sont pas à  la hauteur de leur défi. 
        L'âge est là  et, comme dit l'un d'eux, avec lui les neurones fatiguent !
        Fort heureusement, les dieux du jeu sont avec eux. Une arrivée providentielle finira par soulever un grand vent d'optimisme.";


        $malade =  "Le poumon ! Pas de doute, c’est le poumon ! Si on ose lui prétendre qu’il n’est pas malade, 
        Argan se rebiffe et n’en démord pas : il veut être malade ! Il faudra tout le bon sens et l’humour de la servante Toinette 
        pour calmer la folie qui semble s’être emparée du maître ; comme si les nombreux lavements que ses médecins 
        lui infligent lui avaient siphonné le cerveau. Mais il s’agit d’en finir avec les charlatans, 
        prescripteurs de potions magiques et autres clystères subtils qui aveuglent Argan, et de ramener ce grand malade à la raison.";


        $hamlet = "Le roi du Danemark, père d'Hamlet, est mort récemment. 
        L'oncle d'Hamlet Claudius a remplacé le roi défunt, et, moins de deux mois après,
        a épousé Gertrude, sa veuve. Le spectre du roi apparaît alors et révèle à son fils Hamlet
        qu'il a été assassiné par Claudius. Hamlet doit venger son père. 
        Pour mener son projet à bien, il simule la folie. Mais il semble incapable d'agir, 
        et, devant l'étrangeté de son comportement, l'on en vient à se demander dans quelle mesure il a conservé la raison. 
        On met cette folie passagère sur le compte de l'amour qu'il porterait à Ophélie, 
        fille de Polonius, chambellan et conseiller du roi. 
        L'étrangeté de son comportement plonge la cour dans la perplexité. Mis en cause à mots couverts par Hamlet, 
        Claudius perçoit le danger et décide de se débarrasser de son fantasque neveu.";

        $cercle = "En 1984, alors que se déroule le championnat d’Europe des Nations, 
        Décembre vole un sac dans le métro. Dans le sac, il trouve la photo d’Avril jolie. 
        Il la rappelle, ils se rencontrent dans un café. Il va lui raconter l’histoire de Jean-Eugène Robert-Houdin, 
        horloger, inventeur, magicien du XIXe siècle. 
        Cette histoire les mènera tous deux sous le coffre de la BNP du boulevard des italiens, 
        dans le théâtre disparu de Robert-Houdin, devant la roulotte d’un escamoteur, 
        derrière les circuits du Turc mécanique, aux prémices du kinétographe, et à travers le cercle des illusionnistes.";

        $karamazov = "Qui a tué le père? Le vieux Karamazov avait quatre fils, 
        dont un bâtard. Un seul a donné le coup, le pilon de cuivre est dans le jardin, 
        couvert de sang. Une chose est sûre : personne n’est innocent, et tous les motifs, 
        à force de contradiction, exploseront en vol. Puis passera la justice des hommes. 
        ean Genet : « Ai-je mal lu Les Frères Karamazov? 
        Je l’ai lu comme une blague. Une farce, une bouffonnerie à la fois énorme et mesquine,
        puisqu’elle s’exerce sur tout ce qui faisait de Dostoïevski un romancier possédé, 
        elle s’exerce contre lui-même, et avec des moyens astucieux et enfantins, 
        dont il use avec la mauvaise foi têtue de Saint-Paul.»";


        $geisha = "Une geisha avait très peur de mourir. Elle faisait toujours le même rêve : 
        dans une forêt dense, fuyant la tombée de la nuit, elle glissait dans un gouffre et se réveillait en sursaut pendant la chute. 
        Mais un soir, le rêve avait changé. Au matin, elle était devenue toute blanche, « comme dans le rêve. » 
        Et elle ne vieillissait plus. Libérée de sa peur de mourir, elle est prisonnière de l’éternité. 
        Pour conjurer le sort, elle joue Hiki-Iwai – la dernière d’une geisha – abandonne tous ses kimonos, 
        tous ses accessoires, tout ce qui fait d’elle une geisha, et 
        raconte une dernière fois les histoires qu’elle a raconté toute sa vie, des contes zen.";


        $voices = "Cela devait arriver. Dès les battles, les coaches de The Voice ont une habitude qui peut surprendre, 
        à savoir de se faire affronter les candidats les plus prometteurs entre eux. Les départs déchirants se
        multiplient et se succèdent depuis cinq semaines, et certains des talents les plus prometteurs et 
        donc dû quitter l'aventure il y a plus d'un mois déjà. Mais cela a pris une toute autre dimension 
        ce samedi 7 mai lors des super cross battles, quand Florent Pagny a choisi Sonia Quesada pour affronter 
        un candidat de Marc Lavoine, alors que ce dernier n'avait plus que deux talents dans son équipe, dont Caroline Costa, 
        une autre favorite. Marc Lavoine, à la stupeur de ses camarades, a alors choisi Caroline Costa pour ce duel, 
        condamnant l'aventure de perdre assurément l'une de ses plus grandes voix avant même la demi-finale !";


        $margot = "Intrigues, complots, trahisons entre catholiques et protestants. 
        Marguerite de Valois, fille de Catherine de Médicis et soeur du roi Charles IX, 
        est contrainte à un mariage politique avec Henri de Navarre, le chef des protestants, 
        afin de faire renaître la paix dans le royaume de France. 
        La reine Margot sera-t-elle une fidèle alliée politique pour son mari ?";


        $angkor = "Si l'histoire retient le ixe siècle pour la fondation d'Angkor, 
        les ruines de ce site cambodgien ne seraient que la partie monumentale connue d'une présence remontant
         à l'âge du bronze et révélée par la nécropole de Koh Ta Méas, datée d'au moins 1800 avant notre ère.
        Pas moins de vingt-sept sépultures ont été dégagées, avec leurs nombreuses offrandes. 
        Les squelettes humains des cinquante-neuf individus identifiés sont d'une grande valeur 
        pour la connaissance du peuplement préhistorique du Sud-Est asiatique continental. 
        Celle-ci révèle une population peu robuste, qui a cependant développé une résistance immunitaire à la malaria.
        Ces fouilles ont été l'objet d'une exposition au Musée national de Phnom Penh jusqu'en février 20";




        $shows = [
            ['title' => 'Les courtisanes','slug' => 'les-courtisanes',
             'summary' => 'Moeurs et intringues de la bourgeoisie du 19ème siècle', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 21.00, 'description' => $courtisane, 'location_id' => 9,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'La doublure','slug' => 'la-doublure',
             'summary' => 'Plongez dans les moindres recoins de la personnalité', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 18.00, 'description' => $doublure, 'location_id' => 4,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Le malade imaginaire','slug' => 'le-malade-imaginaire',
             'summary' => 'La célèbre pièce de Molière revisitée', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 23.00, 'description' => $malade, 'location_id' =>10,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Hamlet','slug' => 'hamlet',
             'summary' => 'Le drame shakespearien joué par la petite troupe du Midi', 'poster_url' =>null,
             'images' => null, 'bookable' => 0, 'price' => 17.00, 'description' => $hamlet, 'location_id' => 8,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Le Cercle','slug' => 'le-cercle',
             'summary' => 'Le cercle des illusionnistes', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 26.00, 'description' => $cercle, 'location_id' => 7,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Les frères Karamazov','slug' => 'les-freres-karamazov',
             'summary' => 'Drame spirituel et interrogations philosophiques de Fiodor Dostoïevski', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 22.00, 'description' => $karamazov, 'location_id' => 6,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'The voices','slug' => 'the-voices',
             'summary' => 'La comédie musicale à grand succès est de retour!', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 19.00, 'description' => $voices, 'location_id' => 5,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'La geïsha','slug' => 'la-geisha',
             'summary' => 'Souvenirs d\'une geïsha dans l\'ancien Japon féodal.', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 20.00, 'description' => $geisha, 'location_id' => 1,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'La reine Margot','slug' => 'la-reine-margot',
             'summary' => 'L\'adaptation du roman de Balzac au théâtre', 'poster_url' =>null,
             'images' => null, 'bookable' => 0, 'price' => 24.00, 'description' => $margot, 'location_id' => 3,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Angkor','slug' => 'angkor',
             'summary' => 'Le mythe fondateur de l\'empire Khmer', 'poster_url' =>null,
             'images' => null, 'bookable' => 0, 'price' => 30.00, 'description' => $angkor, 'location_id' => 1,
             'created_at' => now(), 'updated_at' => now()],
        ];

        Show::insert($shows);

    }
}
