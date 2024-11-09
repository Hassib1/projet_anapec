import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import './Actualite.css';

const ActualitesList = () => {
  const [actualites, setActualites] = useState([]);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/actualite')
      .then(response => response.json())
      .then(data => setActualites(data.actualite))
      .catch(error => console.error('Error fetching actualites:', error));
  }, []);

  const settings = {
    infinite: actualites.length > 1,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  };

  return (
    <div id='actualite' className="actualites-list">
      <h1 className='act'>Actualités</h1>
      {actualites.length > 0 ? (
        <Slider className='slide' {...settings}>
          {actualites.map((actualite) => (
            <div
              key={actualite.id}
              className="actualite-item"
            >
              <div className="image-container">
                {actualite.image && (
                  <img
                    className="actualite-image"
                    src={`http://127.0.0.1:8000/storage/${actualite.image}`}
                    alt="Actualite"
                  />
                )}
              </div>
              <div className="actualite-content-preview">
                <h3>{actualite.titre}</h3>
                <Link to={`/actualites/${actualite.id}`} className="actualite-link">
                  Voir plus
                </Link>
              </div>
            </div>
          ))}
        </Slider>
      ) : (
        <div></div>
      )}
    </div>
  );
};

export default ActualitesList;
