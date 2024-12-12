import React from 'react';
import { Routes, Route, Navigate } from 'react-router-dom';
import Login from './components/Login';
import Dashboard from './components/Dashboard';

const AppRoutes = () => {
    return (
        <Routes>
            <Route path="/login" element={<Login />} />
            <Route path="/" element={<Navigate to="/login" />} />
            <Route path="/dashboard" element={<Dashboard />} />
            {/*routes not existing will be redirected to login page */}
            <Route path="*" element={<Navigate to="/login" />} />
            {/* Add more routes as needed */}
        </Routes>
    );
};

export default AppRoutes;