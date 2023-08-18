// import { useState, useEffect } from 'react';
// import axios from 'axios';
// import './employeeList.css';

// interface Employee {
//      id: number;
//       name: string;
//       email:string ;
//       contact:number;
//       img: string ;

// }

// function EmployeeList() {
//   const [employees, setEmployees] = useState<Employee[]>([]);

//   useEffect(() => {

//     const config = {
//       headers: {
//         Authorization: `Bearer ${localStorage.getItem('authToken')}`, // Replace with your token retrieval method
//       },
//     };
    
//     axios.get<Employee[]>('/api/employees') // Replace with your API endpoint
//       .then(response => {
//         setEmployees(response.data);
//       })
//       .catch(error => {
//         console.error('Error fetching employees:', error);
//       });
//   }, []);

//   return (
//     <div className="topBox">
//       <h1>Employees</h1>
//       <ul>
//         {employees.map(employee => (
//           <li key={employee.id}>{employee.name}</li>
//         ))}
//       </ul>
//     </div>
//   );
// }

// export default EmployeeList;
