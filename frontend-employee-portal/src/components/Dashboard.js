import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { fetchEmployeeInfo } from '../services/authServices';

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

    if (!userInfo) {
        return <div>Loading...</div>;
    }

    return (
        <div className="dashboard">
            <h1>Dashboard</h1>
            <div className="user-info">
                <h2>Welcome, {userInfo.first_name} {userInfo.last_name}</h2>
                {/* Add more user info display as needed */}
            </div>
        </div>
    );
};

export default Dashboard;