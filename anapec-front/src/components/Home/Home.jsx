import React from 'react';
import Navbar from '../Nav/Nav';
import SimpleSlider from '../Simpleslider/Simpleslider'
import Bar from '../bar/bar';
import ActualitesList from '../Actualite/Actualite';
import OffresList from '../Offres/Offre';
 // Import specific CSS for the Home component if needed

function Home() {
  return (
 <div>
    <Navbar/>
    <SimpleSlider />
    <Bar/>
    <OffresList/>
     <ActualitesList />
 
    </div>
  );
}

export default Home;
