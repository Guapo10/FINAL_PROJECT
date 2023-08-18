import React, { useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import "./register.css"

const Register = () => {
  const [formData, setFormData] = useState({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    remember: false,
  });

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setFormData((prevFormData) => ({
      ...prevFormData,
      [name]: type === 'checkbox' ? checked : value,
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    // You can handle form submission here, e.g., send data to a server or perform validation.
    console.log(formData);
  };

  return (
    <div className="wrapper">
      <div className="form-box login">
        <h2>Signup</h2>
        <form onSubmit={handleSubmit}>
          <div className="input-box">
            <span className="icon">
              {/* <ion-icon name="mail-outline"></ion-icon> */}
            </span>
            <input
              type="text"
              name="first_name"
              placeholder="first_name"
              value={formData.first_name}
              onChange={handleChange}
              required
            />
          </div>
          <div className="input-box">
            <span className="icon">
              {/* <ion-icon name="mail-outline"></ion-icon> */}
            </span>
            <input
              type="text"
              name="last_name"
              placeholder="last_name"
              value={formData.last_name}
              onChange={handleChange}
              required
            />
          </div>

          <div className="input-box">
            <span className="icon">
              {/* <ion-icon name="mail-outline"></ion-icon> */}
            </span>
            <input
              type="text"
              name="email"
              placeholder="Email"
              value={formData.email}
              onChange={handleChange}
              required
            />
          </div>

          <div className="input-box">
            <span className="icon">
              {/* <ion-icon name="keypad-outline"></ion-icon> */}
            </span>
            <input
              type="password"
              name="password"
              placeholder="Password"
              value={formData.password}
              onChange={handleChange}
              required
            />
          </div>
          <div className="remember-forgot">
            <label>
              <input
                type="checkbox"
                name="remember"
                checked={formData.remember}
                onChange={handleChange}
              />
              Remember me
            </label>
          </div>
          <button type="submit" className="btn">
            Submit
          </button>
        </form>
      </div>
    </div>
  );
};

export default Register;
