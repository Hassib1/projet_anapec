import React from 'react';
import './Nav.css'; // Import your CSS for Navbar styling
import projetanapec from '../../assets/images/anapec-image.png';
const Navbar = () => {
  return (
    <nav className="n-navbar">
      <div className="n-navbar-container">
        <div className="n-navbar-logo">
         <img src={projetanapec} alt="Projet Anapec Logo" />
        </div>
        <ul className="n-navbar-menu">
          <li className="n-navbar-item">
            <a href='/'>Accueil</a>
          </li>
       
          <li className="n-navbar-item">
            <a href="#actualite">Actualités</a>
          </li>
          <li className="n-navbar-item">
            <a href="/contact">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  );
};

export default Navbar;
