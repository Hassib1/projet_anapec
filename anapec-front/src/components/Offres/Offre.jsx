import React, { useState, useEffect } from 'react';
import { Container, Card } from 'react-bootstrap';
import { Link } from 'react-router-dom'; // Importez le composant Link
import './Offre.css'; // Assurez-vous d'avoir ce fichier CSS pour les styles

const OffresList = () => {
  const [offres, setOffres] = useState([]);
  
  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/offre')
      .then(response => response.json())
      .then(data => {
        // Trier les offres par date, de la plus récente à la plus ancienne
        const sortedOffres = data.offres.sort((a, b) => new Date(b.date) - new Date(a.date));
        setOffres(sortedOffres);
      })
      .catch(error => console.error('Error fetching offres:', error));
  }, []);

  return (
    <Container id='offres' className="offres-list">
      <h1 className='offres-title'>Offres</h1>
      {offres.length > 0 ? (
        <div className="offres-container">
          {offres.map(offre => (
            <Card key={offre.id} className="offre-card">
              <Card.Body className="d-flex flex-row">
                <div className="offre-details">
                  <Card.Title>
                    <strong>Offre:</strong>
                    <Link to={`/offres/${offre.id}`} className="offre-link">
                      {offre.nom}
                    </Link>
                  </Card.Title>
                  <Card.Subtitle className="mb-2 text-muted">
                    <strong>Entreprise:</strong>{offre.entreprise}
                  </Card.Subtitle>
                  <Card.Text>
                    <strong>Date:</strong> {new Date(offre.date).toLocaleDateString()}
                  </Card.Text>
                </div>
              </Card.Body>
            </Card>
          ))}
        </div>
      ) : (
        <p>No offres available</p> // Handle case with no items
      )}
    </Container>
  );
};

export default OffresList;
