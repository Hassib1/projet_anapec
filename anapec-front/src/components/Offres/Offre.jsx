import React, { useState, useEffect } from 'react';
import { Container, Card } from 'react-bootstrap';
import OffreDetails from '../OffresId/OffreId';
import Navbar from '../Nav/Nav';
import './Offre.css';


const OffresList = () => {
  const [offres, setOffres] = useState([]);
  const [selectedOffreId, setSelectedOffreId] = useState(null);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/offre')
      .then(response => response.json())
      .then(data => setOffres(data.offres))
      .catch(error => console.error('Error fetching offres:', error));
  }, []);

  const handleOffreClick = (id) => {
    setSelectedOffreId(id);
  };

  return (
    <div>
      <Navbar className="mx-auto"/>
    <Container id='offres' className="offres-list">
      <h1 className='offres-title'>Offres</h1>
      <div className="offres-main">
        <div className="offres-container">
          {offres.length > 0 ? (
            offres.map(offre => (
              <Card
                key={offre.id}
                className={`offre-card ${selectedOffreId === offre.id ? 'selected' : ''}`}
                onClick={() => handleOffreClick(offre.id)}
              >
                <Card.Body>
                  <div className="offre-details">
                    <Card.Title>
                      <strong>Offre:</strong> {offre.nom}
                    </Card.Title>
                    <Card.Subtitle className="mb-2 text-muted">
                      <strong>Entreprise:</strong> {offre.entreprise}
                    </Card.Subtitle>
                    <Card.Text>
                      <strong>Date:</strong> {new Date(offre.date).toLocaleDateString()}
                    </Card.Text>
                  </div>
                </Card.Body>
              </Card>
            ))
          ) : (
            <div></div>
          )}
        </div>
        <div className="offre-details-container">
          {selectedOffreId && <OffreDetails id={selectedOffreId} />}
        </div>
      </div>
    </Container>
    </div>
  );
};

export default OffresList;
