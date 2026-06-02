import { initSmoothScroll } from './core/smoothScroll';
import { initWebGL } from './webgl/index';
import { initHeroAnimations } from './animations/heroReveal';
import { initForms } from './forms';
import { initBackgroundAudio } from './core/backgroundAudio';

document.addEventListener('DOMContentLoaded', () => {
    // 1. Démarrer le scroll natif fluide
    const lenis = initSmoothScroll();

    // 2. Initialiser l'arrière-plan interactif (Canvas/Three.js)
    initWebGL();

    // 3. Lancer les animations d'entrée au scroll
    initHeroAnimations();

    // 4. Initialiser la logique des formulaires (AJAX + Lottie)
    initForms();

    // 5. Lecteur audio de fond
    initBackgroundAudio();
});
