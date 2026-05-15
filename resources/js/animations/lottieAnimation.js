import lottie from 'lottie-web';

export const initLottieSuccess = () => {
    const container = document.getElementById('lottie-container');
    if (!container) return null;

    // Use a default success animation from LottieFiles (public URL or embedded JSON)
    // For this example, we use a reliable external success animation URL
    return lottie.loadAnimation({
        container: container,
        renderer: 'svg',
        loop: false,
        autoplay: false,
        path: 'https://assets2.lottiefiles.com/packages/lf20_jbrw3hcz.json' // Checkmark animation
    });
};
