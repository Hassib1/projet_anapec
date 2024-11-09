import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import './ActualiteId.css'; // Importez le fichier CSS
import Navbar from '../Nav/Nav';
function ActualiteDetail() {
  const { id } = useParams();
  const [actualite, setActualite] = useState(null);

  useEffect(() => {
    fetch(`http://127.0.0.1:8000/api/actualites/${id}`)
      .then(response => response.json())
      .then(data => {
        if (data.image) {
          data.image = `http://127.0.0.1:8000/storage/${data.image}`;
        }
        setActualite(data);
      })
      .catch(console.error);
  }, [id]);

  if (!actualite) {
    return <div></div>;
  }

  return (
    <div>
    <Navbar/>
    <div className="container">
        <h1 className="title">{actualite.titre}</h1>
        <img src={actualite.image} alt={actualite.titre} className="image" />
        <p className="content">{actualite.contenu}</p>
      </div>
    </div>
  );
}

export default ActualiteDetail;
