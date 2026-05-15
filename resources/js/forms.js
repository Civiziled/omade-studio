import { initLottieSuccess } from './animations/lottieAnimation';

export const initForms = () => {
    const bookingForm = document.getElementById('booking-form');
    const contactForm = document.getElementById('contact-form');
    
    // Setup Lottie
    const lottieSuccessAnim = initLottieSuccess();

    if (bookingForm) {
        bookingForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const feedback = document.getElementById('booking-feedback');
            feedback.classList.add('hidden');
            
            const formData = new FormData(bookingForm);
            
            try {
                const response = await fetch('/bookings', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                const data = await response.json();
                
                if (response.ok) {
                    feedback.textContent = data.message;
                    feedback.className = 'mb-6 text-sm px-4 py-3 rounded-xl bg-green-500/20 text-green-400 border border-green-500/30';
                    bookingForm.reset();
                } else {
                    throw new Error(data.message || 'Une erreur est survenue.');
                }
            } catch (error) {
                feedback.textContent = error.message;
                feedback.className = 'mb-6 text-sm px-4 py-3 rounded-xl bg-red-500/20 text-red-400 border border-red-500/30';
            } finally {
                feedback.classList.remove('hidden');
            }
        });
    }

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const feedback = document.getElementById('contact-feedback');
            feedback.classList.add('hidden');
            
            const formData = new FormData(contactForm);
            
            try {
                const response = await fetch('/contact', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                if (response.ok) {
                    // Show Lottie Overlay
                    const overlay = document.getElementById('lottie-success');
                    overlay.classList.remove('hidden');
                    overlay.classList.add('flex');
                    if (lottieSuccessAnim) {
                        lottieSuccessAnim.goToAndPlay(0, true);
                    }
                    contactForm.reset();
                    
                    // Hide overlay after 3 seconds
                    setTimeout(() => {
                        overlay.classList.add('hidden');
                        overlay.classList.remove('flex');
                    }, 3000);
                } else {
                    const data = await response.json();
                    throw new Error(data.message || 'Erreur lors de l\'envoi.');
                }
            } catch (error) {
                feedback.textContent = error.message;
                feedback.classList.remove('hidden');
            }
        });
    }
};
