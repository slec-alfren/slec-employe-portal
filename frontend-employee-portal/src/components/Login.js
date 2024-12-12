import { authService } from '../services/authServices';
import { useNavigate } from 'react-router-dom';
import { useState } from 'react';
import '../style/Login.scss';

const Login = () => {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const navigate = useNavigate();

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const data = await authService.login(username, password);
            console.log('Login response:', data);
            
            if (data.employee && data.employee.id) {
                console.log('User ID:', data.employee.id);
                navigate('/dashboard');
            } else {
                console.error('Login response missing employee ID');
            }
        } catch (error) {
            console.error('Login failed:', error);
        }
    };
    
    return (
        <div className="login-container">
            {/* Header */}
            <div className="header d-flex align-items-center">
                <img src="logo.png" alt="Company Logo" className="company-logo" />
                <h3 className="company-name">SLEC - EMPLOYEE PORTAL</h3>
            </div>

            {/* Main Content */}
            <div className="main-content row">
                {/* Banner Column */}
                <div className="banner-section col-md-6 d-none d-md-block">
                    <img src="https://slec.ph/images/misc/slec-logo.png" alt="Company Banner" className="banner-image" />
                </div>

                {/* Login Form Column */}
                <div className="login-form-section col-md-6">
                    <div className="login-card">
                        <div className="card-body">
                            <form onSubmit={handleSubmit}>
                                <div className="form-group mt-5">
                                    <label>User name</label>
                                    <input 
                                        className="form-control" 
                                        type="text" 
                                        value={username} 
                                        onChange={(e) => setUsername(e.target.value)}
                                        placeholder="Enter your username"
                                    />
                                </div>
                                <div className="form-group">
                                    <label>Password</label>
                                    <input 
                                        className="form-control" 
                                        type="password" 
                                        value={password} 
                                        onChange={(e) => setPassword(e.target.value)} 
                                        placeholder="Enter your password"
                                    />
                                </div>

                                <div className="form-group d-flex justify-content-between align-items-center">
                                    <div className="form-check">
                                        <input 
                                            type="checkbox" 
                                            className="form-check-input" 
                                            id="rememberMe" 
                                        />
                                        <label className="form-check-label" htmlFor="rememberMe">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="/forgot-password" className="forgot-password-link text-decoration-none">
                                        Forgot Password?
                                    </a>
                                </div>
                                <button className="btn btn-primary login-button" type="submit">
                                    Login
                                </button>
                                <div className="form-group mt-5 mb-5">
                                    <p className="text-center">Don't have an account? <a href="/register" className="text-decoration-none">Register</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Login;
