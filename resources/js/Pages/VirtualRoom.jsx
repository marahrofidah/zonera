import React, { useState, useEffect } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { User, Play, Pause, X, Music, Gamepad2, Layers, Check, Plus, ArrowLeft, Youtube, Wind, Grid, Circle, Volume2 } from 'lucide-react';

const Backgrounds = [
  { id: 'default', name: 'Sunny Morning', url: 'https://images.unsplash.com/photo-1541586655971-3ef599c4ba77?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx3YXJtJTIwc3VubnklMjBtaW5pbWFsaXN0JTIwc3R1ZHklMjByb29tfGVufDF8fHx8MTc2OTkyMzA4Mnww&ixlib=rb-4.1.0&q=80&w=1080' },
  { id: 'rain', name: 'Rainy Day', url: 'https://images.unsplash.com/photo-1580569530187-a77f37213ffc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb3p5JTIwcmFpbnklMjB3aW5kb3clMjBpbmRvb3IlMjBhZXN0aGV0aWN8ZW58MXx8fHwxNzY5OTIzMDgyfDA&ixlib=rb-4.1.0&q=80&w=1080' },
  { id: 'night', name: 'City Night', url: 'https://images.unsplash.com/photo-1600143111391-8cf39e83ec74?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxuaWdodCUyMGNpdHklMjB3aW5kb3clMjBjb3p5JTIwcm9vbXxlbnwxfHx8fDE3Njk5MjMwODl8MA&ixlib=rb-4.1.0&q=80&w=1080' },
  { id: 'cafe', name: 'Cozy Cafe', url: 'https://images.unsplash.com/photo-1749304676642-09a6744ee4c1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb3p5JTIwY2FmZSUyMGludGVyaW9yJTIwaWxsdXN0cmF0aW9uJTIwYXJ0fGVufDF8fHx8MTc2OTkyMzA4M3ww&ixlib=rb-4.1.0&q=80&w=1080' },
];

export default function VirtualRoom({ selectedMethod, onExit }) {
  const [desks, setDesks] = useState([]);
  const [selectedDesk, setSelectedDesk] = useState(null);
  const [isFocusMode, setIsFocusMode] = useState(false);
  const [timer, setTimer] = useState(25 * 60);
  const [isTimerRunning, setIsTimerRunning] = useState(false);
  
  const [currentBg, setCurrentBg] = useState(Backgrounds[0]);
  const [isPlayingMusic, setIsPlayingMusic] = useState(false);
  const [showGame, setShowGame] = useState(false);
  const [gameMode, setGameMode] = useState('menu');
  
  const [tasks, setTasks] = useState([]);
  const [newTask, setNewTask] = useState('');
  const [showSummary, setShowSummary] = useState(false);
  const [showTodoList, setShowTodoList] = useState(false);

  const [musicUrl, setMusicUrl] = useState('');
  const [musicId, setMusicId] = useState(null);

  useEffect(() => {
    const initialDesks = Array.from({ length: 9 }, (_, i) => ({
      id: i,
      status: Math.random() > 0.6 ? 'occupied' : 'empty',
      user: Math.random() > 0.6 ? `User ${i + 1}` : undefined,
      avatarColor: ['#D4A373', '#E6CCB2', '#A5A58D', '#B7B7A4'][Math.floor(Math.random() * 4)]
    }));
    setDesks(initialDesks);
  }, []);

  useEffect(() => {
    let interval;
    if (isTimerRunning && timer > 0) {
      interval = setInterval(() => setTimer(t => t - 1), 1000);
    }
    return () => clearInterval(interval);
  }, [isTimerRunning, timer]);

  const handleDeskClick = (id) => {
    const desk = desks.find(d => d.id === id);
    if (desk?.status === 'empty' && selectedDesk === null) {
      setSelectedDesk(id);
      setDesks(prev => prev.map(d => d.id === id ? { ...d, status: 'occupied', user: 'You' } : d));
      setShowTodoList(true);
    }
  };

  const toggleFocus = () => {
    setIsFocusMode(!isFocusMode);
    setIsTimerRunning(!isFocusMode);
    if (selectedDesk !== null) {
      setDesks(prev => prev.map(d => d.id === selectedDesk ? { ...d, status: !isFocusMode ? 'focused' : 'occupied' } : d));
    }
  };

  const initiateLeave = () => {
    setIsTimerRunning(false);
    setShowSummary(true);
  };

  const confirmLeave = () => {
    if (selectedDesk !== null) {
      setDesks(prev => prev.map(d => d.id === selectedDesk ? { ...d, status: 'empty', user: undefined } : d));
      setSelectedDesk(null);
      setIsFocusMode(false);
      setIsTimerRunning(false);
      setTimer(25 * 60);
      setShowGame(false);
      setShowSummary(false);
      setShowTodoList(false);
      setTasks(prev => prev.map(t => ({...t, completed: false})));
    }
  };

  const formatTime = (seconds) => {
    const m = Math.floor(seconds / 60);
    const s = seconds % 60;
    return `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
  };

  const addTask = (e) => {
    e.preventDefault();
    if (newTask.trim()) {
      setTasks([...tasks, { id: Date.now().toString(), text: newTask, completed: false }]);
      setNewTask('');
    }
  };

  const toggleTask = (id) => {
    setTasks(tasks.map(t => t.id === id ? { ...t, completed: !t.completed } : t));
  };

  const extractYoutubeId = (url) => {
    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
    const match = url.match(regExp);
    return (match && match[2].length === 11) ? match[2] : null;
  };

  const handleMusicSubmit = (e) => {
    e.preventDefault();
    const id = extractYoutubeId(musicUrl);
    if (id) setMusicId(id);
  };

  return (
    <div className="h-screen w-full relative overflow-hidden flex flex-col items-center justify-center transition-all duration-1000">
      <div className="absolute inset-0 z-0">
        <img src={currentBg.url} alt="Background" className="w-full h-full object-cover transition-opacity duration-1000" />
        <div className="absolute inset-0 bg-black/20 backdrop-blur-[1px]"></div>
      </div>

      <div className="absolute top-6 left-6 z-30">
        <button 
          onClick={onExit}
          className="bg-white/90 backdrop-blur-md p-3 rounded-2xl shadow-xl flex items-center gap-2 text-[#7e6961] font-bold hover:bg-[#550b14] hover:text-white transition-colors"
        >
          <ArrowLeft size={20} />
          <span className="hidden md:inline">Keluar</span>
        </button>
      </div>

      <div className="absolute top-6 right-6 flex flex-col gap-4 z-30">
        <div className="bg-white/90 backdrop-blur-md p-3 rounded-2xl shadow-xl flex flex-col items-center gap-4 border border-white/50">
            <div className="group relative">
              <button className="p-2 hover:bg-[#cbc0b2]/30 rounded-full transition-colors" title="Ganti Suasana">
                <Layers size={20} className="text-[#550b14]" />
              </button>
              <div className="absolute right-12 top-0 bg-white p-3 rounded-xl shadow-xl w-48 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all transform origin-top-right scale-95 group-hover:scale-100">
                <p className="text-xs font-bold text-[#7e6961] mb-2 px-1">Pilih Suasana</p>
                <div className="grid grid-cols-2 gap-2">
                  {Backgrounds.map(bg => (
                    <button key={bg.id} onClick={() => setCurrentBg(bg)} className={`relative aspect-video rounded-lg overflow-hidden border-2 ${currentBg.id === bg.id ? 'border-[#550b14]' : 'border-transparent'}`}>
                      <img src={bg.url} alt={bg.name} className="w-full h-full object-cover" />
                    </button>
                  ))}
                </div>
              </div>
            </div>
            
            <div className="h-[1px] w-full bg-[#cbc0b2]"></div>

            <button onClick={() => setIsPlayingMusic(!isPlayingMusic)} className={`p-2 rounded-full transition-all ${isPlayingMusic ? 'bg-[#550b14] text-white' : 'hover:bg-[#cbc0b2]/30 text-[#550b14]'}`}>
              <Music size={20} />
            </button>
            
            {isPlayingMusic && (
               <div className="absolute right-14 top-14 bg-white/95 backdrop-blur-xl p-4 rounded-xl shadow-xl w-72 animate-in fade-in slide-in-from-right-4 border border-white/50">
                 <div className="text-xs font-bold text-[#7e6961] mb-3 flex items-center gap-2">
                   <Youtube size={14} className="text-red-600" />
                   Music Player
                 </div>
                 {!musicId ? (
                   <form onSubmit={handleMusicSubmit} className="space-y-2">
                     <input type="text" placeholder="Paste YouTube Link..." value={musicUrl} onChange={(e) => setMusicUrl(e.target.value)} className="w-full text-xs p-2 bg-[#f8f8f7] rounded-lg border border-[#cbc0b2] outline-none" />
                     <button type="submit" className="w-full py-1 bg-[#7e6961] text-white text-xs rounded-lg font-bold">Play</button>
                   </form>
                 ) : (
                   <div className="space-y-2">
                      <div className="relative aspect-video rounded-lg overflow-hidden bg-black">
                        <iframe width="100%" height="100%" src={`https://www.youtube.com/embed/${musicId}?autoplay=1&controls=0`} title="Music Player" allow="autoplay; encrypted-media" className="absolute inset-0"></iframe>
                      </div>
                      <button onClick={() => { setMusicId(null); setMusicUrl(''); }} className="w-full py-1 text-xs text-red-500 hover:text-red-700 font-medium">Change Music</button>
                   </div>
                 )}
               </div>
            )}
        </div>
      </div>

      <div className="relative z-10 w-full max-w-4xl h-[600px] flex items-center justify-center perspective-[1000px]">
        <div className="relative grid grid-cols-3 gap-8 transform transition-all duration-700 ease-out" style={{ transform: isFocusMode || showGame ? 'scale(1.2) rotateX(20deg) rotateZ(0deg)' : 'rotateX(55deg) rotateZ(-45deg)', pointerEvents: (isFocusMode && !showGame) ? 'none' : 'auto' }}>
          {desks.map((desk) => (
            <DeskItem key={desk.id} desk={desk} isMe={selectedDesk === desk.id} onClick={() => handleDeskClick(desk.id)} />
          ))}
        </div>
      </div>

      <AnimatePresence>
        {selectedDesk !== null && !showGame && (
          <motion.div initial={{ y: 100, opacity: 0 }} animate={{ y: 0, opacity: 1 }} exit={{ y: 100, opacity: 0 }} className="fixed bottom-6 left-1/2 -translate-x-1/2 w-full max-w-2xl px-4 z-40 flex gap-4 items-end">
            <motion.div initial={{ height: 0, opacity: 0 }} animate={{ height: showTodoList ? 'auto' : 0, opacity: showTodoList ? 1 : 0 }} className="bg-white/90 backdrop-blur-xl rounded-[2rem] shadow-2xl overflow-hidden w-64 flex-shrink-0 border border-white">
              <div className="p-4">
                <div className="flex justify-between items-center mb-3">
                  <h3 className="font-bold text-[#550b14]">To-Do List</h3>
                  <button onClick={() => setShowTodoList(false)} className="text-[#7e6961] hover:bg-[#cbc0b2]/20 p-1 rounded-full"><X size={14} /></button>
                </div>
                <form onSubmit={addTask} className="flex gap-2 mb-3">
                  <input type="text" value={newTask} onChange={(e) => setNewTask(e.target.value)} placeholder="Add task..." className="flex-1 bg-[#f8f8f7] rounded-lg px-3 py-1 text-sm outline-none border border-transparent focus:border-[#550b14]/20" />
                  <button type="submit" className="bg-[#7e6961] text-white p-1 rounded-lg"><Plus size={16} /></button>
                </form>
                <div className="max-h-40 overflow-y-auto space-y-2">
                  {tasks.length === 0 && <p className="text-xs text-gray-400 text-center py-2">Belum ada tugas.</p>}
                  {tasks.map(task => (
                    <div key={task.id} className="flex items-center gap-2 group">
                      <button onClick={() => toggleTask(task.id)} className={`w-4 h-4 rounded border flex items-center justify-center transition-colors ${task.completed ? 'bg-[#550b14] border-[#550b14]' : 'border-[#cbc0b2]'}`}>
                        {task.completed && <Check size={10} className="text-white" />}
                      </button>
                      <span className={`text-sm ${task.completed ? 'line-through opacity-50' : 'text-[#7e6961]'}`}>{task.text}</span>
                      <button onClick={() => setTasks(tasks.filter(t => t.id !== task.id))} className="ml-auto opacity-0 group-hover:opacity-100 text-red-400 text-xs hover:text-red-600">Del</button>
                    </div>
                  ))}
                </div>
              </div>
            </motion.div>

            <div className="flex-1 bg-white/90 backdrop-blur-xl p-4 rounded-[2rem] shadow-2xl border border-white flex flex-col gap-4">
               <div className="flex items-center justify-between">
                  <div>
                    <h3 className="text-lg font-bold text-[#550b14]">Fokus Area</h3>
                    <p className="text-xs text-[#7e6961]">{selectedMethod || 'Free Flow'} Mode</p>
                  </div>
                  <div className="text-3xl font-mono font-bold text-[#7e6961] tracking-wider">{formatTime(timer)}</div>
               </div>
               <div className="flex gap-2">
                 <button onClick={() => setShowTodoList(!showTodoList)} className="p-3 bg-[#f8f8f7] text-[#7e6961] rounded-xl hover:bg-[#cbc0b2]/20 transition-colors md:hidden"><Check size={20} /></button>
                 <button onClick={toggleFocus} className={`flex-1 py-3 rounded-xl font-bold flex items-center justify-center transition-all ${isFocusMode ? 'bg-[#cbc0b2] text-[#7e6961]' : 'bg-[#550b14] text-white shadow-lg'}`}>
                  {isFocusMode ? <Pause size={20} className="mr-2"/> : <Play size={20} className="mr-2"/>}
                  {isFocusMode ? 'Istirahat' : 'Mulai Fokus'}
                </button>
                <button onClick={() => { setShowGame(true); setGameMode('menu'); }} className="p-3 bg-[#e8dcb5] text-[#7e6961] rounded-xl hover:bg-[#d4c3a3] transition-colors relative group">
                  <Gamepad2 size={20} />
                </button>
                <button onClick={initiateLeave} className="p-3 bg-[#f8f8f7] text-[#7e6961] rounded-xl hover:bg-red-50 hover:text-red-500 transition-colors"><X size={20} /></button>
               </div>
            </div>
          </motion.div>
        )}
      </AnimatePresence>

      <AnimatePresence>
        {showGame && <GameOverlay mode={gameMode} setMode={setGameMode} onClose={() => setShowGame(false)} />}
      </AnimatePresence>

      <AnimatePresence>
        {showSummary && (
          <motion.div initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }} className="fixed inset-0 z-[60] flex items-center justify-center bg-black/40 backdrop-blur-sm p-6">
            <motion.div initial={{ scale: 0.9, y: 20 }} animate={{ scale: 1, y: 0 }} className="bg-white rounded-[2rem] p-8 max-w-md w-full shadow-2xl relative overflow-hidden">
               <div className="absolute top-0 left-0 w-full h-2 bg-[#550b14]"></div>
               <h2 className="text-2xl font-bold text-[#550b14] mb-2">Sesi Selesai!</h2>
               <p className="text-[#7e6961] mb-6">Apa saja yang sudah kamu selesaikan?</p>
               <div className="bg-[#f8f8f7] rounded-xl p-4 mb-6 max-h-60 overflow-y-auto">
                 {tasks.map(task => (
                   <div key={task.id} className="flex items-center gap-3 py-2 border-b border-[#cbc0b2]/20 last:border-0">
                     <button onClick={() => toggleTask(task.id)} className={`w-5 h-5 rounded border flex items-center justify-center transition-colors ${task.completed ? 'bg-[#550b14] border-[#550b14]' : 'border-[#cbc0b2] bg-white'}`}>
                       {task.completed && <Check size={12} className="text-white" />}
                     </button>
                     <span className={`text-base ${task.completed ? 'line-through opacity-50' : 'text-[#7e6961]'}`}>{task.text}</span>
                   </div>
                 ))}
               </div>
               <div className="flex gap-4">
                 <button onClick={() => setShowSummary(false)} className="flex-1 py-3 rounded-xl font-bold text-[#7e6961] bg-[#f8f8f7]">Kembali</button>
                 <button onClick={confirmLeave} className="flex-1 py-3 rounded-xl font-bold text-white bg-[#550b14]">Selesai & Keluar</button>
               </div>
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}

const DeskItem = ({ desk, isMe, onClick }) => {
  const isOccupied = desk.status !== 'empty';
  const isFocused = desk.status === 'focused';
  
  return (
    <motion.div onClick={onClick} whileHover={!isOccupied ? { scale: 1.05, y: -10 } : {}} className={`relative w-32 h-32 md:w-40 md:h-40 rounded-3xl transition-all duration-500 cursor-pointer group ${isOccupied ? 'bg-[#e6e2dd] shadow-[10px_10px_0px_#d1c7bc]' : 'bg-white/40 hover:bg-white shadow-[5px_5px_0px_rgba(0,0,0,0.05)] border-2 border-dashed border-[#cbc0b2]'} ${isMe ? 'ring-4 ring-[#550b14]/30 z-20' : ''}`} style={{ transformStyle: 'preserve-3d' }}>
      <div className="absolute inset-0 flex items-center justify-center">
        {isOccupied ? (
          <div className="relative">
            <div className="w-16 h-16 rounded-full shadow-inner flex items-center justify-center relative" style={{ backgroundColor: desk.avatarColor || '#cbc0b2' }}>
              <User size={24} className="text-white/80" />
              <AnimatePresence>{isFocused && <motion.div initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }} className="absolute -top-12 left-1/2 -translate-x-1/2 w-8 h-8 bg-yellow-400 rounded-full blur-xl opacity-60"></motion.div>}</AnimatePresence>
            </div>
            <div className="absolute -bottom-8 left-1/2 -translate-x-1/2 bg-white/80 backdrop-blur-sm px-2 py-1 rounded-md text-[10px] whitespace-nowrap font-bold text-[#7e6961] shadow-sm transform rotate-z-45">{desk.user}</div>
          </div>
        ) : <span className="text-[#cbc0b2] font-medium text-xs group-hover:text-[#7e6961]">Pilih Meja</span>}
      </div>
      {isOccupied && <div className="absolute top-2 right-2"><div className={`w-3 h-3 rounded-full ${isFocused ? 'bg-green-400 animate-pulse' : 'bg-gray-300'}`}></div></div>}
    </motion.div>
  );
};

const GameOverlay = ({ mode, setMode, onClose }) => {
  return (
    <motion.div initial={{ scale: 0.9, opacity: 0 }} animate={{ scale: 1, opacity: 1 }} exit={{ scale: 0.9, opacity: 0 }} className="fixed inset-0 z-50 flex items-center justify-center bg-black/20 backdrop-blur-md">
      <div className="bg-white p-8 rounded-[2rem] shadow-2xl max-w-lg w-full relative min-h-[400px] flex flex-col">
        <button onClick={onClose} className="absolute top-4 right-4 p-2 hover:bg-gray-100 rounded-full text-[#7e6961]"><X size={24} /></button>
        {mode === 'menu' && (
          <div className="flex flex-col h-full justify-center">
            <h3 className="text-3xl font-bold text-[#550b14] mb-8 text-center">Pilih Game Santai</h3>
            <div className="grid grid-cols-1 gap-4">
              <GameOption title="Deep Breaths" icon={Wind} desc="Panduan pernapasan untuk relaksasi instan." onClick={() => setMode('breathing')} />
              <GameOption title="Memory Match" icon={Grid} desc="Latih ingatan jangka pendekmu." onClick={() => setMode('memory')} />
              <GameOption title="Bubble Pop" icon={Circle} desc="Pecahkan gelembung untuk melepas stres." onClick={() => setMode('pop')} />
            </div>
          </div>
        )}
        {mode === 'breathing' && <BreathingGame onBack={() => setMode('menu')} />}
        {mode === 'memory' && <MemoryGame onBack={() => setMode('menu')} />}
        {mode === 'pop' && <BubblePopGame onBack={() => setMode('menu')} />}
      </div>
    </motion.div>
  );
};

// Sub-komponen game seperti GameOption, BreathingGame, dll sama seperti kode sebelumnya, 
// pastikan meng-copy bagian bawahnya juga dari kode yang saya berikan sebelumnya
// agar tidak terlalu panjang di sini.
const GameOption = ({ title, icon: Icon, desc, onClick }) => (
  <button onClick={onClick} className="flex items-center p-4 bg-[#f8f8f7] rounded-2xl hover:bg-[#e8dcb5] transition-all group text-left border border-transparent hover:border-[#cbc0b2]">
    <div className="bg-white p-3 rounded-xl mr-4 shadow-sm text-[#550b14] group-hover:scale-110 transition-transform"><Icon size={24} /></div>
    <div><h4 className="font-bold text-[#7e6961] text-lg">{title}</h4><p className="text-xs text-[#7e6961]/70">{desc}</p></div>
  </button>
);

const BreathingGame = ({ onBack }) => (
  <div className="flex flex-col items-center justify-center h-full">
    <h3 className="text-xl font-bold text-[#7e6961] mb-8">Ikuti Lingkaran</h3>
    <div className="relative flex items-center justify-center">
       <motion.div animate={{ scale: [1, 2.5, 1], opacity: [0.6, 1, 0.6] }} transition={{ duration: 8, repeat: Infinity, ease: "easeInOut" }} className="w-24 h-24 bg-[#550b14]/20 rounded-full absolute" />
       <motion.div animate={{ scale: [1, 2, 1] }} transition={{ duration: 8, repeat: Infinity, ease: "easeInOut" }} className="w-24 h-24 bg-[#e8dcb5] rounded-full flex items-center justify-center shadow-lg relative z-10">
         <motion.span animate={{ opacity: [0, 1, 0, 1, 0] }} transition={{ duration: 8, times: [0, 0.2, 0.5, 0.7, 1], repeat: Infinity }} className="text-[#550b14] font-bold">Breathe</motion.span>
       </motion.div>
    </div>
    <button onClick={onBack} className="mt-auto text-sm font-bold text-[#550b14] hover:underline">Kembali ke Menu</button>
  </div>
);

// MemoryGame dan BubblePopGame juga di-copy dari kode sebelumnya
const MemoryGame = ({ onBack }) => {
  const [cards, setCards] = useState([]);
  const [flipped, setFlipped] = useState([]);
  useEffect(() => {
    const emojis = ['coffee', 'book', 'sun', 'moon', 'star', 'cloud'];
    const items = [...emojis, ...emojis].sort(() => Math.random() - 0.5).map((val, id) => ({ id, val, flipped: false, solved: false }));
    setCards(items);
  }, []);
  const handleCardClick = (id) => {
    if (flipped.length === 2 || cards[id].flipped || cards[id].solved) return;
    const newCards = [...cards]; newCards[id].flipped = true; setCards(newCards);
    const newFlipped = [...flipped, id]; setFlipped(newFlipped);
    if (newFlipped.length === 2) {
      const [first, second] = newFlipped;
      if (cards[first].val === cards[second].val) {
        setTimeout(() => { setCards(prev => prev.map(c => (c.id === first || c.id === second) ? { ...c, solved: true } : c)); setFlipped([]); }, 500);
      } else {
        setTimeout(() => { setCards(prev => prev.map(c => (c.id === first || c.id === second) ? { ...c, flipped: false } : c)); setFlipped([]); }, 1000);
      }
    }
  };
  const icons = { coffee: <Volume2 size={20}/>, book: <Grid size={20}/>, sun: <Wind size={20}/>, moon: <Layers size={20}/>, star: <Check size={20}/>, cloud: <User size={20}/> };
  return (
    <div className="flex flex-col h-full">
      <div className="flex justify-between items-center mb-4"><h3 className="font-bold text-[#7e6961]">Memory Match</h3><button onClick={onBack} className="text-xs text-[#550b14]">Kembali</button></div>
      <div className="grid grid-cols-4 gap-3 flex-1">
        {cards.map((card) => (
          <motion.button key={card.id} whileHover={{ scale: 1.05 }} onClick={() => handleCardClick(card.id)} className={`rounded-xl flex items-center justify-center text-2xl transition-all duration-300 ${card.flipped || card.solved ? 'bg-[#550b14] text-white rotate-y-180' : 'bg-[#e6e2dd]'}`}>{(card.flipped || card.solved) ? icons[card.val] || card.val : '?'}</motion.button>
        ))}
      </div>
    </div>
  );
};

const BubblePopGame = ({ onBack }) => {
  const [bubbles, setBubbles] = useState(Array(16).fill(true));
  const pop = (idx) => { const newB = [...bubbles]; newB[idx] = false; setBubbles(newB); if (newB.every(b => !b)) setTimeout(() => setBubbles(Array(16).fill(true)), 500); };
  return (
    <div className="flex flex-col h-full">
      <div className="flex justify-between items-center mb-4"><h3 className="font-bold text-[#7e6961]">Pop It!</h3><button onClick={onBack} className="text-xs text-[#550b14]">Kembali</button></div>
      <div className="grid grid-cols-4 gap-4 flex-1 p-4 bg-[#f0eee9] rounded-2xl">{bubbles.map((isActive, i) => (<motion.button key={i} whileTap={{ scale: 0.8 }} onClick={() => isActive && pop(i)} className={`rounded-full shadow-inner transition-colors duration-200 ${isActive ? 'bg-[#e8dcb5] shadow-[inset_-4px_-4px_10px_rgba(0,0,0,0.1),inset_4px_4px_10px_rgba(255,255,255,0.8)]' : 'bg-[#cbc0b2]/50 scale-90'}`}></motion.button>))}</div>
    </div>
  );
};