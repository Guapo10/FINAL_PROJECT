import axios from 'axios';
import FieldList from "../fields/Fields";
import { useState, useEffect } from 'react';
import EmployeeList from "../../components/employeeList/EmployeeList";
import './home.css';

function Home() {
  const [fields, setFields] = useState([]); // State to store field data
  const [dataForBoxes, setDataForBoxes] = useState({}); // State to store data for other boxes

  useEffect(() => {
    // Define an async function to fetch field data
    async function fetchFieldData() {
      try {
        const response = await axios.get('/api/fields'); // Replace with your actual API endpoint for fields
        setFields(response.data); // Set the field data in the state
      } catch (error) {
        console.error('Error fetching field data:', error);
      }
    }

    // Fetch field data using the async function
    fetchFieldData();
  }, []); // Add an empty dependency array to run the effect only once

  return (
    <div className="home">
      <div className="box box1">
        {/* Use a custom component to display the list of fields */}
        <FieldList fields={fields} />
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
  );
}

export default Home;
