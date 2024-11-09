import React, { useState, useEffect } from 'react';
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import './Simpleslider.css'; // Ensure correct CSS file path

function SimpleCarousel() {
  const [slides, setSlides] = useState([]);

  useEffect(() => {
    fetchLatestSlides();
  }, []);

  const fetchLatestSlides = async () => {
    try {
      const response = await fetch('http://127.0.0.1:8000/api/latest');
      if (!response.ok) {
        throw new Error(`Error fetching slides: ${response.status}`);
      }
      const data = await response.json();
      console.log('Slides fetched:', data.slides);
      setSlides(data.slides);
    } catch (error) {
      console.error('Error:', error);
    }
  };

  const settings = {
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: false, // Disable adaptive height for full-page effect
    centerMode: false,
    centerPadding: '0',
    arrows: true,
  };

  return (
    <div className="carousel-container">
      <Slider {...settings}>
        {slides.map((slide, index) => (
          <div className="carousel-item" key={index}>
            <img
              className="carousel-image"
              src={`http://127.0.0.1:8000/storage/${slide.image_url}`}
              alt={`Slide ${index}`}
            />
          </div>
        ))}
      </Slider>
    </div>
  );
}

export default SimpleCarousel;
