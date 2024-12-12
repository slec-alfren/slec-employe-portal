import React from 'react';
import { BrowserRouter } from 'react-router-dom';
import AppRoutes from './AppRoutes';

function App() {
    return (
        <BrowserRouter>
            <div>
                <AppRoutes />
            </div>
        </BrowserRouter>
    );
}

export default App;
