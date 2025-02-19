# todoz

## 📂 Évolution du Projet

### Phase 1 : Structure de Base (17-18/02/2025)

- **Modélisation BDD** : Création des entités (Task, Network, Like, User, Todo) avec relations
- **Validation** : Mise en place des contraintes de validation avec Assertions
- **Sécurité** : Implémentation d'un système de connexion utilisateur
- **Configuration** : 
  - Installation de TailwindCSS
  - Ajout des assets (fonts, favicon)
  - Intégration de UX Turbo pour les interactions dynamiques

### Phase 2 : Développement UI/UX (18-19/02/2025)

- **Design System** :
  - Création des composants navbar/footer
  - Uniformisation des styles typographiques
  - Ajout d'icônes avec UX Icons
- **Fonctionnalités Front** :
  - Système de recherche dynamique
  - Composants Live pour mise à jour en temps réel
  - Extension Twig pour le formatage des dates
- **Accessibilité** :
  - Amélioration de la navigation clavier
  - Remplacement des éléments interactifs problématiques

### Phase 3 : Implémentation des Fonctionnalités (19/02/2025)

- **Gestion des Todos** :
  - CRUD complet avec formulaires
  - Filtrage et tri des tâches
  - Système de référence unique (propriété "ref")
- **Architecture** :
  - Contrôleurs spécialisés (TodoController)
  - Organisation des templates Twig
  - Séparation logique métier/composants

### Phase 4 : Optimisations Finales (19/02/2025)
- **Tests** : Ajout de tests unitaires pour les contrôleurs
- **Documentation** : Commentaires détaillés dans le CSS
- **Performance** : Optimisation des requêtes Turbo
- **Qualité de code** : Réorganisation des fichiers

## 🛠 Fonctionnalités Clés

- ✅ Gestion hiérarchique des Todos
- 🔍 Recherche en temps réel
- 📅 Filtrage par dates personnalisées
- 👥 Fonctionnalités sociales (likes, partage)
- ♿ Interface accessible (WCAG)
- 🧪 Suite de tests automatisés

## 🧰 Technologies Utilisées

- Symfony
- PHP
- TailwindCSS
- UX Turbo
- Doctrine
- FakerPHP

## 🚀 Installation

```bash
git clone https://github.com/Jensone/todoz-sf.git
composer install
symfony serve -d
```

