export const initBackgroundAudio = () => {
    const toggleBtn = document.getElementById('audio-toggle');
    const iconPlay = document.getElementById('audio-icon-play');
    const iconPause = document.getElementById('audio-icon-pause');
    const waves = document.getElementById('audio-waves');
    
    if (!toggleBtn) return;

    // Assure-toi d'avoir un fichier background.mp3 dans le dossier public/
    const bgMusic = new Audio('/background.mp3');
    bgMusic.loop = true; // La musique boucle indéfiniment
    bgMusic.volume = 0.0; // Commence à 0 pour le fade-in
    
    let isPlaying = false;
    let fadeInterval;

    const updateUI = () => {
        if (isPlaying) {
            iconPlay.classList.add('hidden');
            iconPause.classList.remove('hidden');
            waves.classList.remove('hidden');
            toggleBtn.classList.add('border-studio-accent');
        } else {
            iconPlay.classList.remove('hidden');
            iconPause.classList.add('hidden');
            waves.classList.add('hidden');
            toggleBtn.classList.remove('border-studio-accent');
        }
    };

    const fadeAudio = (targetVolume, duration = 1000) => {
        clearInterval(fadeInterval);
        const steps = 20;
        const stepTime = duration / steps;
        const volumeStep = (targetVolume - bgMusic.volume) / steps;

        fadeInterval = setInterval(() => {
            let newVolume = bgMusic.volume + volumeStep;
            
            // Sécurité pour rester entre 0.0 et 1.0
            if (newVolume >= 1.0) newVolume = 1.0;
            if (newVolume <= 0.0) newVolume = 0.0;

            bgMusic.volume = newVolume;

            if (Math.abs(bgMusic.volume - targetVolume) < 0.01) {
                bgMusic.volume = targetVolume;
                clearInterval(fadeInterval);
                if (targetVolume === 0) {
                    bgMusic.pause();
                }
            }
        }, stepTime);
    };

    toggleBtn.addEventListener('click', () => {
        if (!isPlaying) {
            // Lecture
            bgMusic.play().then(() => {
                isPlaying = true;
                updateUI();
                fadeAudio(0.3, 1000); // Fade in jusqu'à 30% de volume
            }).catch(e => {
                console.error("Impossible de lire l'audio", e);
            });
        } else {
            // Pause
            isPlaying = false;
            updateUI();
            fadeAudio(0.0, 800); // Fade out vers 0
        }
    });
};
