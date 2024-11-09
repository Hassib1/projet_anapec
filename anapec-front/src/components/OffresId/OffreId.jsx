import React, { useState, useEffect } from 'react';
import { FaCalendarAlt, FaBriefcase, FaSchool, FaMapMarkerAlt, FaBuilding, FaInfoCircle } from 'react-icons/fa';
 // Adjust the path based on your structure
import './OffreId.css';

const OffreDetails = ({ id }) => {
  const [offre, setOffre] = useState(null);
  const [error, setError] = useState(null);

  useEffect(() => {
    const url = `http://127.0.0.1:8000/api/offres/${id}`;

    fetch(url)
      .then(response => response.json())
      .then(data => setOffre(data))
      .catch(() => setError('Failed to load offer details'));
  }, [id]);

  if (error) {
    return <p>Error: {error}</p>;
  }

  return (

      <div className="offre-details-container-div">
        {offre && (
          <div className="offre-details-div">
            <p><FaInfoCircle className="icon-info" /> <strong>Offre:</strong> {offre.nom}</p>
            <p><FaCalendarAlt className="icon-date" /> <strong>Date:</strong> {new Date(offre.date).toLocaleDateString()}</p>
            <p><FaBriefcase className="icon-description" /> <strong>Description:</strong> {offre.description}</p>
            <p><FaBriefcase className="icon-contrat" /> <strong>Contrat:</strong> {offre.type_contrat}</p>
            <p><FaSchool className="icon-formation" /> <strong>Formation:</strong> {offre.formation}</p>
            <p><FaMapMarkerAlt className="icon-lieu" /> <strong>Lieu:</strong> {offre.lieu_travail}</p>
            <p><FaBuilding className="icon-entreprise" /> <strong>Entreprise:</strong> {offre.entreprise}</p>
          </div>
        )}
     
    </div>
  );
};

export default OffreDetails;
