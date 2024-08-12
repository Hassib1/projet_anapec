import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import  './OffreId.css';
const OffreDetails = () => {
    const { id } = useParams(); // Retrieves the ID from the URL parameters
    const [offre, setOffre] = useState(null);
    const [error, setError] = useState(null);

    useEffect(() => {
        const url = `http://127.0.0.1:8000/api/offres/${id}`;

        fetch(url)
            .then(response => response.json())
            .then(data => setOffre(data))
            .catch(() => setError('Failed to load offer details'));
    }, [id]);

    // Display an error message if there is an error
    if (error) {
        return <p>Error: {error}</p>;
    }

    // Display the offer details once they are loaded
    return (
        <div class='offrediv'>
            {offre && (
                <div >
                    <p><strong>Offre</strong> {offre.nom}</p>
                    <p><strong>Date:</strong> {new Date(offre.date).toLocaleDateString()}</p>
                    <p><strong>Description:</strong> {offre.description}</p>
                    <p><strong>Contrat</strong> {offre.type_contrat}</p>
                    <p><strong>Formation:</strong> {offre.formation}</p>
                    <p><strong>Lieu:</strong> {offre.lieu_travail}</p>
                    <p><strong>Entreprise:</strong> {offre.entreprise}</p>
                </div>
            )}
        </div>
    );
};

export default OffreDetails;
