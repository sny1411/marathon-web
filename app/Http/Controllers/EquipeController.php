<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index(){
        $equipe= [
            'nomEquipe'=>"Les gardiens de la galaxie",
            'logo'=>"resources/images/logo.jpg",
            'slogan'=>"Avengers rassemblement",
            'localisation'=>"13E",
            'membres'=> [
                [ 'nom'=>"Jacquemin",'prenom'=>"Roméo", 'image'=>"resources/images/romeo.jpg", 'fonctions'=>["validateur","développeur", "concepteur", "Intégrateur"] ],
                [ 'nom'=>"Despeghel",'prenom'=>"Clémence", 'image'=>"resources/images/clemence.jpg", 'fonctions'=>["validateur","développeur", "concepteur"] ],
                [ 'nom'=>"Humez",'prenom'=>"Mattéo", 'image'=>"resources/images/matteo.jpg", 'fonctions'=>["validateur","développeur", "concepteur"] ],
                [ 'nom'=>"Mercier",'prenom'=>"Lily", 'image'=>"resources/images/lily.jpg", 'fonctions'=>["validateur","développer", "concepteur"] ],
                [ 'nom'=>"Verhas",'prenom'=>"Lola", 'image'=>"resources/images/lola.jpg", 'fonctions'=>["validateur","développer", "concepteur"] ],
                [ 'nom'=>"Hornoy",'prenom'=>"Théo", 'image'=>"resources/images/theo.jpg", 'fonctions'=>["validateur","développer", "concepteur", "auteur"] ],
                [ 'nom'=>"Blumzak",'prenom'=>"Noé", 'image'=>"resources/images/noe.jpg", 'fonctions'=>["validateur","développer", "concepteur"] ],
                [ 'nom'=>"Gatti",'prenom'=>"Marion", 'image'=>"resources/images/marion.jpg", 'fonctions'=>["validateur","développer", "concepteur", "autrice"] ],
                [ 'nom'=>"Silvert",'prenom'=>"Félix", 'image'=>"resources/images/felix.jpg", 'fonctions'=>["validateur","développeur", "concepteur"] ],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipe' => $equipe]);

    }
}
