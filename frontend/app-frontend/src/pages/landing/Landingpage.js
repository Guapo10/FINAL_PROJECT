import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faCrop, faTractor, faAnalytics, faMapMarkerAlt } from '@fortawesome/free-solid-svg-icons';
import "./landing.css"

const LandingPage = () => {
  const [cards] = useState([
    {
      title: "Advanced Crop Monitoring",
      text: "Monitor your crops in real-time using IoT sensors and receive alerts on moisture levels, diseases, and nutrient status."
    },
    {
      title: "Smart Machinery Integration",
      icon: faTractor,
      text: "Integrate your machinery with our system to optimize farming operations and reduce downtime."
    },
    {
      title: "Traceability & Quality Control",
      icon: faMapMarkerAlt,
      text: "Ensure product quality and trace the journey of your produce from farm to market using our blockchain-powered system."
    },
    {
      title: "Traceability & Quality Control",
      icon: faMapMarkerAlt,
      text: "Ensure product quality and trace the journey of your produce from farm to market using our blockchain-powered system."
    },
    {
      title: "Advanced Analytics",
      // icon: faAnalytics,
      text: "Access insightful data analytics to make informed decisions about planting, harvesting, and resource allocation."
    },
    {
      title: "Traceability & Quality Control",
      icon: faMapMarkerAlt,
      text: "Ensure product quality and trace the journey of your produce from farm to market using our blockchain-powered system."
    }
  ]);

  return (
    <>
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
      <div className='card-section'>
      <div className="key-features">
        <h2>Key Features</h2>
        <div className="feature-cards">
          {cards.map((card, index) => (
            <div className="feature-card" key={index}>
              <div className="icon">
                {/* Add an icon based on the feature */}
                {index === 0 && <FontAwesomeIcon icon={faCrop} />}
                {/* Add icons for other features as needed */}
              </div>
              <h3>{card.title}</h3>
              <p>{card.text}</p>
              {/* <Link to="/signup">
            <button className="btn btn-primary">explore</button>
          </Link> */}
            </div>
            
          ))}
          </div>
          </div>
        </div>
    </>
  );
};

export default LandingPage;
