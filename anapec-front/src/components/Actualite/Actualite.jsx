import React, { useState, useEffect } from 'react';
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import './Actualite.css';

const ActualitesList = () => {
  const [actualites, setActualites] = useState([]);
  const [expandedIndex, setExpandedIndex] = useState(null);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/actualite')
      .then(response => response.json())
      .then(data => setActualites(data.actualite))
      .catch(error => console.error('Error fetching actualites:', error));
  }, []);

  const handleSlideClick = (index) => {
    setExpandedIndex(index === expandedIndex ? null : index);
  };

  const settings = {
    infinite: actualites.length > 1, // Enable infinite loop only if more than one item
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
    <h1 class='act'>Actualités</h1>
      {actualites.length > 0 ? (
        <Slider {...settings}>
          {actualites.map((actualite, index) => (
            <div
              key={actualite.id}
              className="actualite-item"
              onClick={() => handleSlideClick(index)}
            >
              <div className="image-container">
                {actualite.image && (
                  <img
                    className={`actualite-image ${index === expandedIndex ? 'expanded' : ''}`}
                    src={`http://127.0.0.1:8000/storage/${actualite.image}`}
                    alt="Actualite Image"
                  />
                )}
                {index === expandedIndex && (
                  <div className="actualite-content-full">
                    <p>{actualite.contenu}</p>
                  </div>
                )}
              </div>
              <div className={`actualite-content-preview ${index === expandedIndex ? 'hidden' : ''}`}>
                <h3>{actualite.titre}</h3>
              </div>
            </div>
          ))}
        </Slider>
      ) : (
        <p>No actualités available</p> // Handle case with no items
      )}
    </div>
  );
  
};

export default ActualitesList;
