"use client"
import React, { useEffect, useRef, useState } from 'react'
import { motion, AnimatePresence } from 'framer-motion'
import { X, ChevronLeft, ChevronRight } from 'lucide-react';


// MediaItemType defines the structure of a media item
export interface MediaItemType {
    id: number;
    type: string;
    title: string;
    desc: string;
    url: string;
    span: string;
}
// MediaItem component renders either a video or image based on item.type
const MediaItem = ({ item, className, onClick }: { item: MediaItemType, className?: string, onClick?: () => void }) => {
    const videoRef = useRef<HTMLVideoElement>(null); // Reference for video element
    const [isInView, setIsInView] = useState(false); // To track if video is in the viewport
    const [isBuffering, setIsBuffering] = useState(true);  // To track if video is buffering

    // Intersection Observer to detect if video is in view and play/pause accordingly
    useEffect(() => {
        const options = {
            root: null,
            rootMargin: '50px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                setIsInView(entry.isIntersecting); // Set isInView to true if the video is in view
            });
        }, options);

        if (videoRef.current) {
            observer.observe(videoRef.current); // Start observing the video element
        }

        return () => {
            if (videoRef.current) {
                observer.unobserve(videoRef.current); // Clean up observer when component unmounts
            }
        };
    }, []);
    // Handle video play/pause based on whether the video is in view or not
    useEffect(() => {
        let mounted = true;

        const handleVideoPlay = async () => {
            if (!videoRef.current || !isInView || !mounted) return; // Don't play if video is not in view or component is unmounted

            try {
                if (videoRef.current.readyState >= 3) {
                    setIsBuffering(false);
                    await videoRef.current.play(); // Play the video if it's ready
                } else {
                    setIsBuffering(true);
                    await new Promise((resolve) => {
                        if (videoRef.current) {
                            videoRef.current.oncanplay = resolve; // Wait until the video can start playing
                        }
                    });
                    if (mounted) {
                        setIsBuffering(false);
                        await videoRef.current.play();
                    }
                }
            } catch (error) {
                console.warn("Video playback failed:", error);
            }
        };

        if (isInView) {
            handleVideoPlay();
        } else if (videoRef.current) {
            videoRef.current.pause();
        }

        return () => {
            mounted = false;
            if (videoRef.current) {
                videoRef.current.pause();
                videoRef.current.removeAttribute('src');
                videoRef.current.load();
            }
        };
    }, [isInView]);

    // Render either a video or image based on item.type

    if (item.type === 'video') {
        return (
            <div className={`${className} relative overflow-hidden`}>
                <video
                    ref={videoRef}
                    className="w-full h-full object-cover"
                    onClick={onClick}
                    playsInline
                    muted
                    loop
                    preload="auto"
                    style={{
                        opacity: isBuffering ? 0.8 : 1,
                        transition: 'opacity 0.2s',
                        transform: 'translateZ(0)',
                        willChange: 'transform',
                    }}
                >
                    <source src={item.url} type="video/mp4" />
                </video>
                {isBuffering && (
                    <div className="absolute inset-0 flex items-center justify-center bg-black/10">
                        <div className="w-6 h-6 border-2 border-white/30 border-t-white rounded-full animate-spin" />
                    </div>
                )}
            </div>
        );
    }

    return (
        <img
            src={item.url} // Image source URL
            alt={item.title} // Alt text for the image
            className={`${className} object-cover cursor-pointer select-none`} // Style the image
            onClick={onClick} // Trigger onClick when the image is clicked
            loading="lazy" // Lazy load the image for performance
            decoding="async" // Decode the image asynchronously
            draggable={false}
        />
    );
};



// GalleryModal component displays the selected media item in a modal
interface GalleryModalProps {
    selectedItem: MediaItemType;
    isOpen: boolean;
    onClose: () => void;
    setSelectedItem: (item: MediaItemType | null) => void;
    mediaItems: MediaItemType[]; // List of media items to display in the modal
}
const GalleryModal = ({ selectedItem, isOpen, onClose, setSelectedItem, mediaItems }: GalleryModalProps) => {
    const [dockPosition, setDockPosition] = useState({ x: 0, y: 0 });  // Track the position of the dockable panel

    if (!isOpen) return null; // Return null if the modal is not open

    const currentIndex = mediaItems.findIndex(item => item.id === selectedItem.id);

    const handlePrev = (e?: React.MouseEvent) => {
        if (e) e.stopPropagation();
        if (currentIndex > 0) {
            setSelectedItem(mediaItems[currentIndex - 1]);
        } else {
            setSelectedItem(mediaItems[mediaItems.length - 1]);
        }
    };

    const handleNext = (e?: React.MouseEvent) => {
        if (e) e.stopPropagation();
        if (currentIndex < mediaItems.length - 1) {
            setSelectedItem(mediaItems[currentIndex + 1]);
        } else {
            setSelectedItem(mediaItems[0]);
        }
    };

    useEffect(() => {
        const handleKeyDown = (e: KeyboardEvent) => {
            if (e.key === 'ArrowLeft') handlePrev();
            if (e.key === 'ArrowRight') handleNext();
            if (e.key === 'Escape') onClose();
        };
        window.addEventListener('keydown', handleKeyDown);
        return () => window.removeEventListener('keydown', handleKeyDown);
    }, [currentIndex]);

    return (
        <>
            {/* Main Modal */}
            <motion.div
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                transition={{ duration: 0.3 }}
                className="fixed inset-0 w-full min-h-screen sm:h-screen backdrop-blur-xl bg-black/80
                          rounded-none overflow-hidden z-[100] flex flex-col"
                onClick={onClose}
            >
                {/* Main Content */}
                <div className="flex-1 flex flex-row items-center justify-center p-4 relative" onClick={e => e.stopPropagation()}>
                    {/* Prev Button */}
                    <button 
                        className="absolute left-2 md:left-8 p-3 rounded-full bg-white/10 hover:bg-white/20 text-white backdrop-blur-md transition-all z-50 hidden md:block"
                        onClick={handlePrev}
                    >
                        <ChevronLeft className="w-8 h-8" />
                    </button>

                    <AnimatePresence mode="wait">
                        <motion.div
                            key={selectedItem.id}
                            className="relative w-full max-w-5xl h-auto max-h-[85vh] rounded-2xl overflow-hidden shadow-2xl flex items-center justify-center bg-transparent cursor-grab active:cursor-grabbing"
                            initial={{ x: 50, opacity: 0 }}
                            animate={{ x: 0, opacity: 1 }}
                            exit={{ x: -50, opacity: 0 }}
                            transition={{ type: "spring", stiffness: 300, damping: 30 }}
                            drag="x"
                            dragConstraints={{ left: 0, right: 0 }}
                            dragElastic={0.2}
                            onDragEnd={(e, { offset }) => {
                                if (offset.x < -100) handleNext();
                                else if (offset.x > 100) handlePrev();
                            }}
                        >
                            <MediaItem item={selectedItem} className="max-w-full max-h-[85vh] object-contain rounded-2xl" />
                            <div className="absolute bottom-0 left-0 right-0 p-4 sm:p-6 md:p-8 
                                          bg-gradient-to-t from-black/80 via-black/40 to-transparent pointer-events-none rounded-b-2xl">
                                <h3 className="text-white text-xl sm:text-2xl md:text-3xl font-semibold">
                                    {selectedItem.title}
                                </h3>
                                <p className="text-white/80 text-sm sm:text-base mt-2 max-w-2xl">
                                    {selectedItem.desc}
                                </p>
                            </div>
                        </motion.div>
                    </AnimatePresence>

                    {/* Next Button */}
                    <button 
                        className="absolute right-2 md:right-8 p-3 rounded-full bg-white/10 hover:bg-white/20 text-white backdrop-blur-md transition-all z-50 hidden md:block"
                        onClick={handleNext}
                    >
                        <ChevronRight className="w-8 h-8" />
                    </button>
                </div>

                {/* Close Button */}
                <motion.button
                    className="absolute top-4 right-4 md:top-8 md:right-8 p-3 rounded-full bg-white/10 text-white hover:bg-white/30 backdrop-blur-md z-[110]"
                    onClick={onClose}
                    whileHover={{ scale: 1.1 }}
                    whileTap={{ scale: 0.9 }}
                >
                    <X className='w-6 h-6' />
                </motion.button>
            </motion.div>

            {/* Draggable Dock */}
            <motion.div
                drag
                dragMomentum={false}
                dragElastic={0.1}
                initial={false}
                animate={{ x: dockPosition.x, y: dockPosition.y }}
                onDragEnd={(_, info) => {
                    setDockPosition(prev => ({
                        x: prev.x + info.offset.x,
                        y: prev.y + info.offset.y
                    }));
                }}
                className="fixed z-[120] left-1/2 bottom-4 -translate-x-1/2 touch-none"
            >
                <motion.div
                    className="relative rounded-xl bg-sky-400/20 backdrop-blur-xl 
                             border border-blue-400/30 shadow-lg
                             cursor-grab active:cursor-grabbing"
                >
                    <div className="flex items-center -space-x-2 px-3 py-2">
                        {mediaItems.map((item, index) => (
                            <motion.div
                                key={item.id}
                                onClick={(e) => {
                                    e.stopPropagation();
                                    setSelectedItem(item);
                                }}
                                style={{
                                    zIndex: selectedItem.id === item.id ? 30 : mediaItems.length - index,
                                }}
                                className={`
                                    relative group
                                    w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 flex-shrink-0 
                                    rounded-lg overflow-hidden 
                                    cursor-pointer hover:z-20
                                    ${selectedItem.id === item.id
                                        ? 'ring-2 ring-white/70 shadow-lg'
                                        : 'hover:ring-2 hover:ring-white/30'}
                                `}
                                initial={{ rotate: index % 2 === 0 ? -15 : 15 }}
                                animate={{
                                    scale: selectedItem.id === item.id ? 1.2 : 1,
                                    rotate: selectedItem.id === item.id ? 0 : index % 2 === 0 ? -15 : 15,
                                    y: selectedItem.id === item.id ? -8 : 0,
                                }}
                                whileHover={{
                                    scale: 1.3,
                                    rotate: 0,
                                    y: -10,
                                    transition: { type: "spring", stiffness: 400, damping: 25 }
                                }}
                            >
                                <MediaItem item={item} className="w-full h-full" onClick={() => setSelectedItem(item)} />
                                <div className="absolute inset-0 bg-gradient-to-b from-transparent via-white/5 to-white/20" />
                                {selectedItem.id === item.id && (
                                    <motion.div
                                        layoutId="activeGlow"
                                        className="absolute -inset-2 bg-white/20 blur-xl"
                                        initial={{ opacity: 0 }}
                                        animate={{ opacity: 1 }}
                                        transition={{ duration: 0.2 }}
                                    />
                                )}
                            </motion.div>
                        ))}
                    </div>
                </motion.div>
            </motion.div>
        </>
    );
};



interface InteractiveBentoGalleryProps {
    mediaItems: MediaItemType[]
    title: string
    description: string
}

const InteractiveBentoGallery: React.FC<InteractiveBentoGalleryProps> = ({ mediaItems, title, description }) => {
    const [selectedItem, setSelectedItem] = useState<MediaItemType | null>(null);
    const [items] = useState(mediaItems);
    const [currentIndex, setCurrentIndex] = useState(0);

    const handlePrev = (e?: React.MouseEvent) => {
        if (e) e.stopPropagation();
        setCurrentIndex((prev) => (prev > 0 ? prev - 1 : items.length - 1));
    };

    const handleNext = (e?: React.MouseEvent) => {
        if (e) e.stopPropagation();
        setCurrentIndex((prev) => (prev < items.length - 1 ? prev + 1 : 0));
    };

    const currentMedia = items[currentIndex];

    return (
        <div className="container mx-auto px-4 py-8 max-w-[90rem] relative z-10">
            <div className="mb-8 text-center pt-20">
                <motion.h1
                    className="text-2xl sm:text-3xl md:text-5xl font-bold bg-clip-text text-transparent 
                             bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900
                             dark:from-white dark:via-gray-200 dark:to-white font-display"
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.5 }}
                >
                    {title}
                </motion.h1>
                <motion.p
                    className="mt-4 text-sm sm:text-lg text-gray-600 dark:text-gray-400 font-light"
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.5, delay: 0.1 }}
                >
                    {description}
                </motion.p>
            </div>
            
            <AnimatePresence mode="wait">
                {selectedItem && (
                    <GalleryModal
                        selectedItem={selectedItem}
                        isOpen={true}
                        onClose={() => setSelectedItem(null)}
                        setSelectedItem={setSelectedItem}
                        mediaItems={items}
                    />
                )}
            </AnimatePresence>

            {/* Cinematic Featured Carousel */}
            <div className="w-full flex flex-col gap-4">
                <div className="relative w-full aspect-video md:aspect-[21/9] bg-black rounded-2xl md:rounded-[2rem] overflow-hidden group shadow-2xl border border-white/10">
                    <AnimatePresence mode="wait">
                        <motion.div
                            key={currentMedia.id}
                            initial={{ opacity: 0, scale: 1.05 }}
                            animate={{ opacity: 1, scale: 1 }}
                            exit={{ opacity: 0 }}
                            transition={{ duration: 0.6, ease: "easeInOut" }}
                            className="absolute inset-0 w-full h-full cursor-pointer"
                            onClick={() => setSelectedItem(currentMedia)}
                        >
                            <MediaItem
                                item={currentMedia}
                                className="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500"
                            />
                            
                            {/* Gradient overlay for text */}
                            <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent pointer-events-none" />
                            
                            {/* Info */}
                            <div className="absolute bottom-0 left-0 p-6 md:p-12 pointer-events-none">
                                <motion.h3 
                                    initial={{ y: 20, opacity: 0 }}
                                    animate={{ y: 0, opacity: 1 }}
                                    transition={{ delay: 0.3 }}
                                    className="text-white text-2xl md:text-5xl font-bold mb-2 md:mb-4 tracking-wide"
                                >
                                    {currentMedia.title}
                                </motion.h3>
                                <motion.p 
                                    initial={{ y: 20, opacity: 0 }}
                                    animate={{ y: 0, opacity: 1 }}
                                    transition={{ delay: 0.4 }}
                                    className="text-white/80 text-sm md:text-lg max-w-2xl"
                                >
                                    {currentMedia.desc}
                                </motion.p>
                            </div>
                        </motion.div>
                    </AnimatePresence>

                    {/* Navigation Buttons */}
                    <button 
                        className="absolute left-4 top-1/2 -translate-y-1/2 p-3 md:p-4 rounded-full bg-black/30 hover:bg-black/60 text-white backdrop-blur-md transition-all z-20 opacity-0 group-hover:opacity-100 translate-x-4 group-hover:translate-x-0"
                        onClick={handlePrev}
                    >
                        <ChevronLeft className="w-6 h-6 md:w-8 md:h-8" />
                    </button>
                    <button 
                        className="absolute right-4 top-1/2 -translate-y-1/2 p-3 md:p-4 rounded-full bg-black/30 hover:bg-black/60 text-white backdrop-blur-md transition-all z-20 opacity-0 group-hover:opacity-100 -translate-x-4 group-hover:translate-x-0"
                        onClick={handleNext}
                    >
                        <ChevronRight className="w-6 h-6 md:w-8 md:h-8" />
                    </button>
                    
                    {/* Fullscreen Hint */}
                    <div className="absolute top-4 right-4 md:top-8 md:right-8 bg-black/40 backdrop-blur-md px-4 py-2 rounded-full text-white/80 text-xs md:text-sm tracking-widest uppercase flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                        Cliquez pour agrandir
                    </div>
                </div>

                {/* Thumbnails Strip */}
                <div className="flex gap-3 overflow-x-auto pb-4 scrollbar-hide py-2 px-1">
                    {items.map((item, idx) => (
                        <button
                            key={item.id}
                            onClick={() => setCurrentIndex(idx)}
                            className={`relative flex-shrink-0 w-24 h-16 md:w-40 md:h-24 rounded-xl overflow-hidden transition-all duration-300 ${
                                currentIndex === idx 
                                    ? 'ring-2 ring-studio-accent ring-offset-2 ring-offset-black scale-105 opacity-100' 
                                    : 'opacity-50 hover:opacity-80 hover:scale-105'
                            }`}
                        >
                            <MediaItem item={item} className="w-full h-full object-cover" />
                        </button>
                    ))}
                </div>
            </div>
        </div>
    );
};

export default InteractiveBentoGallery;
