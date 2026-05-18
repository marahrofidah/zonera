import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import Main from './Main';

if (document.getElementById('app')) {
    const root = ReactDOM.createRoot(document.getElementById('app'));
    root.render(
        <React.StrictMode>
            <Main />
        </React.StrictMode>
    );
}