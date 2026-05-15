import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export const initHeroAnimations = () => {
    const tl = gsap.timeline({ defaults: { ease: 'power4.out' } });

    // Animation d'entrée du Hero Header
    tl.to('.hero-title', {
        y: 0,
        opacity: 1,
        duration: 1.2,
        delay: 0.2,
        stagger: 0.1
    })
    .to('.hero-subtitle', {
        y: 0,
        opacity: 1,
        duration: 1,
    }, '-=0.8')
    .to('.hero-cta', {
        opacity: 1,
        duration: 0.8,
    }, '-=0.6');

    // Nouveaux éléments à révéler au scroll (titres, paragraphes)
    gsap.utils.toArray('.reveal-up').forEach((elem) => {
        gsap.fromTo(elem, 
            { opacity: 0, y: 50 },
            {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: elem,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );
    });

    // Image Reveal Effect
    gsap.utils.toArray('.image-reveal').forEach((elem) => {
        gsap.fromTo(elem, 
            { opacity: 0, scale: 0.9, filter: 'blur(10px)' },
            {
                opacity: 1,
                scale: 1,
                filter: 'blur(0px)',
                duration: 1.5,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: elem,
                    start: 'top 80%',
                }
            }
        );
    });

    // Staggered Services Cards
    if (document.querySelector('.services-grid')) {
        gsap.fromTo('.service-card', 
            { opacity: 0, y: 50 },
            {
                opacity: 1,
                y: (i, target) => target.classList.contains('md:translate-y-8') ? 32 : 0, // Preserve the css translate
                duration: 1,
                stagger: 0.2,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: '.services-grid',
                    start: 'top 80%',
                }
            }
        );
    }

    // Gallery Items Stagger
    if (document.querySelector('.gallery-grid')) {
        gsap.fromTo('.gallery-item', 
            { opacity: 0, y: 30 },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: '.gallery-grid',
                    start: 'top 85%',
                }
            }
        );
    }
};
