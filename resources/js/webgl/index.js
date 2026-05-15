import * as THREE from 'three';

export const initWebGL = () => {
    const canvas = document.getElementById('webgl-canvas');
    if (!canvas) return;

    // Scène de base
    const scene = new THREE.Scene();
    
    // Caméra
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.z = 5;

    // Rendu
    const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    // Particules interactives (style "Ondes Sonores" basique pour l'instant)
    const particlesGeometry = new THREE.BufferGeometry();
    const particlesCount = 2000;
    const posArray = new Float32Array(particlesCount * 3);

    for(let i = 0; i < particlesCount * 3; i++) {
        // Forme sphérique éclatée
        posArray[i] = (Math.random() - 0.5) * 15;
    }

    particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));

    const material = new THREE.PointsMaterial({
        size: 0.02,
        color: 0xff3366, // studio-accent
        transparent: true,
        opacity: 0.8,
        blending: THREE.AdditiveBlending
    });

    const particlesMesh = new THREE.Points(particlesGeometry, material);
    scene.add(particlesMesh);

    // Interaction souris
    let mouseX = 0;
    let mouseY = 0;

    document.addEventListener('mousemove', (event) => {
        mouseX = (event.clientX / window.innerWidth) - 0.5;
        mouseY = (event.clientY / window.innerHeight) - 0.5;
    });

    // Animation loop
    const tick = () => {
        // Rotation subtile automatique
        particlesMesh.rotation.y += 0.001;
        particlesMesh.rotation.x += 0.0005;

        // Interaction fluide avec la souris
        particlesMesh.rotation.y += mouseX * 0.05;
        particlesMesh.rotation.x += mouseY * 0.05;

        renderer.render(scene, camera);
        window.requestAnimationFrame(tick);
    };

    tick();

    // Responsive
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
};
