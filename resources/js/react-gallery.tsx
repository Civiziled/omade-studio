import React from 'react';
import { createRoot } from 'react-dom/client';
import InteractiveBentoGallery, { MediaItemType } from './components/ui/interactive-bento-gallery';

function initGallery() {
    const rootElement = document.getElementById('react-gallery-root');
    if (rootElement) {
        // Retrieve medias from data attribute
        const rawMedias = rootElement.getAttribute('data-medias');
        let medias: any[] = [];
        try {
            if (rawMedias) medias = JSON.parse(rawMedias);
        } catch (e) {
            console.error("Failed to parse medias", e);
        }

        // Map database Media models to the format expected by the React component
        const mediaItems: MediaItemType[] = medias.map((media, index) => {
            // Cycle through span sizes for the bento layout
            const spans = [
                "md:col-span-1 md:row-span-3 sm:col-span-1 sm:row-span-2",
                "md:col-span-2 md:row-span-2 col-span-1 sm:col-span-2 sm:row-span-2",
                "md:col-span-1 md:row-span-3 sm:col-span-2 sm:row-span-2",
                "md:col-span-2 md:row-span-2 sm:col-span-1 sm:row-span-2",
            ];
            const span = spans[index % spans.length];

            return {
                id: media.id,
                type: media.type === 'video' ? 'video' : 'image',
                title: media.title,
                desc: "O'Made Studio", // Could use a subtitle if DB had one
                url: `/storage/${media.file_path}`,
                span: span
            };
        });

        try {
            const root = createRoot(rootElement);
            root.render(
                <React.StrictMode>
                    <InteractiveBentoGallery 
                        mediaItems={mediaItems} 
                        title="Notre Espace" 
                        description="Découvrez l'environnement unique où la magie opère. Cliquez ou glissez pour explorer." 
                    />
                </React.StrictMode>
            );
        } catch (err: any) {
            rootElement.innerHTML = `<div class="p-10 text-red-500 font-bold bg-white m-10 rounded z-50 relative">REACT ERROR: ${err.message}</div>`;
        }
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initGallery);
} else {
    initGallery();
}
