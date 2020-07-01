<?php 

return [
    'accepted' => 'Le champ :attribute doit être accepté.',
    'active_url' => 'Le champ :attribute n\'est pas une URL valide.',
    'after' => 'Le champ :attribute doit être une date postérieure au :date.',
    'after_or_equal' => 'Le champ :attribute doit être une date postérieure ou égale au :date.',
    'alpha' => 'Le champ :attribute doit seulement contenir des lettres.',
    'alpha_dash' => 'Le champ :attribute doit seulement contenir des lettres, des chiffres et des tirets.',
    'alpha_num' => 'Le champ :attribute doit seulement contenir des chiffres et des lettres.',
    'array' => 'Le champ :attribute doit être un tableau.',
    'before' => 'Le champ :attribute doit être une date antérieure au :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date antérieure ou égale au :date.',
    'between' => [
        'numeric' => 'La valeur de :attribute doit être comprise entre :min et :max.',
        'file' => 'La taille du fichier de :attribute doit être comprise entre :min et :max kilo-octets.',
        'string' => 'Le champ :attribute doit contenir une chaîne de :min à :max caractères.',
        'array' => 'Le tableau :attribute doit contenir entre :min et :max éléments.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'Le champ de confirmation :attribute ne correspond pas.',
    'date' => 'Le champ :attribute n\'est pas une date valide.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'Le champ :attribute ne correspond pas au format :format.',
    'different' => 'Les champs :attribute et :other doivent être différents.',
    'digits' => 'Le champ :attribute doit contenir :digits chiffres.',
    'digits_between' => 'Le champ :attribute doit contenir entre :min et :max chiffres.',
    'dimensions' => 'La taille de l\'image :attribute n\'est pas conforme.',
    'distinct' => 'Le champ :attribute a une valeur dupliquée.',
    'email' => 'Le champ :attribute doit être une adresse e-mail valide.',
    'exists' => 'Le champ :attribute sélectionné est invalide.',
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute est obligatoire.',
    'image' => 'Le champ :attribute doit être une image.',
    'in' => 'Le champ :attribute est invalide.',
    'in_array' => 'Le champ :attribute n\'existe pas dans :other.',
    'integer' => 'Le champ :attribute doit être un entier.',
    'ip' => 'Le champ :attribute doit être une adresse IP valide.',
    'json' => 'Le champ :attribute doit être un document JSON valide.',
    'max' => [
        'numeric' => 'La valeur de :attribute ne peut être supérieure à :max.',
        'file' => 'La taille du fichier de :attribute ne peut pas dépasser :max kilo-octets.',
        'string' => 'Le texte de :attribute ne peut contenir plus de :max caractères.',
        'array' => 'Le tableau :attribute ne peut contenir plus de :max éléments.',
    ],
    'mimes' => 'Le champ :attribute doit être un fichier de type : :values.',
    'mimetypes' => 'Le champ :attribute doit être un fichier de type : :values.',
    'min' => [
        'numeric' => 'La valeur de :attribute doit être supérieure ou égale à :min.',
        'file' => 'La taille du fichier de :attribute doit être supérieure à :min kilo-octets.',
        'string' => 'Le texte :attribute doit contenir au moins :min caractères.',
        'array' => 'Le tableau :attribute doit contenir au moins :min éléments.',
    ],
    'not_in' => 'Le champ :attribute sélectionné n\'est pas valide.',
    'numeric' => 'Le champ :attribute doit contenir un nombre.',
    'present' => 'Le champ :attribute doit être présent.',
    'regex' => 'Le format du champ :attribute est invalide.',
    'required' => 'Le champ :attribute est obligatoire.',
    'required_if' => 'Le champ :attribute est obligatoire quand la valeur de :other est :value.',
    'required_unless' => 'Le champ :attribute est obligatoire sauf si :other est :values.',
    'required_with' => 'Le champ :attribute est obligatoire quand :values est présent.',
    'required_with_all' => 'Le champ :attribute est obligatoire quand :values est présent.',
    'required_without' => 'Le champ :attribute est obligatoire quand :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est requis quand aucun de :values n\'est présent.',
    'same' => 'Les champs :attribute et :other doivent être identiques.',
    'size' => [
        'numeric' => 'La valeur de :attribute doit être :size.',
        'file' => 'La taille du fichier de :attribute doit être de :size kilo-octets.',
        'string' => 'Le texte de :attribute doit contenir :size caractères.',
        'array' => 'Le tableau :attribute doit contenir :size éléments.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'Le champ :attribute doit être une chaîne de caractères.',
    'timezone' => 'Le champ :attribute doit être un fuseau horaire valide.',
    'unique' => 'Le :attribute est déjà utilisé.',
    'uploaded' => 'Le fichier du champ :attribute n\'a pu être téléchargé.',
    'url' => 'Le format de l\'URL de :attribute n\'est pas valide.',
    'required_package_id' => 'Vous devez sélectionner une option de forfait premium pour continuer.',
    'required_payment_method_id' => 'Vous devez sélectionner un moyen de paiement pour continuer.',
    'blacklist_email_rule' => 'Cette adresse email est bannie du site.',
    'blacklist_domain_rule' => 'Le domaine de votre adresse email est banni du site.',
    'blacklist_word_rule' => 'Le champ :attribute contient des mots ou des expressions bannis.',
    'blacklist_title_rule' => 'Le champ :attribute contient des mots ou des expressions bannis.',
    'between_rule' => 'Le champ :attribute doit contenir une chaîne de :min à :max caractères.',
    'recaptcha' => 'Le champ :attribute n\'est pas correcte.',
    'phone' => 'Le champ :attribute contient un numéro invalide.',
    'dumbpwd' => 'Ce mot de passe est trop commun. Essayez un autre!',
    'phone_number' => 'Votre numéro de téléphone n\'est pas valide.',
    'username_is_valid_rule' => 'Le champ :attribute doit être une chaîne alphanumérique.',
    'username_is_allowed_rule' => 'La valeur du champ :attribute n\'est pas autorisée.',
    'custom' => [
        'database_connection' => [
            'required' => 'Can\'t connect to MySQL server',
        ],
        'database_not_empty' => [
            'required' => 'The database is not empty',
        ],
        'promo_code_not_valid' => [
            'required' => 'The promo code is not valid',
        ],
        'smtp_valid' => [
            'required' => 'Can\'t connect to SMTP server',
        ],
        'yaml_parse_error' => [
            'required' => 'Can\'t parse yaml. Please check the syntax',
        ],
        'file_not_found' => [
            'required' => 'File not found.',
        ],
        'not_zip_archive' => [
            'required' => 'The file is not a zip package.',
        ],
        'zip_archive_unvalid' => [
            'required' => 'Cannot read the package.',
        ],
        'custom_criteria_empty' => [
            'required' => 'Custom criteria cannot be empty',
        ],
        'php_bin_path_invalid' => [
            'required' => 'Invalid PHP executable. Please check again.',
        ],
        'can_not_empty_database' => [
            'required' => 'Cannot DROP certain tables, please cleanup your database manually and try again.',
        ],
        'recaptcha_invalid' => [
            'required' => 'Invalid reCAPTCHA check.',
        ],
        'payment_method_not_valid' => [
            'required' => 'Something went wrong with payment method setting. Please check again.',
        ],
    ],
    'attributes' => [
        'gender' => 'genre',
        'gender_id' => 'genre',
        'name' => 'nom',
        'first_name' => 'prénom',
        'last_name' => 'nom',
        'user_type' => 'user type',
        'user_type_id' => 'user type',
        'country' => 'pays',
        'country_code' => 'pays',
        'phone' => 'téléphone',
        'address' => 'adresse',
        'mobile' => 'portable',
        'sex' => 'sexe',
        'year' => 'année',
        'month' => 'mois',
        'day' => 'jour',
        'hour' => 'heure',
        'minute' => 'minute',
        'second' => 'seconde',
        'username' => 'nom d\'utilisateur',
        'email' => 'adresse email',
        'password' => 'mot de passe',
        'password_confirmation' => 'confirmation du mot de passe',
        'g-recaptcha-response' => 'captcha',
        'term' => 'conditions',
        'category' => 'categorie',
        'category_id' => 'categorie',
        'post_type' => 'type d\'annonce',
        'post_type_id' => 'type d\'annonce',
        'title' => 'titre',
        'body' => 'contenu',
        'description' => 'description',
        'excerpt' => 'extrait',
        'date' => 'date',
        'time' => 'heure',
        'available' => 'disponible',
        'size' => 'taille',
        'price' => 'prix',
        'salary' => 'salaire',
        'contact_name' => 'nom',
        'location' => 'localité',
        'admin_code' => 'localité',
        'city' => 'ville',
        'city_id' => 'ville',
        'package' => 'forfait',
        'package_id' => 'forfait',
        'payment_method' => 'moyen de paiement',
        'payment_method_id' => 'moyen de paiement',
        'sender_name' => 'nom',
        'subject' => 'objet',
        'message' => 'message',
        'report_type' => 'type d\'abus',
        'report_type_id' => 'type d\'abus',
        'file' => 'fichier',
        'filename' => 'fichier',
        'picture' => 'image',
        'resume' => 'CV',
        'login' => 'identifiant',
        'code' => 'code',
        'token' => 'jeton',
        'comment' => 'commentaire',
        'rating' => 'note',
    ],
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'not_regex' => 'The :attribute format is invalid.',
    'locale_of_language_rule' => 'The :attribute field is not valid.',
    'locale_of_country_rule' => 'The :attribute field is not valid.',
    'currencies_codes_are_valid_rule' => 'The :attribute field is not valid.',
    'attributes.locale' => 'locale',
    'attributes.currencies' => 'currencies',
    'blacklist_ip_rule' => 'Le champ :attribute doit être une adresse IP valide.',
    'custom_field_unique_rule' => 'Le champ :field_1 a déjà le champ :field_2 assigné.',
    'custom_field_unique_rule_field' => 'Le champ :field_1 est déjà assigné au champ :field_2.',
    'custom_field_unique_children_rule' => 'Un(e) :field_1 dérivé(e) du(de la) :field_1 a déjà le champ :field_2 assigné.',
    'custom_field_unique_children_rule_field' => 'Le(La) :field_1 est déjà assigné à un(e) :field_2 appartenant à ce(tte) :field_2.',
    'custom_field_unique_parent_rule' => 'Le(La) :field_1 parent(e) est déjà assigné(e) au champ :field_2.',
    'custom_field_unique_parent_rule_field' => 'Le(La) :field_1 est déjà assigné au(à la) :field_2 parent de ce(tte) :field_2.',
    'attributes.tags' => 'Tags',
    'mb_alphanumeric_rule' => 'Please enter a valid content in the :attribute field.',
    'attributes.from_name' => 'name',
    'attributes.from_email' => 'email',
    'attributes.from_phone' => 'phone',
];
