<?php

namespace Tropi\CampsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RefugieType extends AbstractType
{
    private $cheveux = array('brun' => 'Brun/noir',
                             'blond' => 'Blond',
                            'chatain'=>'Chatain',
                             'roux'=>'Roux',
                            'bleu' => 'Bleu',
                            'autre' => 'Autre');
    private $yeux = array('vert'=>'Vert',
                         'bleu'=>'Bleu',
                         'rouge' => 'Rouge',
                         'noir' => 'Noir',
                         'marron' => 'Marron');
    private $countryList = array(
	"Afrique australe" => array(
		"ZA" => "Afrique du Sud",
		"BW" => "Botswana",
		"LS" => "Lesotho",
		"NA" => "Namibie",
		"SZ" => "Swaziland",
	),
	"Afrique centrale" => array(
		"AO" => "Angola",
		"CM" => "Cameroun",
		"CG" => "Congo",
		"GA" => "Gabon",
		"GQ" => "Guinée équatoriale",
		"CF" => "République centrafricaine",
		"CD" => "République démocratique du Congo",
		"ST" => "Sao Tomé-et-Principe",
		"TD" => "Tchad",
	),
	"Afrique occidentale" => array(
		"BF" => "Burkina Faso",
		"BJ" => "Bénin",
		"CV" => "Cap-Vert",
		"CI" => "Côte d’Ivoire",
		"GM" => "Gambie",
		"GH" => "Ghana",
		"GN" => "Guinée",
		"GW" => "Guinée-Bissau",
		"LR" => "Libéria",
		"ML" => "Mali",
		"MR" => "Mauritanie",
		"NE" => "Niger",
		"NG" => "Nigéria",
		"SH" => "Sainte-Hélène",
		"SL" => "Sierra Leone",
		"SN" => "Sénégal",
		"TG" => "Togo",
	),
	"Afrique orientale" => array(
		"BI" => "Burundi",
		"KM" => "Comores",
		"DJ" => "Djibouti",
		"KE" => "Kenya",
		"MG" => "Madagascar",
		"MW" => "Malawi",
		"MU" => "Maurice",
		"YT" => "Mayotte",
		"MZ" => "Mozambique",
		"UG" => "Ouganda",
		"RW" => "Rwanda",
		"RE" => "Réunion",
		"SC" => "Seychelles",
		"SO" => "Somalie",
		"TZ" => "Tanzanie",
		"ZM" => "Zambie",
		"ZW" => "Zimbabwe",
		"ER" => "Érythrée",
		"ET" => "Éthiopie",
	),
	"Afrique septentrionale" => array(
		"DZ" => "Algérie",
		"LY" => "Libye",
		"MA" => "Maroc",
		"EH" => "Sahara occidental",
		"SD" => "Soudan",
		"TN" => "Tunisie",
		"EG" => "Égypte",
	),
	"Amérique centrale" => array(
		"BZ" => "Belize",
		"CR" => "Costa Rica",
		"SV" => "El Salvador",
		"GT" => "Guatemala",
		"HN" => "Honduras",
		"MX" => "Mexique",
		"NI" => "Nicaragua",
		"PA" => "Panama",
	),
	"Amérique du Sud" => array(
		"AR" => "Argentine",
		"BO" => "Bolivie",
		"BR" => "Brésil",
		"CL" => "Chili",
		"CO" => "Colombie",
		"GY" => "Guyana",
		"GF" => "Guyane française",
		"PY" => "Paraguay",
		"PE" => "Pérou",
		"SR" => "Suriname",
		"UY" => "Uruguay",
		"VE" => "Venezuela",
		"EC" => "Équateur",
		"FK" => "Îles Malouines",
	),
	"Amérique septentrionale" => array(
		"BM" => "Bermudes",
		"CA" => "Canada",
		"GL" => "Groenland",
		"PM" => "Saint-Pierre-et-Miquelon",
		"US" => "États-Unis",
	),
	"Asie centrale" => array(
		"KZ" => "Kazakhstan",
		"KG" => "Kirghizistan",
		"UZ" => "Ouzbékistan",
		"TJ" => "Tadjikistan",
		"TM" => "Turkménistan",
	),
	"Asie du Sud" => array(
		"AF" => "Afghanistan",
		"BD" => "Bangladesh",
		"BT" => "Bhoutan",
		"IN" => "Inde",
		"IR" => "Iran",
		"MV" => "Maldives",
		"NP" => "Népal",
		"PK" => "Pakistan",
		"LK" => "Sri Lanka",
	),
	"Asie du Sud-Est" => array(
		"BN" => "Brunéi Darussalam",
		"KH" => "Cambodge",
		"ID" => "Indonésie",
		"LA" => "Laos",
		"MY" => "Malaisie",
		"MM" => "Myanmar",
		"PH" => "Philippines",
		"SG" => "Singapour",
		"TH" => "Thaïlande",
		"TL" => "Timor oriental",
		"VN" => "Viêt Nam",
	),
	"Asie occidentale" => array(
		"SA" => "Arabie saoudite",
		"AM" => "Arménie",
		"AZ" => "Azerbaïdjan",
		"BH" => "Bahreïn",
		"CY" => "Chypre",
		"GE" => "Géorgie",
		"IQ" => "Irak",
		"IL" => "Israël",
		"JO" => "Jordanie",
		"KW" => "Koweït",
		"LB" => "Liban",
		"OM" => "Oman",
		"QA" => "Qatar",
		"SY" => "Syrie",
		"PS" => "Territoire palestinien",
		"TR" => "Turquie",
		"YE" => "Yémen",
		"AE" => "Émirats arabes unis",
	),
	"Asie orientale" => array(
		"CN" => "Chine",
		"KP" => "Corée du Nord",
		"KR" => "Corée du Sud",
		"JP" => "Japon",
		"MN" => "Mongolie",
		"HK" => "R.A.S. chinoise de Hong Kong",
		"MO" => "R.A.S. chinoise de Macao",
		"TW" => "Taïwan",
	),
	"Australie et Nouvelle-Zélande" => array(
		"AU" => "Australie",
		"NZ" => "Nouvelle-Zélande",
		"NF" => "Île Norfolk",
	),
	"Caraïbes" => array(
		"AI" => "Anguilla",
		"AG" => "Antigua-et-Barbuda",
		"AN" => "Antilles néerlandaises",
		"AW" => "Aruba",
		"BS" => "Bahamas",
		"BB" => "Barbade",
		"CU" => "Cuba",
		"DM" => "Dominique",
		"GD" => "Grenade",
		"GP" => "Guadeloupe",
		"HT" => "Haïti",
		"JM" => "Jamaïque",
		"MQ" => "Martinique",
		"MS" => "Montserrat",
		"PR" => "Porto Rico",
		"DO" => "République dominicaine",
		"BL" => "Saint-Barthélémy",
		"KN" => "Saint-Kitts-et-Nevis",
		"MF" => "Saint-Martin",
		"VC" => "Saint-Vincent-et-les Grenadines",
		"LC" => "Sainte-Lucie",
		"TT" => "Trinité-et-Tobago",
		"KY" => "Îles Caïmans",
		"TC" => "Îles Turks et Caïques",
		"VG" => "Îles Vierges britanniques",
		"VI" => "Îles Vierges des États-Unis",
	),
	"Communauté des États indépendants" => array(
		"AM" => "Arménie",
		"AZ" => "Azerbaïdjan",
		"BY" => "Bélarus",
		"GE" => "Géorgie",
		"KZ" => "Kazakhstan",
		"KG" => "Kirghizistan",
		"MD" => "Moldavie",
		"UZ" => "Ouzbékistan",
		"RU" => "Russie",
		"TJ" => "Tadjikistan",
		"TM" => "Turkménistan",
		"UA" => "Ukraine",
	),
	"Europe méridionale" => array(
		"AL" => "Albanie",
		"AD" => "Andorre",
		"BA" => "Bosnie-Herzégovine",
		"HR" => "Croatie",
		"ES" => "Espagne",
		"GI" => "Gibraltar",
		"GR" => "Grèce",
		"IT" => "Italie",
		"MK" => "Macédoine",
		"MT" => "Malte",
		"ME" => "Monténégro",
		"PT" => "Portugal",
		"SM" => "Saint-Marin",
		"RS" => "Serbie",
		"CS" => "Serbie-et-Monténégro",
		"SI" => "Slovénie",
		"VA" => "État de la Cité du Vatican",
	),
	"Europe occidentale" => array(
		"DE" => "Allemagne",
		"AT" => "Autriche",
		"BE" => "Belgique",
		"FR" => "France",
		"LI" => "Liechtenstein",
		"LU" => "Luxembourg",
		"MC" => "Monaco",
		"NL" => "Pays-Bas",
		"CH" => "Suisse",
	),
	"Europe orientale" => array(
		"BG" => "Bulgarie",
		"BY" => "Bélarus",
		"HU" => "Hongrie",
		"MD" => "Moldavie",
		"PL" => "Pologne",
		"RO" => "Roumanie",
		"RU" => "Russie",
		"CZ" => "République tchèque",
		"SK" => "Slovaquie",
		"UA" => "Ukraine",
	),
	"Europe septentrionale" => array(
		"DK" => "Danemark",
		"EE" => "Estonie",
		"FI" => "Finlande",
		"GG" => "Guernesey",
		"IE" => "Irlande",
		"IS" => "Islande",
		"JE" => "Jersey",
		"LV" => "Lettonie",
		"LT" => "Lituanie",
		"NO" => "Norvège",
		"GB" => "Royaume-Uni",
		"SE" => "Suède",
		"SJ" => "Svalbard et Île Jan Mayen",
		"IM" => "Île de Man",
		"FO" => "Îles Féroé",
		"AX" => "Îles Åland",
	),
	"Mélanésie" => array(
		"FJ" => "Fidji",
		"NC" => "Nouvelle-Calédonie",
		"PG" => "Papouasie-Nouvelle-Guinée",
		"VU" => "Vanuatu",
		"SB" => "Îles Salomon",
	),
	"Polynésie" => array(
		"NU" => "Niue",
		"PN" => "Pitcairn",
		"PF" => "Polynésie française",
		"WS" => "Samoa",
		"AS" => "Samoa américaines",
		"TK" => "Tokelau",
		"TO" => "Tonga",
		"TV" => "Tuvalu",
		"WF" => "Wallis-et-Futuna",
		"CK" => "Îles Cook",
	),
	"région micronésienne" => array(
		"GU" => "Guam",
		"KI" => "Kiribati",
		"NR" => "Nauru",
		"PW" => "Palaos",
		"FM" => "États fédérés de Micronésie",
		"MP" => "Îles Mariannes du Nord",
		"MH" => "Îles Marshall",
	),
	"Îles Anglo-normandes" => array(
		"GG" => "Guernesey",
		"JE" => "Jersey",
	),
);

    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('age')
            ->add('poids')
            ->add('taille')
            ->add('cheveux','choice',array('label' => 'Couleur de cheveux',
                                           'choices' => $this->cheveux ))
            ->add('yeux','choice',array('label'=>'Couleur des yeux',
                                       'choices'=> $this->yeux))
            ->add('paysOrigine','choice',array('label' => 'Pays d\'origine',
                                              'choices' => $this->countryList))
            ->add('villeOrigine')
            ->add('dateArr')
            ->add('etatSante')
            ->add('contamine')
            ->add('camp')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tropi\CampsBundle\Entity\Refugie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tropi_campsbundle_refugie';
    }
}
