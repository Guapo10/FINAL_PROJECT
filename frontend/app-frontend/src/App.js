import { BrowserRouter as Router, Routes, Route, Link ,Outlet} from 'react-router-dom';
import "./styles/global.css"
import Menu from "./components/menu/Menu";
import Navbar  from './components/navbar/Navbar';
import LandingPage from './pages/landing/Landingpage';
import Home from "./pages/home/Home"
function App() {
  return (
    <Router>
    <div className="main">
      <Navbar />
      <div className="container">
        <div className="menuContainer">
          <Menu />
        </div>
        <div className="contentContainer">
          <Link to="/register">Register</Link>
          <Link to="/landing">Landing</Link>
          <Routes>
            <Route path="/" element={<Home />} />
            {/* <Route path="/farms" element={<Farms />} />
            <Route path="/fields" element={<Fields />} />
            <Route path="/crops" element={<Crops />} />
            <Route path="/livestock" element={<Livestock />} /> */}
          </Routes>
          {/* <Outlet /> */}
        </div>
      </div>
      {/* <Footer /> */}
    </div>
  </Router>
    
  );
}

export default App;

