import React from 'react';
import Navbar from '../Nav/Nav';

import Bar from '../bar/bar';
import ActualitesList from '../Actualite/Actualite';
import OffresList from '../Offres/Offre';
import SimpleCarousel from '../Simpleslider/Simpleslider';
import VideoList from '../Videos/Video';
 // Import specific CSS for the Home component if needed

function Home() {
  return (
 <div>
    <Navbar/>
    <SimpleCarousel />
    <Bar/>
    <ActualitesList />
    <VideoList/>
    </div>
  );
}

export default Home;
