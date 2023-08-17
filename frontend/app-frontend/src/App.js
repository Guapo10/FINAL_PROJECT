import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import  Landingpage  from './pages/Landingpage';
import Navbar  from './components/navbar/Navbar';

function App() {
  return (
    <Router>
      <Navbar />
      <Routes>
        <Route path="/" element={<Landingpage />} />
        {/* Add more routes here */}
      </Routes>
    </Router>
  );
}

export default App;
