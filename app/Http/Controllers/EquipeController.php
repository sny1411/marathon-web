<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index(){
        $equipe= [
            'nomEquipe'=>"Nom d'équipe: Les gardiens de la galaxie",
            'logo'=>"resources/images/logo.jpg",
            'slogan'=>"Slogan: Avengers rassemblement",
            'localisation'=>"Localisation: 13E",
            'membres'=> [
                [ 'nom'=>"Jacquemin",'prenom'=>"Roméo", 'image'=>"resources/images/romeo.jpg", 'fonctions'=>["Validateur","Développeur", "Concepteur", "Intégrateur"] ],
                [ 'nom'=>"Despeghel",'prenom'=>"Clémence", 'image'=>"resources/images/clemence.jpg", 'fonctions'=>["Validatrice","Développeuse", "Conceptrice", "Intégratrice"] ],
                [ 'nom'=>"Humez",'prenom'=>"Mattéo", 'image'=>"resources/images/matteo.jpg", 'fonctions'=>["Validateur","Développeur", "Concepteur", "Intégrateur"] ],
                [ 'nom'=>"Mercier",'prenom'=>"Lily", 'image'=>"resources/images/lily.jpg", 'fonctions'=>["UX/UI", "Graphiste"] ],
                [ 'nom'=>"Verhas",'prenom'=>"Lola", 'image'=>"resources/images/lola.jpg", 'fonctions'=>["UX/UI", "Graphiste"] ],
                [ 'nom'=>"Hornoy",'prenom'=>"Théo", 'image'=>"resources/images/theo.jpg", 'fonctions'=>["Validateur","Développer", "Concepteur", "Auteur", "UX/UI"] ],
                [ 'nom'=>"Blumzak",'prenom'=>"Noé", 'image'=>"resources/images/noe.jpg", 'fonctions'=>["Validateur","Développeur", "Concepteur","UX/UI"] ],
                [ 'nom'=>"Gatti",'prenom'=>"Marion", 'image'=>"resources/images/marion.jpg", 'fonctions'=>["UX/UI","Graphiste", "Autrice"] ],
                [ 'nom'=>"Silvert",'prenom'=>"Félix", 'image'=>"resources/images/felix.jpg", 'fonctions'=>["Validateur","Développeur", "Concepteur", "Intégrateur"] ],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipe' => $equipe]);

    }
}
