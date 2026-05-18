import React, { useState } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import Navigation from './Components/Navigation';
import Home from './Pages/Home';
import About from './Pages/About';
import Library from './Pages/Library';
import Gallery from './Pages/Gallery';
import Contact from './Pages/Contact';
import VirtualRoom from './Pages/VirtualRoom';

export default function Main() {
  const [currentPage, setCurrentPage] = useState('home');
  const [selectedMethod, setSelectedMethod] = useState(null);

  const handleMethodSelect = (method) => {
    setSelectedMethod(method);
    setCurrentPage('room');
  };

  const renderPage = () => {
    switch (currentPage) {
      case 'home': return <Home setPage={setCurrentPage} />;
      case 'about': return <About />;
      case 'library': return <Library onSelectMethod={handleMethodSelect} />;
      case 'gallery': return <Gallery />;
      case 'contact': return <Contact />;
      case 'room': return <VirtualRoom selectedMethod={selectedMethod} onExit={() => setCurrentPage('home')} />;
      default: return <Home setPage={setCurrentPage} />;
    }
  };

  return (
    <div className="min-h-screen bg-[#f8f8f7] text-[#7e6961] font-sans selection:bg-[#550b14] selection:text-white overflow-x-hidden">
      <main className="w-full min-h-screen pb-24">
        <AnimatePresence mode="wait">
          <motion.div
            key={currentPage}
            initial={{ opacity: 0, y: 10 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: -10 }}
            transition={{ duration: 0.3 }}
            className="w-full h-full"
          >
            {renderPage()}
          </motion.div>
        </AnimatePresence>
      </main>
      
      {/* Hide navigation when in room */}
      {currentPage !== 'room' && (
        <Navigation currentPage={currentPage} setCurrentPage={setCurrentPage} />
      )}
    </div>
  );
}