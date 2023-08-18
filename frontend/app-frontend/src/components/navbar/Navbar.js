import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBars, faHome, faInfoCircle, faCogs, faEnvelope } from '@fortawesome/free-solid-svg-icons'; // Import the necessary icons
import './navbar.css';

const Navbar = () => {
  const [showMenu, setShowMenu] = useState(false);

  const toggleMenu = () => {
    setShowMenu(!showMenu);
  };

  return (
    <nav className="navbar">
      <div className="logo">
        <img src="logo1.png" alt="Logo" />
        <span>Mayhem|Farms</span>
      </div>
      <div className="menu-icon" onClick={toggleMenu}>
        <FontAwesomeIcon icon={faBars} /> {/* Use the faBars icon */}
      </div>
      <div className={`menu-links ${showMenu ? 'active' : ''}`}>
        <Link to="/home">
          <FontAwesomeIcon icon={faHome} /> Home {/* Use the faHome icon */}
        </Link>
        <Link to="/about">
          <FontAwesomeIcon icon={faInfoCircle} /> About {/* Use the faInfoCircle icon */}
        </Link>
        <Link to="/services">
          <FontAwesomeIcon icon={faCogs} /> Services {/* Use the faCogs icon */}
        </Link>
        <Link to="/contact">
          <FontAwesomeIcon icon={faEnvelope} /> Contact {/* Use the faEnvelope icon */}
        </Link>
      </div>
      <form action="/search" method="GET" className="search-form">
        <input type="text" name="query" placeholder="Search..." className="search-input" />
        <button type="submit" className="search-button">Search</button>
      </form>
    </nav>
  );
};

export default Navbar;
