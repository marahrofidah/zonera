import React, { useState } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { Timer, Zap, Coffee, ArrowRight, Brain, Sparkles, Wind } from 'lucide-react';

export default function Library({ onSelectMethod }) {
  const [activeFilter, setActiveFilter] = useState('All');
  const filters = ['All', 'Focus', 'Relaxed', 'Deep Work'];

  const methods = [
    {
      id: 'pomodoro', title: 'Pomodoro', category: 'Focus', icon: Timer,
      description: '25 menit fokus, 5 menit istirahat. Klasik dan efektif.',
      image: "https://images.unsplash.com/photo-1673528076919-a69be48560c6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtaW5pbWFsaXN0JTIwZGVzayUyMHBvbW9kb3JvJTIwdGltZXIlMjB3YXJtJTIwbGlnaHR8ZW58MXx8fHwxNzY5OTIxNjg0fDA&ixlib=rb-4.1.0&q=80&w=1080"
    },
    {
      id: 'flowtime', title: 'Flowtime', category: 'Deep Work', icon: Wind,
      description: 'Fokus natural tanpa timer ketat. Istirahat saat lelah.',
      image: "https://images.unsplash.com/photo-1515549832467-8783363e19b6?auto=format&fit=crop&q=80&w=800"
    },
    // ... Tambahkan metode lain sesuai kode sebelumnya ...
  ];

  const filteredMethods = activeFilter === 'All' ? methods : methods.filter(m => m.category === activeFilter);

  return (
    <div className="max-w-5xl mx-auto px-6 pt-20 pb-12">
      <div className="text-center mb-12">
        <h2 className="text-3xl font-bold text-[#550b14] mb-4">Pilih Cara Belajarmu</h2>
        <p className="opacity-80">Metode yang tepat membuat belajar terasa ringan.</p>
      </div>
      <div className="flex flex-wrap justify-center gap-3 mb-10">
        {filters.map((filter) => (
          <button key={filter} onClick={() => setActiveFilter(filter)} className={`px-6 py-2 rounded-full font-medium transition-all ${activeFilter === filter ? 'bg-[#550b14] text-white shadow-lg' : 'bg-white text-[#7e6961] hover:bg-[#e8dcb5]'}`}>{filter}</button>
        ))}
      </div>
      <motion.div layout className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <AnimatePresence>
          {filteredMethods.map((method) => (
            <motion.div layout key={method.id} initial={{ opacity: 0, scale: 0.9 }} animate={{ opacity: 1, scale: 1 }} exit={{ opacity: 0, scale: 0.9 }} whileHover={{ y: -5 }} className="bg-white rounded-[2rem] overflow-hidden shadow-lg border border-[#cbc0b2]/30 group cursor-pointer" onClick={() => onSelectMethod(method.title)}>
              <div className="h-40 overflow-hidden relative">
                <img src={method.image} alt={method.title} className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                <div className="absolute inset-0 bg-gradient-to-t from-[#550b14]/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4"><span className="text-white font-bold flex items-center gap-2">Mulai Sesi <ArrowRight size={16} /></span></div>
                <div className="absolute top-4 left-4 bg-white/90 backdrop-blur-sm p-2 rounded-xl text-[#550b14]"><method.icon size={20} /></div>
              </div>
              <div className="p-6">
                <div className="flex justify-between items-start mb-2"><h3 className="text-xl font-bold text-[#7e6961]">{method.title}</h3><span className="text-[10px] px-2 py-1 bg-[#f8f8f7] rounded-md border border-[#cbc0b2] text-[#7e6961]/70 font-bold uppercase tracking-wider">{method.category}</span></div>
                <p className="text-sm opacity-70 leading-relaxed mb-4">{method.description}</p>
                <button className="w-full py-3 bg-[#f8f8f7] text-[#550b14] font-bold rounded-xl group-hover:bg-[#550b14] group-hover:text-white transition-colors">Pilih</button>
              </div>
            </motion.div>
          ))}
        </AnimatePresence>
      </motion.div>
    </div>
  );
};