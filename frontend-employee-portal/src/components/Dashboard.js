import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { fetchEmployeeInfo, logout } from '../services/authServices';
import '../style/Dashboard.scss';

const Dashboard = () => {
    const [userInfo, setUserInfo] = useState(null);
    const navigate = useNavigate();

    useEffect(() => {
        const getUserInfo = async () => {
            try {
                const userId = localStorage.getItem('userId');
                const token = localStorage.getItem('token');

                if (!userId || !token) {
                    navigate('/login');
                    return;
                }

                const data = await fetchEmployeeInfo(userId, token);
                setUserInfo(data);
            } catch (error) {
                console.error('Error fetching employee info:', error);
                navigate('/login');
            }
        };

        getUserInfo();
    }, [navigate]);

    const handleLogout = async () => {
        try {
            await logout();
            navigate('/login');
        } catch (error) {
            console.error('Error during logout:', error);
            // Still navigate to login even if there's an error
            navigate('/login');
        }
    };

    if (!userInfo) {
        return <div>Loading...</div>;
    }

    return (
        <div className="dashboard-container">
            <div className="header d-flex align-items-center">
                <img src="logo.png" alt="Company Logo" className="company-logo" />
                <h3 className="company-name">SLEC - EMPLOYEE PORTAL</h3>
            </div>

            <div className="main-content">
                <h2>Welcome, {userInfo.first_name} {userInfo.last_name}</h2>
                <button 
                    className="btn btn-primary" 
                    onClick={handleLogout}
                >
                    Logout
                </button>
            </div>
        </div>
    );
};

export default Dashboard;