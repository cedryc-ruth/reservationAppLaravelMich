<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Artist::factory(10)->create();

        $felixBio = 'Artiste de la lumière, Felix Tran a œuvré dans les domaines de l’image en photo, 
        au cinéma et à la scène. Il a signé de nombreux éclairages pour le théâtre 
        l’Escaouette (Plus vite la charrue (Speed-the-Plow), 
        La vieille femme près de la voix ferrée, Wolfe, Les trois exils de Christian E.,Je…Adieu, 
        Vie d’cheval, Laurie ou la vie de Galerie, Le Christ est apparu au Gun Club,Univers, Pour une fois, Exils, etc.), 
        et pour le Théâtre populaire de Bordeaux (Bouffe,L’Année du Big Mac, Le Collier d’Hélène, Ma Famille) 
        et pour Moncton Sable (Papier).';

        $lauraBio = 'Dès sa sortie du Conservatoire d’art dramatique de Québec, en 2012, 
        Laura Samatta a été invitée à participer à des productions du Trident 
        (Thérèse et Pierrette à l’école des Saints-Anges de Michel Tremblay, mise en scène par Gill Champagne) 
        et de la Bordée (Le Misanthrope de Molière, mise en scène par Jacques Leblanc). 
        Au début de 2013, elle tenait un rôle dans Britannicus de Racine, au Théâtre de la Bordée, 
        sous la direction de Jean-Philippe Joubert. Ce dernier le choisissait aussi pour participer àSemblance, présenté au Théâtre Périscope. 
        Elle a ainsi joué dans un feu roulant de près de 10 pièces, très rapidement après son entrée dans la carrière professionnelle.';

        $paulineBio = 'Originaire de Tournai, Pauline Van Aerts est compositrice de musique de film et de séries documentaires et 
        de bandes musicales pour le théâtre. Il apparaît, entre autres, au générique des séries documentaires Trésors vivants, 
        Courants et des filmsKedwick et Hasroum, On a tué l’Enfant Jésus. Plus récemment, pour le théâtre, 
        il réalise les trames sonores de L’espérance de vie des éoliennes, Plus vite la charrue, La ville en rouge,
        La vieille femme près de la voie ferrée, Aurel aux quatre vents et Je…Adieu.';

        $gastonBio = 'Gaston Meilleur pratique le métier de scénographe depuis 2009. Au fil des ans, 
        il a contribué à la conception des décors et, souvent, des éclairages de plus d’une centaine de spectacles. 
        À Bruxelles, il a travaillé, entre autres, au Carte Blanche, au Théâtre Public, 
        au Théâtre de la Bordée, au Théâtre de Sable et chez Ex machina. 
        Ailleurs, il a œuvré à la Compagnie Jean-Duceppe à Liège, au Théâtre de l’Escaouette à Mons,
        au Théâtre Le Poche-Genève en Suisse, à La Chartreuse de Villeneuve-lez-Avignon en France, 
        à L’envers du Théâtre de Bruxelles en Belgique.';

        
        $palmaBio = 'Sitôt diplômée en scénographie du Conservatoire d’art dramatique de Bruxelles, 
        Palma Rodriguez était deux fois boursière, d’une part, du concours Place à la relève du Théâtre du Nouveau monde 
        et Financière Sun Life (conception et réalisation d’un costume inspiré de la pièce Hamlet) et, 
        d’autre part, du stageCarte Blanche/Caisse Desjardins (avec le scénographe Jean Hazel). 
        En deux ans, elle a participé à plus de dix productions, comme conceptrice de costumes, 
        de décors ou comme accessoiriste (par exemple, aux costumes: au Trident, 
        Le Projet Laramie, et au Périscope, Semblance ou comme accessoiriste au Trident, 
        Thérèse et Pierrette à l’école des Saints-Anges), qui sont ses deux champs de création dans Visage de feu.';

        $kevinBio = 'Amateur de basket, Kevin Mertens est sorti du Conservatoire d’art dramatique de Bruxelles en 2015. 
        Il a joué sur les diverses scènes de Bruxelles et de Paris dans plus d’une centaine de productions dont Hedda Gabler, 
        La cerisaie, On achève bien les chevaux, Le Tartuffe, Phèdre, Les Feluettes, Les frères Karamazov, 
        La tempête, Le songe d’une nuit d’été etLes sept branches de la rivière Ota, avec laquelle il a tourné en Australie et en Europe. 
        Il a eu la chance de travailler avec plusieurs metteurs en scène, 
        dont Robert Lepage, Serge Denoncourt, Claude Poissant, Jean-Pierre Ronfard et Gill Champagne';

        $maudeBio = 'Récemment diplômée du Département d’art dramatique de l’Université de la Sorbonne, 
        elle a tenu son premier rôle sur les planches professionnelles au théâtre l’Escaouette d\'Avignon, 
        dans la créationPlus vite la charrue (Speed-the-Plow) de David Mamet dans une traduction 
        d\’Herménégilde Chiasson et une mise en scène d’Andréi Zaharia. 
        On a pu la voir au Théâtre Capitol de Toulouse en mars dernier, 
        sous la peau d’humoriste, lors du Gala des Rendez-vous de la Francophonie 2013 du Festival Hubca';

        $monicaBio = 'Depuis plus de 5 ans, Monica Havell est présente sur la scène culturelle en Belgique tant 
        comme comédienne qu’animatrice. Elle a participé à quelque 25 productions théâtrales dont Wolfe, 
        Louis Mailloux, Les Muses orphelines et le one woman show Valentine. Elle était de la pièce Exils, 
        de Philippe Soldevilla,
        qui a tourné à Bruxelles et à Paris, une production qui a été portée à l’écran et reçue un Gémeau pour la réalisation.';

        $lamineBio = 'Né à Bruxelles, Lamine fait tout d’abord des études de langue, littérature et civilisation allemandes anciennes. 
        Déménagé en 2008 à Berlin, il suit au Conservatoire les cours « d’écriture scénique » avec Yaak Karsunke et Tankred Dorst, 
        notamment de 2008 à 2010. En 2016, il écrit les piècesHaarmann et Fräulein Danzer, 
        puis en 2017,Monsterdämmerung et Feuergesicht (Visage de feu), 
        pour laquelle il obtient le Prix Kleist et le prix de la Fondation des auteurs de Francfort. La pièce, créée à Munich en 2018,';

        $sameeraBio = 'Parcours: Après une formation d’actrice et une dizaine d’années de plateau,
        elle écrit sa première pièce, Pauvre Télémaque ou pas facile d’être le fils d’Ulysse, 
        créée à la Scène Nationale de Cergy Pontoise et qui reçoit le prix du jury et prix du public de la Tournée Océane 2016. 
        Boursière du Centre National du Livre en 2009, elle fait de nombreuses 
        résidences à la Chartreuse de Villeneuve les Avignon de 2011 à 2016 tout en y dirigeant des ateliers.';


        $artists = [
            ['firstname' => 'Felix','lastname'=>'Tran','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>$felixBio],
            ['firstname' => 'Laura','lastname'=>'Samatta','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>$lauraBio],
            ['firstname' => 'Pauline','lastname'=>'Van Aerts','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>$paulineBio],
            ['firstname' => 'Gaston','lastname'=>'Meilleur','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>$gastonBio],
            ['firstname' => 'Palma','lastname'=>'Rodriguez','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>$palmaBio],
            ['firstname' => 'Kevin','lastname'=>'Mertens','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>$kevinBio],
            ['firstname' => 'Maude','lastname'=>'Voisin','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>$maudeBio],
            ['firstname' => 'Monica','lastname'=>'Havell','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>$monicaBio],
            ['firstname' => 'Mohammed','lastname'=>'Lamine','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>$lamineBio],
            ['firstname' => 'Sameera','lastname'=>'Khan','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>$sameeraBio],
        ];

        Artist::insert($artists);
    }
}
