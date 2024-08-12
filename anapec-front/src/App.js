import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Home from './components/Home/Home';
import OffresIdsList from './components/OffresId/OffreId';


const App = () => {
  return (
    <Router>
      <Routes>
        <Route exact path="/" element={< Home/>} />
        <Route path="/offres/:id" element={<OffresIdsList />} />
      </Routes>
    </Router>
  );
};

export default App;
