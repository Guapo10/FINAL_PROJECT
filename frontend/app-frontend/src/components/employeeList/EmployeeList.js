
import './employeeList.css';

function EmployeeList({ employees }) {
  return (
    <div className="topBox">
      <h1>Employees</h1>
      <ul>
        {employees.map(employee => (
          <li key={employee.id}>{employee.name}</li>
        ))}
      </ul>
    </div>
  );
}

export default EmployeeList;
