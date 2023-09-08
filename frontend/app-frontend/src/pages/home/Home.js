import axios from 'axios';
import { useState, useEffect } from 'react';
import EmployeeList from"../../components/employeeList/EmployeeList"
import './home.css'

function Home () {

  const [employees, setEmployees] = useState([]);

  useEffect(() => {
    axios.get('/api/employees') // Replace with your actual API endpoint
      .then(response => {
        setEmployees(response.data);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }, []);
  
  return (
    <div className="home">
      <div className="box box1">
        <EmployeeList employees={employees} /> {}
      </div>
    <div className="box box2">Box2</div>
    <div className="box box3">Box3</div>
    <div className="box box4">Box4</div>
    <div className="box box5">Box5</div>
    <div className="box box6">Box6</div>
    <div className="box box7">Box7</div>
    <div className="box box8">Box8</div>
    <div className="box box9">Box9</div>
    <div className="box box10">Box10</div>
    <div className="box box11">Box11</div>
</div>
  )
}

export default Home
