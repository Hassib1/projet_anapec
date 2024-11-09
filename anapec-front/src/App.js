import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Home from './components/Home/Home';
import OffresIdsList from './components/OffresId/OffreId';
import ActualitesList from './components/Actualite/Actualite';
import ActualiteDetail from './components/ActualiteId/ActualiteId';
import OffresList from './components/Offres/Offre';


const App = () => {
  return (
    <Router>
      <Routes>
        <Route exact path="/" element={< Home/>} />
        <Route path="/offres/:id" element={<OffresIdsList />} />
        <Route path="/actualites/:id" element={<ActualiteDetail/>}/>
        <Route path="/offrelist" element={<OffresList />}/>
      </Routes>
    </Router>
  );
};

export default App;
