# La Banque des Développeurs PHP

Cette semaine est une étape très importante dans votre formation. Vous allez découvrir aujourd’hui un nouveau langage qui constituera la coeur de votre métier : le PHP.
Les objectifs cette semaine sont que vous puissiez vous consacrez à la pratique de l’algorithmique et donc la découverte de la syntaxe de PHP mais aussi comprendre les fonctionnalités apportées par PHP sur un site web et les appliquer à votre projet fil rouge.

## Projet à rendre : Dynamiser le projet fil rouge

Le conseil d’administration a été très satisfait du premier jet de votre application et la trouve intéressante. Il a donc donné son feu vert au service informatique pour poursuivre le projet.
Votre scrum master après en avoir discuté avec le product owner est revenu vers vous et vous demande maintenant de commencer à dynamiser l’application à l’aide d’un langage back-end afin de pouvoir intégrer par la suite une base de données.
Il souhaiterait dans un premier temps intégrer les fonctionnalités çi-dessous.

## Spécifications fonctionnelles :

- Afin de gagner en maintenabilité, le template n’est plus dupliqué sur toutes les pages. Il est maintenant éclaté dans des fichiers header.php, nav.php, footer.php etc chargés sur chacune des pages.

- Les données pour affichées les comptes en banque sur la page d’accueil sont maintenant stockées dans un tableau (cf ficher externe joint), et une boucle affiche tous les comptes. Ceux-ci ne sont plus écrits en dur dans le HTML

- Quand on clique sur un compte en banque, on arrive sur une page spécifique dédiée au compte et qui n’affiche que les informations de ce compte. Cette fonctionnalité utilise la transmission de données par l’URL.

- Quand l’utilisateur remplit le formulaire de création de compte et qu’il soumet le formulaire, le compte est créé à côté du formulaire avec les informations rentrées par l’utilisateur.

- Intégrer un embryon de formulaire de connexion, en effet plus tard il faudra pouvoir gérer les utilisateurs de l’application. Rajoutez une page de connexion avec un formulaire demandant un login et un mot de passe. Le login et le mdp rentrés sont comparés à un login et un mdp stockés en dur dans le fichier et s’ils sont identiques l’utilisateur est redirigé vers l’application.

- A la création d’un compte bancaire appliquer des vérifications de sécurité. Par exemple, vérifier que le type de compte est bien un type de compte autorisé (courant, pel, livret a, …). Vérifier également que les montant minimum à l’ouverture est bien d’au moins 50 euros.

- L’application n’est accessible qu’aux seuls utilisateurs connectés.

- Quand un utilisateur non connecté va sur l’application il est redirigé vers une page de connexion avec un formulaire.

- Un utilisateur se connecte à l’aide d’une adresse mail et d’un mot de passe.

- Une fois connecté, l’utilisateur voit uniquement ses comptes en banque personnels. Pour l’instant il ne voit pas la dernière opération effectuée sur le compte, juste les comptes avec leurs informations. 

- Quand l’utilisateur clique sur un compte en banque, il arrive sur une page dédié au compte où il voit les informations du compte mais aussi les dernières opérations effectuées sur le compte.

- Via une page dédiée un utilisateur peut créer un nouveau compte personnel à l’aide d’un formulaire. Une fois créé le compte apparaît sur la page d’accueil. Attention le compte doit respecter les conditions minimum de création de compte (bon type et bon montant)  

- L’utilisateur peut effectuer des dépôts ou des retraits sur le compte de son choix. Le montant du compte est alors mis à jour et une nouvelle opération est enregistrée sur le compte.

## Spécifications techniques :

- PHP 7

- Serveur Apache2

- Utilisation de PDO pour se connecter à la base de données

- Base Boilerplate

- SGBD : MySQL
