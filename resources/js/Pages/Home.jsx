import React from 'react';
import { motion } from 'motion/react';
import { ArrowRight, Coffee, Lamp } from 'lucide-react';

export default function Home({ setPage }) {
  return (
    <div className="max-w-6xl mx-auto px-6 pt-20 flex flex-col items-center justify-center min-h-[80vh]">
      <motion.div 
        initial={{ opacity: 0, scale: 0.9 }}
        animate={{ opacity: 1, scale: 1 }}
        transition={{ duration: 0.5 }}
        className="w-full max-w-4xl relative mb-12"
      >
        <div className="relative aspect-video rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white">
          <img 
            src="https://images.unsplash.com/photo-1655276588918-fe4730b4227c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHwzZCUyMGlzb21ldHJpYyUyMGNvenklMjBzdHVkeSUyMHJvb20lMjBiZWlnZSUyMG1pbmltYWxpc3R8ZW58MXx8fHwxNzY5OTIxNjg0fDA&ixlib=rb-4.1.0&q=80&w=1080" 
            alt="Cozy Isometric Room" 
            className="w-full h-full object-cover"
          />
          <div className="absolute inset-0 bg-[#550b14]/10 pointer-events-none mix-blend-overlay"></div>
        </div>
        <motion.div animate={{ y: [0, -10, 0] }} transition={{ repeat: Infinity, duration: 4, ease: "easeInOut" }} className="absolute -top-6 -right-6 bg-[#cbc0b2] p-4 rounded-2xl shadow-lg border-2 border-white"><Lamp size={32} className="text-[#550b14]" /></motion.div>
        <motion.div animate={{ y: [0, 10, 0] }} transition={{ repeat: Infinity, duration: 5, ease: "easeInOut", delay: 1 }} className="absolute -bottom-6 -left-6 bg-[#cbc0b2] p-4 rounded-2xl shadow-lg border-2 border-white"><Coffee size={32} className="text-[#550b14]" /></motion.div>
      </motion.div>

      <div className="text-center max-w-2xl">
        <h1 className="text-4xl md:text-6xl font-bold mb-6 text-[#550b14] tracking-tight">Zonera</h1>
        <p className="text-lg md:text-xl mb-10 leading-relaxed opacity-90">Ruang belajar virtual yang tenang dan ramah. Temukan fokusmu di antara teman-teman, tanpa gangguan.</p>
        <button onClick={() => setPage('library')} className="group relative inline-flex items-center justify-center px-8 py-4 bg-[#7e6961] text-[#f8f8f7] rounded-full overflow-hidden transition-all hover:bg-[#550b14] hover:scale-105 shadow-md">
          <span className="font-semibold text-lg mr-2">Mulai Belajar</span>
          <ArrowRight className="group-hover:translate-x-1 transition-transform" />
        </button>
      </div>
    </div>
  );
};