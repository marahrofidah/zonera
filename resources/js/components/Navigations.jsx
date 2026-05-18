import React from 'react';
import { Home, Users, BookOpen, Image as ImageIcon, MessageCircle, Monitor } from 'lucide-react';

const Navigation = ({ currentPage, setCurrentPage }) => {
  const navItems = [
    { id: 'home', label: 'Home', icon: Home },
    { id: 'about', label: 'About', icon: Users },
    { id: 'library', label: 'Library', icon: BookOpen },
    { id: 'gallery', label: 'Gallery', icon: ImageIcon },
    { id: 'contact', label: 'Contact', icon: MessageCircle },
    { id: 'room', label: 'Room', icon: Monitor },
  ];

  return (
    <nav className="fixed bottom-6 left-1/2 transform -translate-x-1/2 bg-[#cbc0b2]/90 backdrop-blur-md px-6 py-3 rounded-full shadow-lg z-50 border border-[#f8f8f7]/20">
      <ul className="flex items-center space-x-6">
        {navItems.map((item) => {
          const Icon = item.icon;
          const isActive = currentPage === item.id;
          return (
            <li key={item.id}>
              <button
                onClick={() => setCurrentPage(item.id)}
                className={`flex flex-col items-center justify-center transition-all duration-300 ${
                  isActive ? 'text-[#550b14] -translate-y-1' : 'text-[#7e6961] hover:text-[#550b14]/70'
                }`}
              >
                <div className={`p-2 rounded-full ${isActive ? 'bg-[#f8f8f7]' : 'bg-transparent'}`}>
                  <Icon size={20} strokeWidth={isActive ? 2.5 : 2} />
                </div>
                <span className={`text-[10px] mt-1 font-medium ${isActive ? 'opacity-100' : 'opacity-0 hidden'}`}>
                  {item.label}
                </span>
              </button>
            </li>
          );
        })}
      </ul>
    </nav>
  );
};

export default Navigation;