import React, { useState, useEffect } from 'react';
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import './Simpleslider.css';


function SimpleSlider() {
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
    adaptiveHeight: true,
    centerMode: true,
    centerPadding: '0',
  };

  return (
  
    <div>
 
      <div className="slider-container">
      <Slider {...settings}>
            {slides.map((slide, index) => (
              <div className="item" key={index}>
                <img className="slide-image"
                  src={`http://127.0.0.1:8000/storage/${slide.image_url}`}
                ></img>
              </div>
            ))}
          </Slider>
      
      </div>
    </div>
  );
}

export default SimpleSlider;