import axios from 'axios';

const API_URL = 'http://localhost:8000/api';

export const authService = {
    login: async (username, password) => {
        try {
            const response = await axios.post(`${API_URL}/login`, { username, password });
            console.log('Raw server response:', response.data);
            
            // Store both the token and employee ID
            if (response.data.token && response.data.employee?.id) {
                localStorage.setItem('token', response.data.token);
                localStorage.setItem('userId', response.data.employee.id);
            }
            
            return response.data;
        } catch (error) {
            if (error.response) {
                console.error('Server error response:', error.response.data);
                throw new Error(error.response.data.message || 'Server error');
            } else if (error.request) {
                console.error('No response received:', error.request);
                throw new Error('No response from server');
            } else {
                console.error('Error setting up request:', error.message);
                throw error;
            }
        }
    }
};

export const fetchEmployeeInfo = async (userId, token) => {
    const response = await fetch(`${API_URL}/employee/${userId}`, {
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        }
    });

    if (!response.ok) {
        throw new Error('Failed to fetch employee info');
    }

    return response.json();
};