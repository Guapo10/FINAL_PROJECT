import React from 'react';
import { Link } from 'react-router-dom';
import "./landing.css"

const LandingPage = () => {
  return (
    <div className="landing-page">
      <video autoPlay loop muted className="background-video">
        <source src="/videos/vid2.mp4" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
      <div className="overlay"></div>
      <div className="content">
        <h1>Welcome to Our Farm <span>Management System</span></h1>
        <p>Join us to streamline your farm operations and boost productivity.</p>
        <div className="sign-up-button">
          <Link to="/signup">
            <button className="btn btn-primary">Sign Up Now</button>
          </Link>
        </div>
      </div>
    </div>
  );
};

export default LandingPage;
