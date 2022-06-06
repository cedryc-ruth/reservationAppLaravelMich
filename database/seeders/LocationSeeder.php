<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marniStory = "Ouvert comme cinéma en 1948 sur la place Eugène Flagey sous la direction de Joseph Weckx 
        qui possédait plusieurs salles dans les quartiers d’Etterbeek et Saint-Gilles, 
        cette grande salle de 1 700 places avait une programmation populaire : 
        Les Dix Commandements, Le Troisième Homme, Le Jour le plus long, La Grande Vadrouille, etc. 
        il pouvait déjà être considéré comme un cinéma de deuxième vision. À la fin des années 1960 
        plusieurs grands films sont même sortis en première vision.
        Lors du déclin des salles de quartier au début des années 1970, on tenta d’en faire une salle de spectacle : 
        plusieurs concerts importants de Johnny Hallyday, Joe Dassin, Duke Ellington, peu de temps avant son décès, y prirent place.
        Après sa fermeture en 1974, le lieu a servi de salle de répétition pour l’Orchestre symphonique 
        et les chœurs de la RTBF jusqu’en 19821, de studios pour Living Films, de salle de bowling et de snooker. 
        Il est ensuite transformé en théâtre par 
        l’Ensemble Théâtral Mobile qui l’inaugure le 2 octobre 1997 avec Une paix royale de Pierre Mertens
        dans une adaptation de Michèle Fabien. 
        Dès l’année suivante, l’Ensemble théâtral Mobile en est expulsé et le lieu est repris en location 
        par la Communauté française de Belgique qui en fait un lieu culturel polyvalent.";

        $variaStory = "Doté de deux salles de représentation dites le Grand et le Petit Varia, 
        sa programmation est composée principalement de spectacles de théâtre et reste ouverte à la danse, 
        au cirque, au théâtre pour les jeunes publics et à la musique. Cette programmation s'accompagne 
        d’un vaste programme de Médiation culturelle composé de rencontres avec les artistes, d'ateliers, 
        de conférences et de visites du théâtre.
        Le bâtiment, construit en 1900 a connu plusieurs vies (opéra, salle de quartier, garage automobile). 
        Jusqu'en 1982, où il fut loué par les metteurs en scène Marcel Delval, Michel Dezoteux et Philippe Sireuil, 
        et racheté par la Communauté française de Belgique qui l'affecta au théâtre et confia son réaménagement 
        à l'architecte Alberto Zaccai.";

        $improvisteStory = "Le Théâtre l'Improviste, ouvert à Forest (Bruxelles) le 20 octobre 2018, 
        est le premier théâtre de Belgique entièrement destiné à l'improvisation1. Son but est de mettre 
        en avant l’improvisation dans sa diversité. Ainsi, il propose des spectacles pour adultes et pour enfants, 
        joués par des improvisateurs professionnels ou amateurs, aussi bien belges qu'étrangers. Depuis sa deuxième saison, 
        l'Improviste programme également des spectacles en anglais joués par la compagnie ImproBubble2,3. 
        De plus, il ne se cantonne pas au théâtre improvisé, s’ouvrant également à la danse et à la musique improvisées.
        Ce lieu est également destiné à la formation à l'improvisation (initiations d'un jour, 
        cours hebdomadaires, formations pour débutants et comédiens expérimentés) 
        et propose des prestations aux entreprises, associations, écoles... 
        Celles-ci peuvent prendre diverses formes : f
        ormations, animations d'événements et spectacles afin de promouvoir des produits et services, 
        d'améliorer la cohésion de groupe et les compétences des employés ou simplement de leur faire passer un agréable moment.";


        $publicStory = "Le Public est inauguré le 9 novembre 1994, établi dans les bâtiments de l'ancienne brasserie Aerts, 
        et codirigé depuis lors par Michel Kacenelenbogen et Patricia Ide1. 
        Les modifications faites au bâtiment lors de sa restauration sont l'œuvre de Luc D'Haenens2.
        Au fil des ans, le théâtre s’agrandit, pour offrir actuellement
        des spectacles dans ses trois salles, et certaines saisons, 
        également des représentations dans d’autres salles3. 
        Outre les spectacles de saison, des « esquisses » sont organisés dans l'espace appelé « les Planches ». 
        Le théâtre abrite également 3 salles de restauration.";

        $franckStory = "Le Centre culturel Jacques Franck est le centre culturel de la commune de Saint-Gilles (Bruxelles) 
        et fait partie des centres culturels reconnus par la Communauté française de Belgique.
        Sa création remonte à l’année 1973 où il prend la relève du Théâtre du Parvis né trois ans plus tôt, 
        sous la codirection de Marc Liebens, Jean Lefébure et Janine Patrick, dans les locaux d’un ancien cinéma de quartier. 
        Le nouveau centre prend le nom du bourgmestre de l’époque, à l’initiative de sa conception.
        Installé dans une commune qui réunit plus de cent nationalités différentes, 
        le centre se veut dès l’origine pluraliste, lieu de rencontre et de débat culturel en contact avec 
        la variété des populations et des cultures de la commune et de la région bruxelloise.
        Le Jacques Franck propose un programme privilégiant la création contemporaine en théâtre, 
        danse, cinéma, arts plastiques, musiques, ou autres manifestations pour adultes et jeunes publics, 
        réalisés par des artistes professionnels.";

        $osStory =  "Ouvert au printemps 1960 par une poignée d’illuminés (parmi lesquels Jo Dekmine, futur directeur du théâtre 140), 
        l’Os à Moelle est le plus ancien cabaret bruxellois.
        Cette cave au charme indéfinissable, nichée sous la maison natale de Jacques Brel, 
        a toujours eu à cœur d’ouvrir ses portes à des artistes de tous horizons. Chanteurs, comédiens,
        humoristes, ils sont nombreux à avoir foulé les planches de notre cabaret ! 
        Jacques Brel, Barbara, Toots Thielemans, Arno, Philippe Lafontaine, Pierre Richard, 
        François Pirette, Maurane, Marc Herman, Jacques Higelin, Machiavel (pour n’en citer que quelques-uns !) 
        y ont côtoyé les jeunes talents de la scène belge et internationale.Son look des cabarets rive gauche du début du 20ème siècle 
        lui laisse toute son authenticité et surtout son originalité. Une récente mise en chantier 
        améliore aujourd’hui ses différents espaces sans avoir perdu l’âme qui y règne et qui continue 
        de s’imprégner dans les murs depuis sa création.
        L'équipe a su garder le cap et l’esprit du plus ancien cabaret de Bruxelles.
        Plus d’un demi-siècle après son ouverture, l’Os à Moelle propose chaque année une programmation 
        dont il n’a pas à rougir : concerts, pièces de théâtre, spectacles d’improvisation, humoristes, 
        cabaret, jeune public et loisirs en tout genre ! Une grande diversité d’activités qui, toutes, 
        tendent vers le même objectif : offrir à un public toujours renouvelé des spectacles de qualité, 
        empreints de poésie, d’audace, de révolte et de convivialité.";


        $volterStory = "Dès 1963, la spécificité du talentueux comédien et metteur-en-scène Claude Volter, 
        fut d'abord de faire découvrir ou redécouvrir à son public les « Grands Classiques » 
        du répertoire dans le plus grand respect de l'auteur et de l'époque à laquelle ils ont été écrits.
        Accueilli en 1971 par la Commune de Woluwe-Saint-Pierre, La Comédie Claude Volter fut créée en a.s.b.l. 
        par Claude Volter et Michel de Warzée. Deux salles (165 places et 90 places) voient vivre un répertoire divers.
        C’est en janvier 2003 que Michel de Warzée prend officiellement la tête de la Comédie Claude Volter. 
        Il est vrai qu’il avait déjà pris le relais de la gestion du théâtre depuis 1997, lorsque que Claude Volter 
        avait subi les premières atteintes de la maladie 
        qui devait l’emporter. En septembre 2021, la Comédie Claude Volter devient « Comédie Royale Claude Volter » 
        et fête ses 50 années d’existence.
        La modernité des œuvres classiques est soigneusement recherchée par 
        les plus grands metteurs en scène belges ou étrangers ainsi que les pièces à connotation historique telles que, entre autres,
        « Le Souper » et « La Dernière Salve » de Jean-Claude Brisville, 
        « La Colère du Tigre » de Philippe Madral, « Meilleurs Alliés »
        de Hervé Bentegeat, ... Cette philosophie permet donc de s'ouvrir à un public toujours plus large.";

        $cafeStory =  "Café des années 30, qui a gardé toute son authenticité, situé dans le bas Molenbeek, près du canal, 
        dans un quartier hautement défavorisé, on y organise depuis 1981 des “dîners spectacles” de qualité : 
        Claude Semal, Bruno Coppens, Jacques-Ivan Duchesne, Pierrette Laffineuse, Jean-François Maljean, Véronique Castanyer, 
        Allain Leprest, Gilles Servat, Goun, Marc Lelangue, …
        Le lieu est adorable, avec son vieux poêle et le tableau de bois où l’on affichait les résultats du Daring et 
        de l’Union Saint-Gilloise.
        Jusque fin 2008, le “Café de La Rue” a été une des activités de l’association “La Rue”, 
        mouvement d’éducation permanent et de développement de quartiers qui travaille à redynamiser ces quartiers 
        en difficulté en impliquant habitants et entreprises, en aménageant des espaces publics, en organisant des fêtes de quartier, 
        des animations pour les enfants, des formations et alphabétisations etc…
        Depuis janvier 2009 le “Café de La Rue” s’est constitué en ASBL autonome, 
        afin de développer plus amplement l’aspect culturel de ses activités.";

        $botaniqueStory = "Le Centre culturel de la Fédération Wallonie-Bruxelles « Le Botanique », 
        ou plus simplement Botanique, ou Le Bota est un complexe culturel bruxellois ouvert le 23 janvier 1984 
        dans le site classé de l'ancien jardin botanique de Bruxelles qui avait été inauguré le 1er septembre 1829.
        Il est situé rue Royale, sur la commune de Saint-Josse-ten-Noode.
        Il a longtemps proposé une programmation variée (danse, musique, théâtre, arts plastiques, cinéma).
        Il est aujourd'hui spécialisé dans les concerts, dont le festival Les Nuits Botanique au printemps,
        ainsi que dans les expositions d'arts plastiques et de photographie.
        En plus de ses trois salles de spectacle (L'Orangerie, La Rotonde et le Witloof Bar) et 
        de ses salles d'expositions (Le Museum et La Galerie), Le Botanique a également 
        la possibilité d'organiser certains concerts dans un chapiteau lors des Nuits Botanique 
        ainsi que dans des lieux extérieurs tel que Bozar ou l'Église Royale Notre-Dame de Laeken.";

        $cuuStory =  "La première pierre du Centre culturel et artistique d'Uccle est posée le 30 novembre 1957 
        et le Centre est inauguré le 4 octobre 19581. Le centre se situe 47 rue Rouge à proximité de l'avenue de Fré, 
        de l'avenue Brugmann et de l'avenue de Wolvendael, face au Parc de Wolvendael.
        L'architecte du CCU est Léon Stynen1.Le bâtiment abrite un hall d’entrée donnant accès 
        à une grande salle de spectacle de 801 fauteuils, 
        un grand foyer pouvant accueillir jusqu'à 400 personnes, ainsi qu'un petit foyer pouvant contenir 120 personnes.";






        $locations = [
            ['designation' => 'Théâtre Marni', 'slug' => 'theatre-marni',
            'address' => '25 Rue de Vergnies','website' => 'https://www.theatremarni.com',
            'phone' =>'02 639 09 82', 'story' => $marniStory,'image' => 'https://picsum.photos/500/350','locality_id' => 3],

            ['designation' => 'Théâtre Varia', 'slug' => 'theatre-varia',
            'address' => '78 rue du Sceptre','website' => 'https://www.varia.be',
            'phone' =>'02 640 82 58','story' => $variaStory,'image' => 'https://picsum.photos/500/350','locality_id' => 3],

            ['designation' => 'Théâtre l\'Improviste', 'slug' => 'theatre-l-improviste',
            'address' => '120 rue de Fierlant','website' => 'https://www.improviste.be',
            'phone' =>'02 681 09 01','story' => $improvisteStory,'image' => 'https://picsum.photos/500/350','locality_id' => 2],

            ['designation' => 'Théâtre Le Public', 'slug' => 'theatre-le-public',
            'address' => '64-70 rue Braemt','website' => 'http://www.theatrelepublic.be',
            'phone' =>'0800 944 44', 'story' => $publicStory ,'image' => 'https://picsum.photos/500/350','locality_id' => 5],

            ['designation' => 'Centre Culturel Jacques Franck', 'slug' => 'centre-culturel-jacques-franck',
            'address' => '94 Chaussée de Waterloo','website' => 'https://lejacquesfranck.be',
            'phone' =>'02 538 90 20','story' => $franckStory,'image' => 'https://picsum.photos/500/350','locality_id' => 4],

            ['designation' => 'L\'Os à Moelle', 'slug' => 'l-os-a-moelle',
            'address' => '153 Avenue Emile Max','website' => 'https://www.osamoelle.be',
            'phone' =>'0475 71 55 97','story' => $osStory, 'image' => 'https://picsum.photos/500/350','locality_id' => 6],

            ['designation' => 'Comédie Royale Claude Volter', 'slug' => 'comedie-royale-claude-volter',
            'address' => '98 Avenue des Frères Legrain','website' => 'https://www.comedievolter.be',
            'phone' =>'02 762 09 63','story' => $volterStory, 'image' => 'https://picsum.photos/500/350','locality_id' => 7],

            ['designation' => 'Le Café de la Rue', 'slug' => 'le-cafe-de-la-rue',
            'address' => '30 Rue de la Colonne','website' => 'https://lecafedelarue.be',
            'phone' =>'0473.50.58.75', 'story' => $cafeStory, 'image' => 'https://picsum.photos/500/350','locality_id' => 10],

            ['designation' => 'Le Botanique', 'slug' => 'le-botanique',
            'address' => '236 Rue Royale','website' => 'https://www.botanique.be',
            'phone' =>'02 218 37 32','story' => $botaniqueStory,'image' => 'https://picsum.photos/500/350','locality_id' => 5],

            ['designation' => 'CCU – Centre culturel d’Uccle', 'slug' => 'centre-culturel-uccle',
            'address' => '47 Rue Rouge','website' => 'https://www.ccu.be/',
            'phone' =>'02.374.04.95', 'story' => $cuuStory, 'image' => 'https://picsum.photos/500/350','locality_id' => 9],
        ];

        Location::insert($locations);
    }
}
