<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo">
</p>

<h1 align="center">O'Made Studio - Plateforme Web & Réservation</h1>

<p align="center">
  <strong>Projet de fin d'études (TFE) - Conception et déploiement d'une solution digitale sur-mesure pour un studio d'enregistrement bruxellois.</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Filament_PHP-F59E0B?style=for-the-badge&logo=php&logoColor=white" alt="Filament">
  <img src="https://img.shields.io/badge/WebGL-990000?style=for-the-badge&logo=webgl&logoColor=white" alt="WebGL">
</p>

---

## 📖 À propos du projet

Ce projet a été développé dans le cadre de mon **Travail de Fin d'Études (TFE)** en développement web. Il s'agit d'une refonte complète et sur-mesure de l'infrastructure digitale d'**O'Made Studio**, un studio d'enregistrement professionnel basé à Bruxelles.

L'objectif principal était de remplacer des processus de réservation manuels (via messages Instagram) par une **plateforme centralisée, performante et juridiquement sécurisée**, tout en offrant une expérience utilisateur (UX) immersive et haut de gamme.

## ✨ Fonctionnalités clés

### 🎨 Front-End (Vitrine publique)
*   **Design Immersif (Dark Mode / Glassmorphism)** : Interface premium pensée pour la culture urbaine.
*   **Animations WebGL & Smooth Scrolling** : Intégration de ThreeJS/WebGL pour l'arrière-plan interactif et de Lenis pour un défilement fluide (60fps).
*   **Tunnel de réservation "Frictionless"** : Formulaire optimisé pour capturer les leads B2C sans barrière cognitive (intégration du compte Instagram).
*   **Conformité Légale Belge** : Intégration RGPD, Mentions Légales (BCE) et Conditions Générales de Vente (CGV).

### ⚙️ Back-End (Panel d'Administration)
*   **Dashboard Sécurisé (Filament PHP)** : Espace protégé par authentification forte.
*   **Gestion des Réservations (CRUD)** : Tableau interactif avec changement d'états (En attente, Confirmé, Annulé).
*   **Protection anti-vulnérabilités** : Architecture sécurisée contre les failles CSRF, XSS et les injections SQL (via l'ORM Eloquent).

## 🛠️ Stack Technique

*   **Framework Back-end** : Laravel 11.x (PHP 8.2)
*   **Framework Front-end** : Tailwind CSS (Utility-first) & Alpine.js
*   **Back-Office** : Filament PHP (TALL Stack)
*   **Base de données** : SQLite / MySQL
*   **Interactivité** : JavaScript Vanilla (ES6+), GSAP, Lenis

## 🚀 Installation en local (Pour le Jury)

Si vous souhaitez cloner ce projet et l'exécuter localement sur votre machine pour l'évaluer :

**1. Cloner le dépôt :**
```bash
git clone https://github.com/Civiziled/omade-studio.git
cd omade-studio
```

**2. Installer les dépendances PHP et Node :**
```bash
composer install
npm install
npm run build
```

**3. Configurer l'environnement :**
Copiez le fichier `.env.example` et renommez-le en `.env`.
```bash
cp .env.example .env
php artisan key:generate
```

**4. Base de données & Migrations :**
Assurez-vous que votre base de données locale est configurée dans le `.env`, puis lancez les migrations :
```bash
php artisan migrate
```

**5. Créer un accès Administrateur :**
Pour tester le Back-Office, générez un compte admin :
```bash
php artisan make:filament-user
```

**6. Lancer le serveur local :**
```bash
php artisan serve
```
Le site sera accessible sur `http://localhost:8000` et le panel d'administration sur `http://localhost:8000/admin`.

## 👨‍💻 Auteur

**Fayssal Tnaya** - Étudiant en développement web.
- **Superviseur TFE** : Tibault Six
- **Année Académique** : 2025-2026

## 📄 Licence

Ce projet est la propriété intellectuelle de son auteur et a été réalisé à des fins académiques. L'utilisation commerciale du code source par des tiers est soumise à autorisation. Le framework Laravel est sous licence MIT.
