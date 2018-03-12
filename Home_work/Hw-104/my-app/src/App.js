import React, { Component } from 'react';
import Student from './Student';
import Counter from './Counter';
import MyForm from './MyForm';

class App extends Component {
  students = [
    { name: 'Bob', marks: [87, 92, 94], id: 1, color: "Yellow" },
    { name: 'Joe', marks: [98, 99, 97], id: 2, color: "Black" },
    { name: 'Donald', marks: [88, 86, 85], id: 3, color: "Green" }
  ];

  render() {
    const studentComponents = this.students.map(student => <li key={student.id}><Student student={student} color={student.color} /></li>);

    return (
      <div>
        <ul>
          {/*<Student student={students[0]} />
          <Student student={students[1]} />*/}
          {studentComponents}
        </ul>
        <Counter />
        <MyForm />
      </div>
    );
  }
}

export default App;
